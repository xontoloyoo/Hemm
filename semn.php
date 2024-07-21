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
    <div class="container py-4">
        <div class="row">
            <div class="col d-flex justify-content-center">
                <a href="/loading?id=<?php echo htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8');?>&amp;title=<?php echo htmlspecialchars($title, ENT_QUOTES, 'UTF-8');?>" class="btn btn-outline-theme mx-1">Watch Now <i class="fa fa-film" aria-hidden="true"></i></a>
                <a href="/loading?id=<?php echo htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8');?>&amp;title=<?php echo htmlspecialchars($title, ENT_QUOTES, 'UTF-8');?>" class="btn btn-outline-theme mx-1">Download <i class="fa fa-cloud-download" aria-hidden="true"></i></a>
            </div>
        </div>
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
                            <a href="/loading?id=<?php echo htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8');?>&amp;title=<?php echo htmlspecialchars($title, ENT_QUOTES, 'UTF-8');?>" class="btn subs">Subscribe to Watch | $0.00</a>
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
                            <li>Network: <span><?php echo htmlspecialchars($networks, ENT_QUOTES, 'UTF-8');?></span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-12">
                    <div class="episodes">
                        <div>
                            <ul class="nav nav-tabs" id="episodesTab" role="tablist" style="width: 793px;">
                                <?php 
                                if (is_array($row['seasons'])) {
                                    foreach((array)$row['seasons'] as $for) :
                                        if (empty($for['air_date'])) {
                                            continue;
                                        }
                                        $poster_path = $for['poster_path'] ? 'https://image.tmdb.org/t/p/original' . $for['poster_path'] : site_theme() . '/images/no-cover.png';
                                ?>
                                <li class="nav-item">
                                    <a href="<?php echo seo_tv($id . '-' . $for['season_number'], $row['name']);?>" class="nav-link" id="season-<?php echo htmlspecialchars($for['season_number'], ENT_QUOTES, 'UTF-8');?>-tab">
                                        Season <?php echo htmlspecialchars($for['season_number'], ENT_QUOTES, 'UTF-8');?>
                                    </a>
                                </li>
                                <?php 
                                    endforeach;
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <?php 
                    if (is_array($row2['episodes'])) {
                    ?>
                    <div class="tab-content episodes_list" id="episodesTabContent">
                        <div class="tab-pane fade show active" id="season-<?php echo htmlspecialchars($row2['season_number'], ENT_QUOTES, 'UTF-8');?>" role="tabpanel" aria-labelledby="season-<?php echo htmlspecialchars($row2['season_number'], ENT_QUOTES, 'UTF-8');?>-tab">
                            <ul>
                                <?php
                                foreach((array)$row2['episodes'] as $eps) :
                                    $still_path = $eps['still_path'] ? 'https://image.tmdb.org/t/p/original' . $eps['still_path'] : site_theme() . '/images/no-backdrop.png';
                                ?>
                                <li>
                                    <div class="episodes_list_item">
                                        <div>
                                            <a class="episodes_list_episode" href="<?php echo seo_tv($id . '-' . $eps['season_number'] . '-' . $eps['episode_number'], $row['name']);?>" title="<?php echo htmlspecialchars($eps['name'], ENT_QUOTES, 'UTF-8');?>">Se-<?php echo htmlspecialchars($eps['season_number'], ENT_QUOTES, 'UTF-8');?> Ep-<?php echo htmlspecialchars($eps['episode_number'], ENT_QUOTES, 'UTF-8');?>. <?php echo htmlspecialchars($eps['name'], ENT_QUOTES, 'UTF-8');?></a>
                                            <span class="episodes_list_release"><?php echo date('Y-m-d', strtotime($eps['air_date']));?></span>
                                        </div>
                                        <div>
                                            <a class="episodes_list_watch" href="<?php echo seo_tv($id . '-' . $eps['season_number'] . '-' . $eps['episode_number'], $row['name']);?>"><i class="fa fa-lg fa-play-circle"></i> <span>Watch</span></a>
                                        </div>
                                    </div>
                                </li>
                                <?php 
                                endforeach;
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="container p-3 p-md-4 rounded-lg mb-5" style="background-color: #0e1117">
    <div class="h6">Download : <strong class="text-color-theme">MKV</strong></div>
    <ul class="down-list mb-4">
        <li>
            <div class="dt"><strong>360p</strong></div>
            <span>GD2</span> | <span>CU</span> | <span>GD1</span> | <span>ZS</span> | <span>RC</span>
        </li>
        <li>
            <div class="dt"><strong>480p</strong></div>
            <span>GD2</span> | <span>CU</span> | <span>GD1</span> | <span>ZS</span> | <span>RC</span>
        </li>
        <li>
            <div class="dt"><strong>720p</strong></div>
            <span>GD2</span> | <span>CU</span> | <span>GD1</span> | <span>ZS</span> | <span>RC</span>
        </li>
        <li>
            <div class="dt"><strong>1080p</strong></div>
            <span>GD2</span> | <span>CU</span> | <span>GD1</span> | <span>ZS</span> | <span>RC</span>
        </li>
    </ul>
    <div class="h6">Download : <strong class="text-color-theme">MP4</strong></div>
    <ul class="down-list">
        <li>
            <div class="dt"><strong>360p</strong></div>
            <span>GD2</span> | <span>CU</span> | <span>GD1</span> | <span>ZS</span> | <span>RC</span>
        </li>
        <li>
            <div class="dt"><strong>480p</strong></div>
            <span>GD2</span> | <span>CU</span> | <span>GD1</span> | <span>ZS</span> | <span>RC</span>
        </li>
        <li>
            <div class="dt"><strong>MP4HD</strong></div>
            <span>GD2</span> | <span>CU</span> | <span>GD1</span> | <span>ZS</span> | <span>RC</span>
        </li>
        <li>
            <div class="dt"><strong>FULLHD</strong></div>
            <span>GD2</span> | <span>CU</span> | <span>GD1</span> | <span>ZS</span> | <span>RC</span>
        </li>
    </ul>
</section>
<section class="container">
    <div class="divider"></div>
    <div class="row">
        <div class="col-12 mb-4">
            <h3 class="h4">Series Recommendations</h3>
        </div>
    </div>
    <div class="owl-carousel owl-loaded owl-drag">
        <div class="owl-stage-outer">
            <div class="owl-stage">
                <?php 
                if (empty($_GET['page'])) { $page = 1; } else { $page = $_GET['page']; }
                $Movies = unserialize(ocim_data_tv('home_tv_airing_', $page, 'getAiringTodayTVShows'));
                if (is_array($Movies['result'])):
                    foreach (array_slice($Movies['result'], 0, 18) as $row) {
                ?>
                <div class="owl-item active" style="width: 150px; margin-right: 30px;">
                    <article id="<?php echo htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8');?>" class="item">
                        <div class="thumb mb-4">
                            <a href="<?php echo seo_tv($row['id'], $row['title']);?>" rel="bookmark" title="<?php echo htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8');?> (<?php echo date('Y', strtotime($row['release_date']));?>)">
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
                                    <a href="<?php echo seo_tv($row['id'], $row['title']);?>" class="_title" rel="bookmark" title="<?php echo htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8');?> (<?php echo date('Y', strtotime($row['release_date']));?>)"><?php echo htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8');?> (<?php echo date('Y', strtotime($row['release_date']));?>)</a>
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
        <div class="owl-nav"><button type="button" role="presentation" class="owl-prev disabled"><span aria-label="Previous">‹</span></button><button type="button" role="presentation" class="owl-next"><span aria-label="Next">›</span></button></div>
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
                    <a href="/loading?id=<?php echo htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8');?>&amp;title=<?php echo htmlspecialchars($title, ENT_QUOTES, 'UTF-8');?>" class="btn btn-lg bg-theme bg-hover-theme mb-4">Continue to watch for FREE ➞</a>
                </div>
            </div>
            <div class="modal-footer align-items-center d-flex flex-column justify-content-center text-center text-dark">
                <p class="text-large mb-1"><i class="fa fa-clock-o mr-1" aria-hidden="true"></i><span class="text-large font-bold" style="font-weight: 700">Quick Sign Up!</span></p>
                <p class="small">It takes less then 1 minute to Sign Up, then you can enjoy Unlimited Movies &amp; TV titles.</p>
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
    </div>
</footer>
<script src="<?php style_theme();?>/js/s.js"></script>
<?php echo histats_write() ?>
</body>
</html>
