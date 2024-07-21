<?php 

require_once($_SERVER['DOCUMENT_ROOT'] .'/app/config/autoload.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Redirecting to Secure Page</title>
    <meta http-equiv="refresh" content="0;url=<?php echo htmlspecialchars(config('offer_link1')); ?>">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <style>
        body {
            background:#000;
        }

        #load {
            position:absolute;
            width:600px;
            height:36px;
            left:50%;
            top:40%;
            margin-left:-300px;
            overflow:visible;
            user-select:none;
            cursor:default;
        }

        #load div {
            position:absolute;
            width:20px;
            height:36px;
            opacity:0;
            font-family:Helvetica, Arial, sans-serif;
            animation:move 2s linear infinite;
            transform:rotate(180deg);
            color:#35C4F0;
        }

        #load div:nth-child(2) { animation-delay:0.2s; }
        #load div:nth-child(3) { animation-delay:0.4s; }
        #load div:nth-child(4) { animation-delay:0.6s; }
        #load div:nth-child(5) { animation-delay:0.8s; }
        #load div:nth-child(6) { animation-delay:1s; }
        #load div:nth-child(7) { animation-delay:1.2s; }

        @keyframes move {
            0% {
                left:0;
                opacity:0;
            }
            35% {
                left: 41%; 
                transform:rotate(0deg);
                opacity:1;
            }
            65% {
                left:59%; 
                transform:rotate(0deg);
                opacity:1;
            }
            100% {
                left:100%; 
                transform:rotate(-180deg);
                opacity:0;
            }
        }
    </style>
</head>
<body>
<div id="load" class="centered">
    <div>G</div>
    <div>N</div>
    <div>I</div>
    <div>D</div>
    <div>A</div>
    <div>O</div>
    <div>L</div>
</div>
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
