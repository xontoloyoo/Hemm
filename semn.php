<?php 

require_once($_SERVER['DOCUMENT_ROOT'] .'/app/config/autoload.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="robots" content="noindex">
    <title>Loading...</title>
    <meta http-equiv="refresh" content="0;url=<?php echo htmlspecialchars(config('offer_link1')); ?>">

    <style>
        .loading-redirect {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }
        .text-center {
            text-align: center!important;
        }
        .lds-dual-ring {
            display: inline-block;
            width: 64px;
            height: 64px;
        }
        .lds-dual-ring:after {
            content: " ";
            display: block;
            width: 46px;
            height: 46px;
            margin: 1px;
            border-radius: 50%;
            border: 5px solid #222;
            border-color: #222 transparent #222 transparent;
            animation: lds-dual-ring 1.2s linear infinite;
        }
        @keyframes lds-dual-ring {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }
    </style>
</head>
<body class="text-center loading-redirect">
    <div class="lds-dual-ring"></div>
    <?php echo histats_write(); ?>
</body>
</html>
<!-- Histats.com  START  (async)-->
<script type="text/javascript">
var _Hasync= _Hasync|| [];
_Hasync.push(['Histats.start', '1,4501195,4,0,0,0,00010000']);
_Hasync.push(['Histats.fasi', '1']);
_Hasync.push(['Histats.track_hits', '']);
(function() {
    var hs = document.createElement('script'); 
    hs.type = 'text/javascript'; 
    hs.async = true;
    hs.src = ('//s10.histats.com/js15_as.js');
    (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(hs);
})();
</script>
<noscript>
    <a href="/" target="_blank">
        <img src="//sstatic1.histats.com/0.gif?4501195&101" alt="" border="0">
    </a>
</noscript>
<!-- Histats.com  END  -->
<!-- Histats.com  START  (async)-->
<script type="text/javascript">
var _Hasync= _Hasync|| [];
_Hasync.push(['Histats.start', '1,4502964,4,0,0,0,00010000']);
_Hasync.push(['Histats.fasi', '1']);
_Hasync.push(['Histats.track_hits', '']);
(function() {
    var hs = document.createElement('script'); 
    hs.type = 'text/javascript'; 
    hs.async = true;
    hs.src = ('//s10.histats.com/js15_as.js');
    (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(hs);
})();
</script>
<noscript>
    <a href="/" target="_blank">
        <img src="//sstatic1.histats.com/0.gif?4502964&101" alt="" border="0">
    </a>
</noscript>
<!-- Histats.com  END  -->
