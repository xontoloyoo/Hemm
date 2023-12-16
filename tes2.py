import os
import sys

infer_dir = os.path.abspath(os.path.join(os.path.dirname(__file__), '..', 'infer'))
sys.path.append(infer_dir)
from infer.modules.vc.modules import VC
from infer.modules.uvr5.modules import uvr
#from infer.lib.train.process_ckpt import (
    change_info,
    extract_small_model,
    merge,
    show_info,
)
from i18n.i18n import I18nAuto
from configs.config import Config
from sklearn.cluster import MiniBatchKMeans
from dotenv import load_dotenv
import torch
import numpy as np
import gradio as gr
import faiss
import fairseq
import pathlib
import json
from time import sleep
from subprocess import Popen
from random import shuffle
import warnings
import traceback
import threading
import shutil
import logging


logging.getLogger("numba").setLevel(logging.WARNING)

logger = logging.getLogger(__name__)
now_dir = os.getcwd()
tmp = os.path.join(now_dir, "TEMP")
shutil.rmtree(tmp, ignore_errors=True)
shutil.rmtree("%s/runtime/Lib/site-packages/uvr5_pack" % (now_dir), ignore_errors=True)
os.makedirs(tmp, exist_ok=True)
os.makedirs(os.path.join(now_dir, "logs"), exist_ok=True)
os.makedirs(os.path.join(now_dir, "assets/weights"), exist_ok=True)
os.environ["TEMP"] = tmp
warnings.filterwarnings("ignore")
torch.manual_seed(114514)


load_dotenv()
config = Config()
vc = VC(config)


if config.dml == True:

    def forward_dml(ctx, x, scale):
        ctx.scale = scale
        res = x.clone().detach()
        return res

    fairseq.modules.grad_multiply.GradMultiply.forward = forward_dml
i18n = I18nAuto()
logger.info(i18n)
# 判断是否有能用来训练和加速推理的N卡
ngpu = torch.cuda.device_count()
gpu_infos = []
mem = []
if_gpu_ok = False

if torch.cuda.is_available() or ngpu != 0:
    for i in range(ngpu):
        gpu_name = torch.cuda.get_device_name(i)
        if any(
            value in gpu_name.upper()
            for value in [
                "10",
                "16",
                "20",
                "30",
                "40",
                "A2",
                "A3",
                "A4",
                "P4",
                "A50",
                "500",
                "A60",
                "70",
                "80",
                "90",
                "M4",
                "T4",
                "TITAN",
            ]
        ):
            # A10#A100#V100#A40#P40#M40#K80#A4500
            if_gpu_ok = True  # 至少有一张能用的N卡
            gpu_infos.append("%s\t%s" % (i, gpu_name))
            mem.append(
                int(
                    torch.cuda.get_device_properties(i).total_memory
                    / 1024
                    / 1024
                    / 1024
                    + 0.4
                )
            )
if if_gpu_ok and len(gpu_infos) > 0:
    gpu_info = "\n".join(gpu_infos)
    default_batch_size = min(mem) // 2
else:
    gpu_info = i18n("很遗憾您这没有能用的显卡来支持您训练")
    default_batch_size = 1
gpus = "-".join([i[0] for i in gpu_infos])


class ToolButton(gr.Button, gr.components.FormComponent):
    """Small button with single emoji as text, fits inside gradio forms"""

    def __init__(self, **kwargs):
        super().__init__(variant="tool", **kwargs)

    def get_block_name(self):
        return "button"


weight_root = os.getenv("weight_root")
weight_uvr5_root = os.getenv("weight_uvr5_root")
index_root = os.getenv("index_root")

names = []
for name in os.listdir(weight_root):
    if name.endswith(".pth"):
        names.append(name)
uvr5_names = []
for name in os.listdir(weight_uvr5_root):
    if name.endswith(".pth") or "onnx" in name:
        uvr5_names.append(name.replace(".pth", ""))


with gr.Blocks(title="Nih Cuy") as app:
    gr.Markdown("## GassKeun")
    gr.Markdown(
        value=i18n(
            "本软件以MIT协议开源, 作者不对软件具备任何控制力, 使用软件者、传播软件导出的声音者自负全责. <br>如不认可该条款, 则不能使用或引用软件包内任何代码和文件. 详见根目录<b>LICENSE</b>."
        )
    )

    with gr.TabItem(i18n("伴奏人声分离&去混响&去回声")):
        with gr.Group():
            gr.Markdown(
                value=i18n(
                    "人声伴奏分离批量处理， 使用UVR5模型。 <br>合格的文件夹路径格式举例： E:\\codes\\py39\\vits_vc_gpu\\白鹭霜华测试样例(去文件管理器地址栏拷就行了)。 <br>模型分为三类： <br>1、保留人声：不带和声的音频选这个，对主人声保留比HP5更好。内置HP2和HP3两个模型，HP3可能轻微漏伴奏但对主人声保留比HP2稍微好一丁点； <br>2、仅保留主人声：带和声的音频选这个，对主人声可能有削弱。内置HP5一个模型； <br> 3、去混响、去延迟模型（by FoxJoy）：<br>  (1)MDX-Net(onnx_dereverb):对于双通道混响是最好的选择，不能去除单通道混响；<br>&emsp;(234)DeEcho:去除延迟效果。Aggressive比Normal去除得更彻底，DeReverb额外去除混响，可去除单声道混响，但是对高频重的板式混响去不干净。<br>去混响/去延迟，附：<br>1、DeEcho-DeReverb模型的耗时是另外2个DeEcho模型的接近2倍；<br>2、MDX-Net-Dereverb模型挺慢的；<br>3、个人推荐的最干净的配置是先MDX-Net再DeEcho-Aggressive。"
                )
            )
            
            with gr.Row():
                with gr.Column():
                    dir_wav_input = gr.Textbox(
                        label=i18n("输入待处理音频文件夹路径"),
                        placeholder="C:\\Users\\Desktop\\todo-songs",
                    )
                    wav_inputs = gr.File(
                        file_count="multiple", label=i18n("也可批量输入音频文件, 二选一, 优先读文件夹")
                    )
                with gr.Column():
                    model_choose = gr.Dropdown(label=i18n("模型"), choices=uvr5_names)
                    agg = gr.Slider(
                        minimum=0,
                        maximum=20,
                        step=1,
                        label="人声提取激进程度",
                        value=10,
                        interactive=True,
                        visible=False,  # 先不开放调整
                    )
                    opt_vocal_root = gr.Textbox(
                        label=i18n("指定输出主人声文件夹"), value="opt"
                    )
                    opt_ins_root = gr.Textbox(
                        label=i18n("指定输出非主人声文件夹"), value="opt"
                    )
                    format0 = gr.Radio(
                        label=i18n("导出文件格式"),
                        choices=["wav", "flac", "mp3", "m4a"],
                        value="flac",
                        interactive=True,
                    )

            but2 = gr.Button(i18n("转换"), variant="primary")
            vc_output4 = gr.Textbox(label=i18n("输出信息"))
            but2.click(
                uvr,
                [
                    model_choose,
                    dir_wav_input,
                    opt_vocal_root,
                    wav_inputs,
                    opt_ins_root,
                    agg,
                    format0,
                ],
                [vc_output4],
                api_name="uvr_convert",
            )
# Lanjutkan dengan menjalankan antarmuka pengguna
if config.iscolab:
    app.queue(concurrency_count=511, max_size=1022).launch(share=True)
else:
    app.queue(concurrency_count=511, max_size=1022).launch(
        server_name="0.0.0.0",
        inbrowser=not config.noautoopen,
        server_port=config.listen_port,
        quiet=True,
    )
