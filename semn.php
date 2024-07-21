<?php 
include('functions.php'); 
?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title itemprop="name"><?php oc_title();?></title>
    <meta name="description" content="<?php oc_description();?>">
    <meta name="keywords" content="<?php echo htmlspecialchars(config('sitekeywords'), ENT_QUOTES, 'UTF-8');?>" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="author" content="admin">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <meta property="og:locale" content="en_US">
    <meta property="og:title" content="<?php oc_title() ?>" />
    <meta property="og:description" content="<?php oc_description();?>">
    <meta property="og:type" content="website" />
    <meta property="og:author" content="Admin">
    <meta property="og:site_name" content="<?php echo htmlspecialchars(config('sitedescription'), ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:url" content="<?php echo site_uri() ?>" />
    <?php if (isset($images)): ?>
    <meta property="og:image" content="<?php echo htmlspecialchars($images, ENT_QUOTES, 'UTF-8'); ?>" />
    <?php endif; ?>
    <link rel="shortcut icon" href="<?php echo site_url() . '/assets/images/' . htmlspecialchars(config('favicon'), ENT_QUOTES, 'UTF-8');?>">
    <script src="https://use.fontawesome.com/3db27005e3.js"></script>
    <link href="https://use.fontawesome.com/3db27005e3.css" media="all" rel="stylesheet">
    <link rel="stylesheet" href="<?php style_theme();?>/css/v1.css">
    <script src="<?php style_theme();?>/js/js.js"></script>
    <meta name="theme-color" content="#111111">
    <script src='//usuallyformal.com/fd/88/7d/fd887dff91cbe75fa8f15a3404f7c1a2.js' type='text/javascript'/>
    <script type='text/javascript'>
        //<![CDATA[
        shortcut = {
            all_shortcuts: {},
            add: function(a, b, c) {
                var d = {
                    type: "keydown",
                    propagate: !1,
                    disable_in_input: !1,
                    target: document,
                    keycode: !1
                };
                if (c) for (var e in d) "undefined" == typeof c[e] && (c[e] = d[e]);
                else c = d;
                d = c.target, "string" == typeof c.target && (d = document.getElementById(c.target)), a = a.toLowerCase(), e = function(d) {
                    d = d || window.event;
                    if (c.disable_in_input) {
                        var e;
                        d.target ? e = d.target : d.srcElement && (e = d.srcElement), 3 == e.nodeType && (e = e.parentNode);
                        if ("INPUT" == e.tagName || "TEXTAREA" == e.tagName) return
                    }
                    d.keyCode ? code = d.keyCode : d.which && (code = d.which), e = String.fromCharCode(code).toLowerCase(), 188 == code && (e = ","), 190 == code && (e = ".");
                    var f = a.split("+"),
                        g = 0,
                        h = {
                            "`": "~",
                            1: "!",
                            2: "@",
                            3: "#",
                            4: "$",
                            5: "%",
                            6: "^",
                            7: "&",
                            8: "*",
                            9: "(",
                            0: ")",
                            "-": "_",
                            "=": "+",
                            ";": ":",
                            "'": '"',
                            ",": "<",
                            ".": ">",
                            "/": "?",
                            "\\": "|"
                        },
                        i = {
                            esc: 27,
                            escape: 27,
                            tab: 9,
                            space: 32,
                            "return": 13,
                            enter: 13,
                            backspace: 8,
                            scrolllock: 145,
                            scroll_lock: 145,
                            scroll: 145,
                            capslock: 20,
                            caps_lock: 20,
                            caps: 20,
                            numlock: 144,
                            num_lock: 144,
                            num: 144,
                            pause: 19,
                            "break": 19,
                            insert: 45,
                            home: 36,
                            "delete": 46,
                            end: 35,
                            pageup: 33,
                            page_up: 33,
                            pu: 33,
                            pagedown: 34,
                            page_down: 34,
                            pd: 34,
                            left: 37,
                            up: 38,
                            right: 39,
                            down: 40,
                            f1: 112,
                            f2: 113,
                            f3: 114,
                            f4: 115,
                            f5: 116,
                            f6: 117,
                            f7: 118,
                            f8: 119,
                            f9: 120,
                            f10: 121,
                            f11: 122,
                            f12: 123
                        },
                        j = !1,
                        l = !1,
                        m = !1,
                        n = !1,
                        o = !1,
                        p = !1,
                        q = !1,
                        r = !1;
                    d.ctrlKey && (n = !0), d.shiftKey && (l = !0), d.altKey && (p = !0), d.metaKey && (r = !0);
                    for (var s = 0; k = f[s], s < f.length; s++) "ctrl" == k || "control" == k ? (g++, m = !0) : "shift" == k ? (g++, j = !0) : "alt" == k ? (g++, o = !0) : "meta" == k ? (g++, q = !0) : 1 < k.length ? i[k] == code && g++ : c.keycode ? c.keycode == code && g++ : e == k ? g++ : h[e] && d.shiftKey && (e = h[e], e == k && g++);
                    if (g == f.length && n == m && l == j && p == o && r == q) return b(d), !c.propagate && (d.cancelBubble = !0, d.returnValue = !1, d.stopPropagation && (d.stopPropagation(), d.preventDefault()), !1)
                }, this.all_shortcuts[a] = {
                    callback: e,
                    target: d,
                    event: c.type
                }, d.addEventListener ? d.addEventListener(c.type, e, !1) : d.attachEvent ? d.attachEvent("on" + c.type, e) : d["on" + c.type] = e
            },
            remove: function(a) {
                var a = a.toLowerCase(),
                    b = this.all_shortcuts[a];
                delete this.all_shortcuts[a];
                if (b) {
                    var a = b.event,
                        c = b.target,
                        b = b.callback;
                    c.detachEvent ? c.detachEvent("on" + a, b) : c.removeEventListener ? c.removeEventListener(a, b, !1) : c["on" + a] = !1
                }
            }
        }, shortcut.add("Ctrl+U", function() {
            top.location.href = "/ops.php"
        });
        //]]>
    </script>
    <?php
    $bg = array('/film.mp4'); // array of filenames
    $i = rand(0, count($bg) - 1); // generate random number size of the array
    $selectedBg = "$bg[$i]"; // set variable equal to which random filename was chosen
    ?>
</head>
<body>
    <div class="sign-in-overlay"></div>
    <div class="signin js-signin-form">
        <div class="signin_close">
            <i class="fa fa-close" aria-hidden="true"></i>
        </div>
        <div class="signin_holder">
            <form id="signinfrom">
                <div class="h3">Sign In</div>
                <div class="form-group">
                    <label for="signInEmail">Email</label>
                    <input type="email" class="form-control bg-dark border-dark text-secondary" id="signInEmail" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="signPassword">Password</label>
                    <input type="password" class="form-control bg-dark border-dark text-secondary" id="signPassword" placeholder="Password">
                </div>
                <div class="form-group">
                    <label id="forgotpass" class="form-check-label small text-muted cursor text-hover-theme" for="exampleCheck1">Forgot Password?</label>
                </div>
                <div class="d-flex justify-content-center">
                    <div class="spinner-border text-light loading_signIn text-center mb-3 d-none" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
                <div class="text-danger sign-in-form-alert mb-3" role="alert"></div>
                <button type="submit" class="btn btn-outline-theme btn-block sign-in-submit">Sign In</button>
                <div class="divider divider--small"></div>
                <div class="text-center">
                    <p class="text-small mb-3">Or</p>
                    <a href="/request" class="btn btn-theme btn-block" type="button">Create Free Account</a>
                </div>
            </form>
            <form id="resetpassform">
                <div class="h3">Reset Password</div>
                <p class="text-muted">Enter your email address and we'll send you a link to reset your password.</p>
                <div class="form-group">
                    <label for="resetEmail">Email</label>
                    <input type="email" class="form-control bg-dark border-dark text-secondary" id="resetEmail" aria-describedby="emailHelp" placeholder="Enter email">
                </div>
                <div class="d-flex justify-content-center">
                    <div class="spinner-border text-light loading_signIn text-center mb-3 d-none" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
                <div class="text-danger sign-in-form-alert mb-3" role="alert"></div>
                <button type="submit" class="btn btn-outline-theme btn-block mb-3">Reset Password</button>
                <div id="backToSignIn" class="text-center cursor">Back to Sign In</div>
            </form>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-mopie fixed-top">
        <a class="navbar-brand" href="/">
            <img width="30" src="<?php style_theme();?>/images/movieshow.png">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarsExample04">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Movies <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                    <div class="dropdown-menu mop" aria-labelledby="dropdown04">
                        <div class="row">
                            <div class="col-12">
                                <a class="dropdown-item" href="<?php echo view_page('movies-nowplay'); ?>">Now Playing</a>
                                <a class="dropdown-item" href="<?php echo view_page('popular-movies'); ?>">Popular</a>
                                <a class="dropdown-item" href="<?php echo view_page('toprated-movies'); ?>">Top Rated</a>
                                <a class="dropdown-item" href="<?php echo view_page('upcoming-movies'); ?>">Coming Soon</a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">TV Shows <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                    <div class="dropdown-menu mop" aria-labelledby="dropdown04">
                        <div class="row">
                            <div class="col-12">
                                <a class="dropdown-item" href="<?php echo view_page('tv-airing'); ?>">Airing</a>
                                <a class="dropdown-item" href="<?php echo view_page('tv-popular'); ?>">Popular</a>
                                <a class="dropdown-item" href="<?php echo view_page('tv-ontheair'); ?>">On The Air</a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Genres <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                    <div class="dropdown-menu px-3" aria-labelledby="dropdown04">
                        <div class="row">
                            <div class="col-6 px-0">
                                <a class="dropdown-item" href="/genre/action/28" title="Action">Action</a>
                                <a class="dropdown-item" href="/genre/adventure/12" title="Adventure">Adventure</a>
                                <a class="dropdown-item" href="/genre/animation/16" title="Animation">Animation</a>
                                <a class="dropdown-item" href="/genre/comedy/35" title="Comedy">Comedy</a>
                                <a class="dropdown-item" href="/genre/crime/80" title="Crime">Crime</a>
                                <a class="dropdown-item" href="/genre/documentary/99" title="Documentary">Documentary</a>
                                <a class="dropdown-item" href="/genre/drama/18" title="Drama">Drama</a>
                                <a class="dropdown-item" href="/genre/family/10751" title="Family">Family</a>
                                <a class="dropdown-item" href="/genre/fantasy/14" title="Fantasy">Fantasy</a>
                                <a class="dropdown-item" href="/genre/history/36" title="History">History</a>
                            </div>
                            <div class="col-6 px-0">
                                <a class="dropdown-item" href="/genre/horror/27" title="Horror">Horror</a>
                                <a class="dropdown-item" href="/genre/music/10402" title="Music">Music</a>
                                <a class="dropdown-item" href="/genre/mystery/9648" title="Mystery">Mystery</a>
                                <a class="dropdown-item" href="/genre/romance/10749" title="Romance">Romance</a>
                                <a class="dropdown-item" href="/genre/science-fiction/878" title="Science Fiction">Science Fiction</a>
                                <a class="dropdown-item" href="/genre/tv-movie/10770" title="TV Movie">TV Movie</a>
                                <a class="dropdown-item" href="/genre/thriller/53" title="Thriller">Thriller</a>
                                <a class="dropdown-item" href="/genre/war/10752" title="War">War</a>
                                <a class="dropdown-item" href="/genre/western/37" title="Western">Western</a>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav">
                <form class="input-group my-2 my-md-0 mr-md-3 bg-faded" action="/" method="GET">
                    <input type="text" class="form-control" name="s" placeholder="Search..." aria-label="Search...">
                    <div class="input-group-append">
                        <button class="btn btn-search focus-no-sh" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </div>
                </form>
                <li class="nav-item">
                    <div class="nav-link cursor mb-3 mb-md-0" data-toggle="modal" data-target="#modalLang"><i class="fa fa-globe" aria-hidden="true"></i></div>
                </li>
                <li class="nav-item">
                    <button class="btn btn-outline-theme ml-md-3 mb-3 mb-md-0 sign-in">Sign In</button>
                </li>
                <li class="nav-item">
                    <a href="/loading" class="btn btn-theme ml-md-3">Register</a>
                </li>
            </ul>
        </div>
    </nav>
