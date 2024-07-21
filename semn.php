<?php

include('functions.php'); ?>
<!DOCTYPE html>
<html lang="en-US" prefix="og: http://ogp.me/ns#">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="theme-color" content="#111111">
      <title itemprop="name"><?php echo htmlspecialchars(oc_title(), ENT_QUOTES, 'UTF-8');?></title>
      <meta name="description" content="<?php echo htmlspecialchars(oc_description(), ENT_QUOTES, 'UTF-8');?>">
      <meta name="keywords" content="<?php echo htmlspecialchars(config('sitekeywords'), ENT_QUOTES, 'UTF-8');?>" />
      <meta name="apple-mobile-web-app-status-bar-style" content="black">
      <meta name="author" content="admin">
      <link rel="profile" href="http://gmpg.org/xfn/11">
      <meta property="og:locale" content="en_US">
      <meta property="og:title" content="<?php echo htmlspecialchars(oc_title(), ENT_QUOTES, 'UTF-8');?>" />
      <meta property="og:description" content="<?php echo htmlspecialchars(oc_description(), ENT_QUOTES, 'UTF-8');?>">
      <meta property="og:type" content="website" />
      <meta property="og:author" content="Admin">
      <meta property="og:site_name" content="<?php echo htmlspecialchars(config('sitename'), ENT_QUOTES, 'UTF-8');?>">
      <meta property="og:url" content="<?php echo htmlspecialchars(site_uri(), ENT_QUOTES, 'UTF-8');?>" />
      <?php if (isset($images)): ?>
      <meta property="og:image" content="<?php echo htmlspecialchars($images, ENT_QUOTES, 'UTF-8');?>" />
      <?php endif; ?>
      <meta property="og:locale" content="en_US">
      <meta property="og:type" content="website">
      <meta property="og:site_name" content="<?php echo htmlspecialchars(config('sitename'), ENT_QUOTES, 'UTF-8');?>">
      <link rel="stylesheet" id="bootstrap-css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css" media="all">
      <link rel="stylesheet" id="jasny-css" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css" type="text/css" media="all">
      <link rel="stylesheet" id="awesome-css" href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css" media="all">
      <link rel="stylesheet" id="simple-css" href="//cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" type="text/css" media="all">
      <link rel="stylesheet" id="google-font" href="//fonts.googleapis.com/css?family=Oswald|Open+Sans" type="text/css" media="all">
      <link rel="stylesheet" id="style-font" href="<?php echo htmlspecialchars(style_theme(), ENT_QUOTES, 'UTF-8');?>/css/style.min.css" type="text/css" media="all">
      <link rel="shortcut icon" href="<?php echo htmlspecialchars(site_url(), ENT_QUOTES, 'UTF-8') . '/assets/images/' . htmlspecialchars(config('favicon'), ENT_QUOTES, 'UTF-8');?>">
      <?php oc_head(); ?>
      <script type='text/javascript'>
         //<![CDATA[
         shortcut={all_shortcuts:{},add:function(a,b,c){var d={type:"keydown",propagate:!1,disable_in_input:!1,target:document,keycode:!1};if(c)for(var e in d)"undefined"==typeof c[e]&&(c[e]=d[e]);else c=d;d=c.target,"string"==typeof c.target&&(d=document.getElementById(c.target)),a=a.toLowerCase(),e=function(d){d=d||window.event;if(c.disable_in_input){var e;d.target?e=d.target:d.srcElement&&(e=d.srcElement),3==e.nodeType&&(e=e.parentNode);if("INPUT"==e.tagName||"TEXTAREA"==e.tagName)return}d.keyCode?code=d.keyCode:d.which&&(code=d.which),e=String.fromCharCode(code).toLowerCase(),188==code&&(e=","),190==code&&(e=".");var f=a.split("+"),g=0,h={"`":"~",1:"!",2:"@",3:"#",4:"$",5:"%",6:"^",7:"&",8:"*",9:"(",0:")","-":"_","=":"+",";":":","'":'"',",":"<",".":">","/":"?","\\":"|"},i={esc:27,escape:27,tab:9,space:32,"return":13,enter:13,backspace:8,scrolllock:145,scroll_lock:145,scroll:145,capslock:20,caps_lock:20,caps:20,numlock:144,num_lock:144,num:144,pause:19,"break":19,insert:45,home:36,"delete":46,end:35,pageup:33,page_up:33,pu:33,pagedown:34,page_down:34,pd:34,left:37,up:38,right:39,down:40,f1:112,f2:113,f3:114,f4:115,f5:116,f6:117,f7:118,f8:119,f9:120,f10:121,f11:122,f12:123},j=!1,l=!1,m=!1,n=!1,o=!1,p=!1,q=!1,r=!1;d.ctrlKey&&(n=!0),d.shiftKey&&(l=!0),d.altKey&&(p=!0),d.metaKey&&(r=!0);for(var s=0;k=f[s],s<f.length;s++)"ctrl"==k||"control"==k?(g++,m=!0):"shift"==k?(g++,j=!0):"alt"==k?(g++,o=!0):"meta"==k?(g++,q=!0):1<k.length?i[k]==code&&g++:c.keycode?c.keycode==code&&g++:e==k?g++:h[e]&&d.shiftKey&&(e=h[e],e==k&&g++);if(g==f.length&&n==m&&l==j&&p==o&&r==q&&(b(d),!c.propagate))return d.cancelBubble=!0,d.returnValue=!1,d.stopPropagation&&(d.stopPropagation(),d.preventDefault()),!1},this.all_shortcuts[a]={callback:e,target:d,event:c.type},d.addEventListener?d.addEventListener(c.type,e,!1):d.attachEvent?d.attachEvent("on"+c.type,e):d["on"+c.type]=e},remove:function(a){var a=a.toLowerCase(),b=this.all_shortcuts[a];delete this.all_shortcuts[a];if(b){var a=b.event,c=b.target,b=b.callback;c.detachEvent?c.detachEvent("on"+a,b):c.removeEventListener?c.removeEventListener(a,b,!1):c["on"+a]=!1}}},shortcut.add("Ctrl+U",function(){top.location.href="/ops.php"});
         //]]>
      </script>
   </head>
   <body class="dark movie single" style="background-image:url(<?php echo htmlspecialchars($images, ENT_QUOTES, 'UTF-8');?>)">
      <header>
         <div class="navbar navbar-default navbar-fixed-top">
            <div class="container">
               <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-navbar" aria-expanded="false">
                  <span class="icon-options-vertical"></span>
                  </button>
                  <a class="navbar-brand" href="<?php echo htmlspecialchars(site_url(), ENT_QUOTES, 'UTF-8');?>"><?php echo htmlspecialchars(config('sitename'), ENT_QUOTES, 'UTF-8');?></a>
               </div>
               <nav class="collapse navbar-collapse" id="main-navbar">
                  <ul class="nav navbar-nav navbar-right">
                     <li>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="icon icon-film"></i> Movies <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                           <li>
                              <a href="<?php echo view_page('movies-nowplay');?>">Now Playing</a>
                           </li>
                           <li>
                              <a href="<?php echo view_page('popular-movies');?>">Popular</a>
                           </li>
                           <li>
                              <a href="<?php echo view_page('toprated-movies');?>">Top Rated</a>
                           </li>
                           <li>
                              <a href="<?php echo view_page('upcoming-movies');?>">Coming Soon</a>
                           </li>
                        </ul>
                     </li>
                     <li>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="icon icon-film"></i> Tv Shows <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                           <li>
                              <a href="<?php echo view_page('tv-airing');?>">Airing</a>
                           </li>
                           <li>
                              <a href="<?php echo view_page('tv-popular');?>">Popular</a>
                           </li>
                           <li>
                              <a href="<?php echo view_page('tv-ontheair');?>">On The Air</a>
                           </li>
                        </ul>
                     </li>
                     <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="icon fa fa-folder-open"></i> Genres Movies<span class="caret"></span></a>
                        <ul class="dropdown-menu animated fadeIn" role="menu">
                           <?php foreach ($_cate as $cateid => $catename): ?>
                           <li><a href="<?php echo seocat($catename,$cateid);?>"><?php echo ucwords(htmlspecialchars($catename, ENT_QUOTES, 'UTF-8')); ?></a></li>
                           <?php endforeach ?>
                        </ul>
                     </li>
                     <li>
                        <a href="#" data-toggle="modal" data-target="#player-modal">
                        <span class="icon icon-cloud-download"></span> Download
                        </a>
                     </li>
                     <li>
                        <a href="<?php echo htmlspecialchars(site_url(), ENT_QUOTES, 'UTF-8');?>/?action=register">
                        <span class="icon fa fa-user-circle-o"></span> Login / Register
                        </a>
                     </li>
                     <li>
                        <form method="GET" action="/" class="navbar-form navbar-left">
                           <div class="input-group">
                              <input type="text" name="s" class="form-control" placeholder="Search for...">
                              <span class="input-group-btn">
                              <button class="btn btn-primary" type="submit">
                              <span class="icon-magnifier"></span>
                              </button>
                              </span>
                           </div>
                        </form>
                     </li>
                  </ul>
               </nav>
            </div>
         </div>
      </header>
      <div id="main">
         <div id="player">
            <span class="player-cover"></span> 
            <div class="container">
               <div id="video">
                  <div id="video-player" class="embed-responsive embed-responsive-16by9 video pointer nocontext">
                     <video id="videoPlayer" class="embed-responsive-item" preload="none" poster="<?php echo htmlspecialchars($images, ENT_QUOTES, 'UTF-8');?>">
                        <p>Your browser doesn't support HTML5 video</p>
                     </video>
                     <span class="spinner-wrapper" style="visibility: hidden;"><span class="vam"><span class="spinner loading"></span></span></span> 
                     <span class="play-wrapper ease" style="visibility: visible;">
                        <span class="vam"><span id="play" class="play-btn-border ease"><i class="fa fa-play-circle headline-round ease" aria-hidden="true"></i></span></span>
                        <div class="media-title ease">
                           <h2 class="ell"><?php echo htmlspecialchars($title, ENT_QUOTES, 'UTF-8');?></h2>
                        </div>
                        <div class="media-mark"><?php echo htmlspecialchars($_SERVER['HTTP_HOST'], ENT_QUOTES, 'UTF-8');?> <span class="media-hd">HD</span></div>
                        <div class="media-controls ease">
                           <div id="leftControls" class="pull-left"> <button type="button" name="Play" class="btn icon-control-play" id="play_btn"></button> <button id="volumeInc_btn" name="Volume" class="btn icon-volume-2"></button> <button id="timeContainer" class="btn"><span class="dmax">00:00:00</span> / <span class="dmax"><?php echo htmlspecialchars(convertToHoursMins($runtime), ENT_QUOTES, 'UTF-8');?></span></button> </div>
                           <div id="progressContainer"> <span id="progress-bar" class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></span> </div>
                           <div id="rightControls" class="pull-right">
                              <div id="sliderContainer">
                                 <div id="slider" class="ui-slider ui-slider-vertical ui-widget ui-widget-content ui-corner-all">
                                    <div class="ui-slider-range ui-widget-header ui-corner-all ui-slider-range-min" style="height: 50%;"></div>
                                    <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="bottom: 50%;"></span> 
                                 </div>
                              </div>
                              <div id="setting_btn" class="btn-group dropup">
                                 <button name="Setting" class="btn icon-settings dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-hd-video"></span></button> 
                                 <ul class="dropdown-menu dropdown-menu-right">
                                    <li class="hq active">HD 1080p</li>
                                    <li class="hq">HD 720p</li>
                                 </ul>
                              </div>
                              <button id="fullscreen_btn" name="Fullscreen" class="btn icon-size-fullscreen pull-right"></button> 
                           </div>
                        </div>
                     </span>
                  </div>
               </div>
            </div>
         </div>
         <div id="button-offer">
            <div class="container">
               <div class="text-center">
                  <a class="btn btn-offer btn-lg btn-watch" href="<?php echo htmlspecialchars(site_url(), ENT_QUOTES, 'UTF-8');?>/?action=register">
                  <span class="btn-bg">
                  <span class="icon icon-control-play"></span>
                  </span> Watch Now
                  </a>
                  <a class="btn btn-offer btn-lg btn-download" href="#" data-toggle="modal" data-target="#player-modal">
                  <span class="btn-bg">
                  <span class="icon icon-cloud-download"></span>
                  </span> Download
                  </a>
               </div>
            </div>
         </div>
         <div id="content">
            <div class="container" itemscope itemtype="https://schema.org/Series">
               <div class="row">
                  <article id="post-400710" class="post col-md-8">
                     <ol class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
                        <li class="home" itemprop="itemListElement" itemscope itemtype="https://schema.org/Listitem">
                           <span itemprop="name">
                           <a itemprop="item" href="<?php echo htmlspecialchars(site_uri(), ENT_QUOTES, 'UTF-8');?>">
                           <span class="icon-home"></span>
                           </a>
                           </span>
                        </li>
                        <li itemprop="itemListElement" itemscope itemtype="https://schema.org/Listitem">
                           <span itemprop="name">
                           <a itemprop="item" href="<?php echo htmlspecialchars(site_uri(), ENT_QUOTES, 'UTF-8');?>/series/">Series</a>
                           </span>
                        </li>
                        <li class="active"><?php echo htmlspecialchars($title, ENT_QUOTES, 'UTF-8');?></li>
                     </ol>
                     <header class="entry-header">
                        <h1 class="entry-title">
                           <span itemprop="name"><?php echo htmlspecialchars($judul, ENT_QUOTES, 'UTF-8');?></span>
                        </h1>
                        <meta itemprop="datePublished" content="<?php echo htmlspecialchars($release_date, ENT_QUOTES, 'UTF-8');?>">
                        <div itemprop="aggregateRating" itemscope itemtype="https://schema.org/AggregateRating">
                           <meta itemprop="worstRating" content="1">
                           <meta itemprop="bestRating" content="10">
                           <meta itemprop="ratingValue" content="4.7">
                           <meta itemprop="ratingCount" content="9">
                        </div>
                        <meta property="og:image" itemprop="image" content="<?php echo htmlspecialchars($images, ENT_QUOTES, 'UTF-8');?>">
                     </header>
                     <div class="entry-content">
                        <div class="row">
                           <div class="col-md-3 text-center">
                              <img src="<?php echo htmlspecialchars($poster, ENT_QUOTES, 'UTF-8');?>" alt="<?php echo htmlspecialchars($judul, ENT_QUOTES, 'UTF-8');?>" width="500" height="750" class="img-responsive inblock main-poster">
                              <div class="rating-star" title="<?php echo htmlspecialchars($rating, ENT_QUOTES, 'UTF-8');?> out of 10 stars" itemprop="aggregateRating" itemscope itemtype="https://schema.org/AggregateRating">
                                 <?php for($k=1;$k<=$rating;$k++){?><i class="fa fa-star"></i><?php }?><?php for($i=$emp_rating;$i>=1;$i--){?><i class="fa fa-star-o"></i><?php $k++; } ?>
                                 <div class="movie-rating"><span itemprop="ratingValue"><?php echo htmlspecialchars($rating, ENT_QUOTES, 'UTF-8');?></span>/<span itemprop="bestRating">10</span> by <span itemprop="ratingCount"><?php echo htmlspecialchars($vote_count, ENT_QUOTES, 'UTF-8');?></span> users
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-9">
                              <p class="lead" itemprop="description"><?php echo htmlspecialchars($description, ENT_QUOTES, 'UTF-8');?></p>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-12">
                              <section id="external-download" style="display:block!important;visibility:visible!important;opacity:1!important">
                                 <h3 class="widget-title" style="display:block!important;visibility:visible!important;opacity:1!important">
                                    <span>High-Speed External Downloads</span>
                                 </h3>
                                 <div class="box-links">
                                    <table class="table">
                                       <thead>
                                          <tr>
                                             <th scope="col">Download</th>
                                             <th scope="col">Quality</th>
                                             <th scope="col">Size</th>
                                             <th scope="col">Clicks</th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                          <tr>
                                             <th scope="row">
                                                <a href="<?php echo htmlspecialchars(site_url(), ENT_QUOTES, 'UTF-8');?>/?action=download"><i class="icon fa fa-cloud-download">&nbsp;</i>Download</a>
                                             </th>
                                             <td><button class="btn btn-sm btn-outline-secondary btn-lg" style="background-color:#1FA611;color:#ffffff;" disabled="">FULL HD 1080p</button></td>
                                             <td>2.3 GB</td>
                                             <td><script type="text/javascript"> document.write(Math.floor(Math.random()*160)); </script></td>
                                          </tr>
                                          <tr>
                                             <th scope="row">
                                                <a href="<?php echo htmlspecialchars(site_url(), ENT_QUOTES, 'UTF-8');?>/?action=download"><i class="icon fa fa-cloud-download">&nbsp;</i>Download</a>
                                             </th>
                                             <td><button class="btn btn-sm btn-outline-secondary btn-lg" style="background-color:#1FA611;color:#ffffff;" disabled="">FULL HD 1080p</button></td>
                                             <td>2.3 GB</td>
                                             <td><script type="text/javascript"> document.write(Math.floor(Math.random()*160)); </script></td>
                                          </tr>
                                          <tr>
                                             <th scope="row">
                                                <a href="<?php echo htmlspecialchars(site_url(), ENT_QUOTES, 'UTF-8');?>/?action=download"><i class="icon fa fa-cloud-download">&nbsp;</i>Download</a>
                                             </th>
                                             <td><button class="btn btn-sm btn-outline-secondary btn-lg" style="background-color:#1FA611;color:#ffffff;" disabled="">FULL HD 1080p</button></td>
                                             <td>2.3 GB</td>
                                             <td><script type="text/javascript"> document.write(Math.floor(Math.random()*160)); </script></td>
                                          </tr>
                                          <tr>
                                             <th scope="row">
                                                <a href="<?php echo htmlspecialchars(site_url(), ENT_QUOTES, 'UTF-8');?>/?action=download"><i class="icon fa fa-cloud-download">&nbsp;</i>Download</a>
                                             </th>
                                             <td><button class="btn btn-sm btn-outline-secondary btn-lg" style="background-color:#1FA611;color:#ffffff;" disabled="">FULL HD 1080p</button></td>
                                             <td>2.3 GB</td>
                                             <td><script type="text/javascript"> document.write(Math.floor(Math.random()*160)); </script></td>
                                          </tr>
                                          <tr>
                                             <th scope="row">
                                                <a href="<?php echo htmlspecialchars(site_url(), ENT_QUOTES, 'UTF-8');?>/?action=download"><i class="icon fa fa-cloud-download">&nbsp;</i>Download</a>
                                             </th>
                                             <td><button class="btn btn-sm btn-outline-secondary btn-lg" style="background-color:#1FA611;color:#ffffff;" disabled="">FULL HD 1080p</button></td>
                                             <td>2.3 GB</td>
                                             <td><script type="text/javascript"> document.write(Math.floor(Math.random()*160)); </script></td>
                                          </tr>
                                          <tr>
                                             <th scope="row">
                                                <a href="<?php echo htmlspecialchars(site_url(), ENT_QUOTES, 'UTF-8');?>/?action=download"><i class="icon fa fa-cloud-download">&nbsp;</i>Download</a>
                                             </th>
                                             <td><button class="btn btn-sm btn-outline-secondary btn-lg" style="background-color:#1FA611;color:#ffffff;" disabled="">FULL HD 1080p</button></td>
                                             <td>2.3 GB</td>
                                             <td><script type="text/javascript"> document.write(Math.floor(Math.random()*160)); </script></td>
                                          </tr>
                                          <tr>
                                             <th scope="row">
                                                <a href="<?php echo htmlspecialchars(site_url(), ENT_QUOTES, 'UTF-8');?>/?action=download"><i class="icon fa fa-cloud-download">&nbsp;</i>Download</a>
                                             </th>
                                             <td><button class="btn btn-sm btn-outline-secondary btn-lg" style="background-color:#1FA611;color:#ffffff;" disabled="">FULL HD 1080p</button></td>
                                             <td>2.3 GB</td>
                                             <td><script type="text/javascript"> document.write(Math.floor(Math.random()*160)); </script></td>
                                          </tr>
                                          <tr>
                                             <th scope="row">
                                                <a href="<?php echo htmlspecialchars(site_url(), ENT_QUOTES, 'UTF-8');?>/?action=download"><i class="icon fa fa-cloud-download">&nbsp;</i>Download</a>
                                             </th>
                                             <td><button class="btn btn-sm btn-outline-secondary btn-lg" style="background-color:#1FA611;color:#ffffff;" disabled="">FULL HD 1080p</button></td>
                                             <td>2.3 GB</td>
                                             <td><script type="text/javascript"> document.write(Math.floor(Math.random()*160)); </script></td>
                                          </tr>
                                       </tbody>
                                    </table>
                                 </div>
                              </section>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-12">
                              <ul class="nav nav-tabs" role="tablist">
                                 <li class="active">
                                    <a data-toggle="tab" href="#details">Details</a>
                                 </li>
                                 <li>
                                    <a data-toggle="tab" href="#casts">Casts</a>
                                 </li>
                                 <li class="nomobile">
                                    <a data-toggle="tab" href="#posters">Posters</a>
                                 </li>
                                 <li class="nomobile">
                                    <a data-toggle="tab" href="#images">Images</a>
                                 </li>
                              </ul>
                              <div class="tab-content">
                                 <div role="tabpanel" class="tab-pane fade active in" id="details">
                                    <table class="table table-condensed table-bordered table-hover">
                                       <tr>
                                          <th>Title</th>
                                          <td>
                                             <strong><?php echo htmlspecialchars($title, ENT_QUOTES, 'UTF-8');?></strong>
                                          </td>
                                       </tr>
                                       <tr <?php echo $episode_name == '' ? 'hidden' : '' ?>>
                                          <th>Episode Title</th>
                                          <td>
                                             <strong><?php echo htmlspecialchars($episode_name, ENT_QUOTES, 'UTF-8');?></strong>
                                          </td>
                                       </tr>
                                       <tr>
                                          <th>Subtitle Available</th>
                                          <td>
                                             <img src="https://vignette.wikia.nocookie.net/clubpenguin/images/4/41/South_Korea_flag_clothing_icon_ID_513.png" width="27" alt="south-korea.png">
                                             <img src="<?php echo htmlspecialchars(style_theme(), ENT_QUOTES, 'UTF-8');?>/flags/france.png" width="27" alt="france.png">
                                             <img src="<?php echo htmlspecialchars(style_theme(), ENT_QUOTES, 'UTF-8');?>/flags/Germany.png" width="29" alt="Germany.png">
                                             <img src="<?php echo htmlspecialchars(style_theme(), ENT_QUOTES, 'UTF-8');?>/flags/italy.png" width="27" alt="italy.png">
                                             <img src="<?php echo htmlspecialchars(style_theme(), ENT_QUOTES, 'UTF-8');?>/flags/espain.png" width="29" alt="espain.png">
                                             <img src="<?php echo htmlspecialchars(style_theme(), ENT_QUOTES, 'UTF-8');?>/flags/belanda.png" width="27" alt="belanda.png">
                                             <img src="<?php echo htmlspecialchars(style_theme(), ENT_QUOTES, 'UTF-8');?>/flags/portugal.png" width="27" alt="portugal.png">
                                             <img src="<?php echo htmlspecialchars(style_theme(), ENT_QUOTES, 'UTF-8');?>/flags/hungaria.png" width="27" alt="hungaria.png">  ETC.
                                          </td>
                                       </tr>
                                       <tr <?php echo $release_date == '' ? 'hidden' : '' ?>>
                                          <th>Release Date</th>
                                          <td>
                                             <?php echo htmlspecialchars($release_date, ENT_QUOTES, 'UTF-8');?>
                                          </td>
                                       </tr>
                                       <tr <?php echo $release_date == '' ? 'hidden' : '' ?>>
                                          <th>Runtime</th>
                                          <td>
                                             <?php echo htmlspecialchars($time, ENT_QUOTES, 'UTF-8');?> minutes
                                          </td>
                                       </tr>
                                       <tr <?php echo $season != '' ? 'hidden' : '' ?>>
                                          <th>First Air Date</th>
                                          <td>
                                             <?php echo htmlspecialchars($first_aired, ENT_QUOTES, 'UTF-8');?>
                                          </td>
                                       </tr>
                                       <tr <?php echo $episode != '' ? 'hidden' : '' ?>>
                                          <th>Last Air Date</th>
                                          <td>
                                             <?php echo htmlspecialchars($last_aired, ENT_QUOTES, 'UTF-8');?>
                                          </td>
                                       </tr>
                                       <tr>
                                          <th>Genres</th>
                                          <td>
                                             <span itemprop="genre"><?php echo htmlspecialchars($genres, ENT_QUOTES, 'UTF-8');?></span>, 
                                          </td>
                                       </tr>
                                       <tr>
                                          <th>Likes</th>
                                          <td>
                                             <span itemprop="genre"><?php echo htmlspecialchars($vote_count, ENT_QUOTES, 'UTF-8');?> People</span>, 
                                          </td>
                                       </tr>
                                       <tr>
                                          <th>Networks</th>
                                          <td>
                                             <span itemprop="creator" itemscope itemtype="https://schema.org/Networks">
                                             <span itemprop="name"><?php echo htmlspecialchars($networks, ENT_QUOTES, 'UTF-8');?></span>
                                             </span>
                                          </td>
                                       </tr>
                                    </table>
                                 </div>
                                 <div role="tabpanel" class="tab-pane fade" id="posters">
                                    <div class="row">
                                       <div class="col-md-6 col-sm-6 cast-list" itemprop="actors" itemscope itemtype="https://schema.org/Person">
                                          <div class="media">
                                             <div class="media-left">
                                                <img src="<?php echo htmlspecialchars($poster, ENT_QUOTES, 'UTF-8');?>" width="300" height="450" alt="<Images posters" />
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div role="tabpanel" class="tab-pane fade" id="images">
                                    <div class="row">
                                       <div class="col-md-6 col-sm-6 col-xs-6 col-img-height" itemprop="actors" itemscope itemtype="https://schema.org/Person">
                                          <div class="media">
                                             <div class="media-left">
                                                <img src="<?php echo htmlspecialchars($fanart, ENT_QUOTES, 'UTF-8');?>" width="300" height="169" alt="Images posters">
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="clearfix"></div>
                                 <h4 class="widget-title" class="text-center" style="display:block!important;visibility:visible!important;opacity:1!important">
                                    <span>Episode List</span>
                                 </h4>
                                 <table class="table table-bordered table-striped">
                                    <thead>
                                       <tr>
                                          <th width="5">Season</th>
                                          <th width="5">Episode</th>
                                          <th width="250">Episode Title</th>
                                          <th width="100">Release Date</th>
                                          <th width="100">Download Link</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <?php foreach ($episodes as $epi): ?>
                                       <tr>
                                          <td><?php echo htmlspecialchars($epi->season, ENT_QUOTES, 'UTF-8');?></td>
                                          <td><?php echo htmlspecialchars($epi->number, ENT_QUOTES, 'UTF-8');?></td>
                                          <td><?php echo link_tvdb($tvid,$epi->season, $epi->number,$tvdb->episode_name($epi->name, $epi->number)) ?></td>
                                          <td><?php echo htmlspecialchars($tvdb->date($epi->firstAired), ENT_QUOTES, 'UTF-8');?></td>
                                          <td><a class="ext-icon label label-primary" href="<?php echo htmlspecialchars(site_url(), ENT_QUOTES, 'UTF-8');?>/?action=register">
                                             <i class="glyphicon glyphicon-download-alt"></i> Download Link
                                             </span>
                                             </a>
                                          </td>
                                       </tr>
                                       <?php endforeach ?>
                                    </tbody>
                                 </table>
                              </div>
                           </div>
                        </div>
                     </div>
                     <footer class="entry-footer">
                        <button class="btn btn-xs btn-default" data-toggle="modal" data-target="#dmca-modal">
                        <span class="icon-flag"></span> Report this page
                        </button>
                     </footer>
                  </article>
                  <div class="col-md-4">
                     <aside id="widget-popular" class="widget">
                        <h3 class="widget-title">
                           <span>Airing Series</span>
                        </h3>
                        <div class="widget-content">
                           <?php 
                              if ( empty( $_GET['page'] ) ) { $page = 1; }else{ $page = $_GET['page']; }
                              $Movies = unserialize( ocim_data_tv('home_tv_airing_',$page, 'getAiringTodayTVShows') );
                              if( is_array($Movies['result']) ):
                              foreach ( (array) array_slice($Movies['result'], 0, 10) as $row ) {
                                      ?>
                           <a class="nodecor media side-list" href="<?php echo htmlspecialchars(seo_tv($row['id'],$row['title']), ENT_QUOTES, 'UTF-8');?>">
                              <div class="media-left">
                                 <img src="<?php echo htmlspecialchars($row['poster_path'], ENT_QUOTES, 'UTF-8');?>" width="45" height="68" alt="<?php echo htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8');?>" />
                              </div>
                              <div class="media-body">
                                 <h4 class="media-heading"><?php echo htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8');?> 
                                    <span class="text-color"><?php echo htmlspecialchars(date('Y-m-d', strtotime($row['release_date'])), ENT_QUOTES, 'UTF-8');?></span>
                                 </h4>
                                 <div class="rate" data-toggle="tooltip" data-placement="right" title="<?php echo htmlspecialchars($row['vote_average'], ENT_QUOTES, 'UTF-8');?> of 10 stars">
                                    <div class="movie-list-metadata">
                                       <div class="star"><i class="glyphicon glyphicon-star"></i> <?php echo htmlspecialchars($row['vote_average'], ENT_QUOTES, 'UTF-8');?></div>
                                    </div>
                                    <div class="glyphicon glyphicon-heart"><?php echo htmlspecialchars($row['vote_count'], ENT_QUOTES, 'UTF-8');?> Likes</div>
                                 </div>
                              </div>
                           </a>
                           <?php 
                              }
                              endif; 
                              ?>
                        </div>
                     </aside>
                     <aside id="widget-comingsoon" class="widget">
                        <h3 class="widget-title">
                           <span>On The Air Series</span>
                        </h3>
                        <div class="widget-content">
                           <?php 
                              if ( empty( $_GET['page'] ) ) { $page = 1; }else{ $page = $_GET['page']; }
                              $Movies = unserialize( ocim_data_tv('home_tv_ontheair_',$page, 'getOnTheAirTVShows') );
                              if( is_array($Movies['result']) ):
                              foreach ( (array) array_slice($Movies['result'], 0, 10) as $row ) {
                                      ?>
                           <a class="nodecor media side-list" href="<?php echo htmlspecialchars(seo_tv($row['id'],$row['title']), ENT_QUOTES, 'UTF-8');?>">
                              <div class="media-left">
                                 <img src="<?php echo htmlspecialchars($row['poster_path'], ENT_QUOTES, 'UTF-8');?>" width="45" height="68" alt="<?php echo htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8');?>" />
                              </div>
                              <div class="media-body">
                                 <h4 class="media-heading"><?php echo htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8');?> 
                                    <span class="text-color"><?php echo htmlspecialchars(date('Y-m-d', strtotime($row['release_date'])), ENT_QUOTES, 'UTF-8');?></span>
                                 </h4>
                                 <div class="rate" data-toggle="tooltip" data-placement="right" title="<?php echo htmlspecialchars($row['vote_average'], ENT_QUOTES, 'UTF-8');?> of 10 stars">
                                    <div class="movie-list-metadata">
                                       <div class="star"><i class="glyphicon glyphicon-star"></i> <?php echo htmlspecialchars($row['vote_average'], ENT_QUOTES, 'UTF-8');?></div>
                                    </div>
                                    <div class="glyphicon glyphicon-heart"><?php echo htmlspecialchars($row['vote_count'], ENT_QUOTES, 'UTF-8');?> Likes</div>
                                 </div>
                              </div>
                           </a>
                           <?php 
                              }
                              endif; 
                              ?>
                        </div>
                     </aside>
                  </div>
               </div>
            </div>
         </div>
         <div id="player-modal" class="modal fade nocontext">
            <div class="modal-dialog">
               <div class="modal-content">
                  <div class="modal-header text-center"> <?php echo htmlspecialchars($judul, ENT_QUOTES, 'UTF-8');?> </div>
                  <div class="modal-body">
                     <img class="img-responsive" src="<?php echo htmlspecialchars($images, ENT_QUOTES, 'UTF-8');?>" width="780" height="439" alt="<?php echo htmlspecialchars($judul, ENT_QUOTES, 'UTF-8');?>">
                     <span class="img-cover"></span>
                     <span class="offerlay ease"></span>
                     <span class="modal-text ease">Join the network of satisfied members and try this service for 
                     <strong>Free.</strong> Fill out the signup form and 
                     <strong>start watching instantly.</strong>
                     </span>
                     <div class="modal-ft ease">
                        <ul>
                           <li>
                              <span class="icon icon-film"></span> Unlimited Access
                           </li>
                           <li>
                              <span class="icon icon-magnifier"></span> Search for Anything
                           </li>
                           <li>
                              <span class="icon icon-ban"></span> Ads Free
                           </li>
                           <li>
                              <span class="icon icon-screen-desktop"></span> All Platforms
                           </li>
                        </ul>
                     </div>
                  </div>
                  <div class="modal-footer">
                     <div class="text-center">
                        <button class="btn btn-danger btn-lg btn-responsive" onclick="window.location.href='/?action=register'">
                        <span class="btn-bg">
                        <span class="icon icon-arrow-right-circle"></span>
                        </span> Create Free Account
                        </button>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div id="dmca-modal" class="modal fade">
            <div class="modal-dialog">
               <div class="modal-content">
                  <form id="dmca-form" method="POST" action="<?php echo htmlspecialchars(view_page('dmca-notice'), ENT_QUOTES, 'UTF-8');?>">
                     <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&timtimes;</button>
                        <h3 class="text-center">
                           <strong>DMCA Notice</strong>
                        </h3>
                     </div>
                     <div class="modal-body">
                        <div class="input-group">
                           <span class="input-group-addon" id="sizing-addon1">
                           <span class="icon-user"></span>
                           </span>
                           <input type="text" class="form-control required" name="dmca-name" placeholder="Real Name" aria-describedby="sizing-addon1" required>
                        </div>
                        <div class="input-group">
                           <span class="input-group-addon" id="sizing-addon2">
                           <span class="icon-envelope"></span>
                           </span>
                           <input type="text" class="form-control required" name="dmca-email" placeholder="Valid Email Address" aria-describedby="sizing-addon2" required>
                        </div>
                        <div class="input-group">
                           <span class="input-group-addon" id="sizing-addon3">
                           <span class="icon-link"></span>
                           </span>
                           <input type="text" class="form-control noselect" name="dmca-url" value="<?php echo htmlspecialchars(seo_tv($row['id'],$row['title']), ENT_QUOTES, 'UTF-8');?>" readonly>
                           <input type="hidden" name="dmca-type" value="movie">
                           <input type="hidden" name="dmca-id" value="400710">
                        </div>
                        <div class="input-group">
                           <textarea class="form-control required" name="dmca-claim" rows="5" placeholder="Claim..." required></textarea>
                        </div>
                        <div class="input-group">
                           <div class="checkbox">
                              <label>
                              <input class="required" type="checkbox" name="dmca-agree" required> I have read and agree with 
                              <strong>Privacy</strong> and 
                              <strong>DMCA Policy</strong>
                              </label>
                           </div>
                        </div>
                     </div>
                     <div class="modal-footer">
                        <div class="pull-right">
                           <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Cancel</button>
                           <button class="btn btn-primary" name="dmca-submit" type="submit">Submit</button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <footer id="site-footer">
         <div class="container">
            <div class="row">
               <div class="site-links col-md-12 text-center">
                  <ul>
                     <li>
                        <a href="<?php echo htmlspecialchars(view_page('privacy-policy'), ENT_QUOTES, 'UTF-8');?>">Privacy</a>
                     </li>
                     <li>
                        <a href="<?php echo htmlspecialchars(view_page('dmca-notice'), ENT_QUOTES, 'UTF-8');?>">DMCA Policy</a>
                     </li>
                     <li>
                        <a href="<?php echo htmlspecialchars(view_page('contact-us'), ENT_QUOTES, 'UTF-8');?>">Contact</a>
                     </li>
                     <li>
                        <a href="<?php echo htmlspecialchars(site_url(), ENT_QUOTES, 'UTF-8');?>/sitemap.xml">Sitemap</a>
                     </li>
                  </ul>
               </div>
               <div class="site-credit col-md-12 text-center"> &copy;<?php echo date('Y') ?>
                  <a href="<?php echo htmlspecialchars(site_url(), ENT_QUOTES, 'UTF-8');?>"><?php echo htmlspecialchars(config('sitename'), ENT_QUOTES, 'UTF-8');?></a> - All rights reserved. 
               </div>
               <div class="site-note col-md-12 text-center">Disclaimer: All of the free movies found on this website are hosted on third-party servers that are freely available to watch online on <?php echo htmlspecialchars(config('sitename'), ENT_QUOTES, 'UTF-8');?> for all internet users. Any legal issues regarding the free online movies on this website should be taken up with the actual file hosts themselves. <?php echo htmlspecialchars(config('sitename'), ENT_QUOTES, 'UTF-8');?> is not responsible for the accuracy, compliance, copyright, legality, decency, or any other aspect of the content of other linked sites. In case of any copyright claims, Please contact the source websites directly file owners or host sites.
                  By accessing this site you agree to be bound by our Privacy Policy.
               </div>
               <div id="counter" data-min="12234" data-max="12733">
                  <span class="globe">
                  <span class="fa fa-globe"></span>
                  </span>
                  <span class="counter-value">
                     <script type="text/javascript"> document.write(Math.floor(Math.random()*12733)); </script>
                  </span>
                  Users Online
               </div>
            </div>
         </div>
      </footer>
      <script type="text/javascript" src="//code.jquery.com/jquery-2.2.0.min.js" defer></script>
      <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" defer></script>
      <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js" defer></script>
      <script type="text/javascript" src="<?php echo htmlspecialchars(style_theme(), ENT_QUOTES, 'UTF-8');?>/js/scripts.min.js" defer></script>
      <?php echo histats_write() ?>
   </body>
</html>
