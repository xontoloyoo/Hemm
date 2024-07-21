<?php
include('header.php');
?>
<script src="<?php style_theme();?>/js/s.js"></script>
<section class="px-4r">
    <div class="backdrop" style="background-image: url(<?php echo htmlspecialchars($images, ENT_QUOTES, 'UTF-8');?>)"></div>
    <div class="container">
        <div id="player-1" class="row">
            <div class="embed-responsive embed-responsive-16by9">
                <video id="play-video" class="video-js vjs-16-9 vjs-big-play-centered" controls preload="none" width="600" height="315" poster="<?php echo htmlspecialchars($images, ENT_QUOTES, 'UTF-8');?>" data-setup="{}" webkit-playsinline playsinline>
                    <source src="<?php echo htmlspecialchars($selectedBg, ENT_QUOTES, 'UTF-8'); ?>" type="video/mp4" label="SD">
                    <source src="<?php echo htmlspecialchars($selectedBg, ENT_QUOTES, 'UTF-8'); ?>" type="video/mp4" label="HD">
                    <track kind="subtitles" src="" srclang="en" label="English">
                    <track kind="subtitles" src="" srclang="fr" label="French">
                    <track kind="subtitles" src="" srclang="de" label="Germany">
                    <track kind="subtitles" src="" srclang="nl" label="Netherland">
                    <track kind="subtitles" src="" srclang="it" label="Italy">
                </video>
            </div>
        </div>

        <script>var playDuration = 129 * 60;</script>
    </div>
</section>
<section class="container p-3 p-md-4 rounded-lg mb-5" style="background-color: #0e1117">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-md-2 col-sm-4 col-3">
                    <img class="img-fluid" src="<?php echo htmlspecialchars($images_small, ENT_QUOTES, 'UTF-8');?>?resize=300,450" alt="Poster <?php echo htmlspecialchars($title, ENT_QUOTES, 'UTF-8');?> <?php echo htmlspecialchars($year, ENT_QUOTES, 'UTF-8');?>" title="Poster <?php echo htmlspecialchars($title, ENT_QUOTES, 'UTF-8');?> <?php echo htmlspecialchars($year, ENT_QUOTES, 'UTF-8');?>">
                </div>
                <div class="col-md-10 col-sm-8 col-9">
                    <div class="entry-title d-flex flex-column-reverse flex-md-row justify-content-between">
                        <h1 class="h2"><?php echo htmlspecialchars($title, ENT_QUOTES, 'UTF-8');?> <span class="tiny text-muted"><?php echo htmlspecialchars($year, ENT_QUOTES, 'UTF-8');?></span></h1>
                        <div class="sub-r">
                            <a href="/loading?id=<?php echo htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8');?>&amp;title=<?php echo htmlspecialchars($title, ENT_QUOTES, 'UTF-8');?>" class="btn subs">Subscribe | $0.00</a>
                        </div>
                    </div>
                    <div class="entry-info mb-3">
                        <div class="__rate">
                            <?php for($k=1; $k<=$get_rating; $k++){ ?><i class="fa fa-star text-warning"></i><?php } ?><?php for($i=$emp_rating; $i>=1; $i--){ ?><i class="fa fa-star-o text-muted"></i><?php $k++; } ?>
                        </div>
                        <div class="__info">
                            <span class="text-muted small"><?php echo htmlspecialchars($get_rating, ENT_QUOTES, 'UTF-8');?>/10</span> <span class="text-muted small">by <?php echo htmlspecialchars($vote_count, ENT_QUOTES, 'UTF-8');?> users</span>
                        </div>
                    </div>
                    <div class="entry-description text-muted">
                        <p><?php echo htmlspecialchars($description, ENT_QUOTES, 'UTF-8');?></p>
                    </div>
                    <div class="entry-table">
                        <ul>
                            <li>Released: <span><?php echo date('M d, Y', strtotime($release_date));?></span></li>
                            <li>Runtime: <span><?php echo htmlspecialchars($runtime, ENT_QUOTES, 'UTF-8');?> minutes</span></li>
                            <li>Genre: <span><?php echo htmlspecialchars($genre, ENT_QUOTES, 'UTF-8');?></span></li>
                            <li>Stars: <span><?php echo htmlspecialchars($cast, ENT_QUOTES, 'UTF-8');?></span></li>
                            <li>Production Company: <span><?php echo htmlspecialchars($companies, ENT_QUOTES, 'UTF-8');?></span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container">
    <div class="col-xs-12">
        <link rel="stylesheet" href="https://cdn.statically.io/gh/ermania96/style/9ce246ab/comment.css" type="text/css" />
        <div class="mvi-comment">
            <div style="padding: 20px; background: white; margin-top: 1px; overflow: hidden; font-family: sans-serif!important;">
                <div class="comment-wrapper">
                    <div class="comments-title">811 Comments</div>
                    <div class="comment-area">
                        <input class="comment-input" placeholder="Write a comment..." type="text">
                        <div class="share-facebook" display="block">
                            <label class="uiInputLabelInput _55sg _kv1">
                                <input id="js_e4" type="checkbox"><span></span>
                            </label>
                            <label class="_3-99 _2ern _50f8 _5kx5 uiInputLabelLabel" for="js_e4"><font color="black">Facebook</font></label>
                        </div>
                        <div class="commbt"></div>
                    </div>
                </div>
                <div class="comment-row">
                    <img class="profile-img" src="https://i.imgur.com/7euoCmo.jpg" alt="">
                    <div class="user-wrapper">
                        <a href="loading.php?" class="js-clickoffer">
                            <div class="username">Aston Ayers</div>
                        </a>
                        <div class="clear"></div>
                        <div class="user-comment">Only easy and free Signup, finally I can watch in HD quality. Thank you!</div>
                        <div class="user-comment"><i class="fa fa-star" style="color:gold"></i><i class="fa fa-star" style="color:gold"></i><i class="fa fa-star" style="color:gold"></i><i class="fa fa-star" style="color:gold"></i><i class="fa fa-star" style="color:gold"></i></div>
                        <div class="like-reply time">
                            <a href="loading.php?" class="js-clickoffer">Reply</a> · <a href="live.php?" class="js-clickoffer like"><i></i> 71</a> · <a href="loading.php?" class="loading.php?">Like</a> · 12 minutes ago
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
                <!-- Other comments can follow the same structure -->
            </div>
        </div>
    </div>
</div>
<section class="container">
    <div class="divider"></div>
    <div class="row">
        <div class="col-12 mb-4">
            <h3 class="h4">Movie Recommendations</h3>
        </div>
    </div>
    <div class="owl-carousel owl-loaded owl-drag">
        <div class="owl-stage-outer">
            <div class="owl-stage">
                <?php 
                if (empty($_GET['page'])) { $page = 1; } else { $page = $_GET['page']; }
                $Movies = unserialize(ocim_data_movie('home_m_', $page, 'getNowPlayingMovies'));
                if (is_array($Movies['result'])):
                    foreach (array_slice($Movies['result'], 0, 20) as $row) {
                ?>
                <div class="owl-item active" style="width: 150px; margin-right: 30px;">
                    <article id="<?php echo htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8');?>" class="item">
                        <div class="thumb mb-4">
                            <a href="<?php echo seo_movie($row['id'], $row['title']);?>" rel="bookmark" title="<?php echo htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8');?> (<?php echo date('Y', strtotime($row['release_date']));?>)">
                                <div class="_img_holder">
                                    <img class="img-fluid rounded" src="<?php echo htmlspecialchars($row['poster_path'], ENT_QUOTES, 'UTF-8');?>" alt="Image <?php echo htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8');?>" title="Image <?php echo htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8');?> (<?php echo date('Y', strtotime($row['release_date']));?>)">
                                    <div class="_overlay_link">
                                        <button class="play-button play-button--small" type="button"></button>
                                        <div class="rate"><i class="fa fa-star text-warning"></i> <span class="small text-white"><?php echo htmlspecialchars($row['vote_average'], ENT_QUOTES, 'UTF-8');?>/10</span></div>
                                    </div>
                                </div>
                            </a>
                            <header class="entry-header">
                                <h2 class="entry-title">
                                    <a href="<?php echo seo_movie($row['id'], $row['title']);?>" class="_title" rel="bookmark" title="<?php echo htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8');?> (<?php echo date('Y', strtotime($row['release_date']));?>)"><?php echo htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8');?> (<?php echo date('Y', strtotime($row['release_date']));?>)</a>
                                </h2>
                            </header>
                        </div>
                    </article>
                </div>
                <?php 
                    }
                endif; 
                ?>
            </div>
        </div>
        <div class="owl-nav">
            <button type="button" role="presentation" class="owl-prev disabled"><span aria-label="Previous">‹</span></button>
            <button type="button" role="presentation" class="owl-next"><span aria-label="Next">›</span></button>
        </div>
        <div class="owl-dots disabled"></div>
    </div>
</section>
<div id="modal-watch" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body mopie-modal-content p-0 border" style="background-image: url('<?php echo htmlspecialchars($images, ENT_QUOTES, 'UTF-8');?>')">
                <div class="align-items-center d-flex flex-column justify-content-center position-relative p-3 pt-5 text-center">
                    <div class="ex-icon">
                        <i class="fa fa-exclamation fa-4x" aria-hidden="true"></i>
                    </div>
                    <div class="h3 font-bold mt-3">Activate your FREE Account!</div>
                    <p>You must create an account to continue watching</p>
                    <a href="/loading?id=<?php echo htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8');?>&amp;title=<?php echo htmlspecialchars($title, ENT_QUOTES, 'UTF-8');?>" class="btn btn-lg bg-theme bg-hover-theme mb-4">CREATE FREE ACCOUNT ➞</a>
                </div>
            </div>
            <div class="modal-footer align-items-center d-flex flex-column justify-content-center text-center text-dark">
                <p class="text-large mb-1"><i class="fa fa-clock-o mr-1" aria-hidden="true"></i><span class="text-large font-bold" style="font-weight: 700">Quick Sign Up!</span></p>
                <p class="small">It takes less then 1 minute to Sign Up, then you can enjoy Unlimited All Sport &amp; TV titles.</p>
            </div>
        </div>
    </div>
</div>
<footer class="footer">
    <div class="container">
        <div class="footer_wrapper d-flex flex-column flex-md-row">
            <div class="copyright">Copyright © <?php echo date('Y') ?> <span class="text-capitalize"><?php echo htmlspecialchars(site_path(), ENT_QUOTES, 'UTF-8');?></span> | All rights reserved</div>
            <div class="footer_links">
                <a href="<?php echo view_page('dmca-notice');?>">DMCA</a>
                <a href="<?php echo view_page('privacy-policy');?>">Privacy Policy</a>
                <a href="<?php echo view_page('contact-us');?>">Contact</a>
            </div>
        </div>
        <script type="text/javascript">
            var count = 11170;
            function tick() {
                count += Math.round(Math.random() * 50);
                document.querySelector('online').textContent = count;
                setTimeout(tick, Math.round(1000 + Math.random() * 2000));
            }
            tick();
        </script>
        <style type="text/css">
            #counter {
                position: fixed;
                right: 15px;
                bottom: 15px;
                padding: 7px 15px;
                background: rgba(0, 0, 0, .5);
                width: auto;
                z-index: 999;
            }
        </style>
        <div id="counter">
            <img src="https://i.imgur.com/ePsm8mf.gif" style="background-repeat: no-repeat;width:43px;z-index:999;height:11px;margin-bottom:5px;"> &nbsp;&nbsp;
            <span class="counter-value"><online></online></span>
            <span style="color:#fff;">Users Online </span>
        </div>
    </div>
</footer>
<script src="<?php style_theme();?>/js/s.js"></script>
<?php echo histats_write() ?>
</body>
</html>
