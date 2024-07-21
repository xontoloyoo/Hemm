<?php

include('header.php');
?>
<div class="jumbo-hero" style="background-image:url(<?php echo style_theme();?>/images/bg.jpg)">
    <div class="container">
        <div class="jumbo-hero__inner">
            <h1 class="header"><?php echo htmlspecialchars(config('sitename'), ENT_QUOTES, 'UTF-8'); ?></h1>
            <h3 class="text-large"><?php echo htmlspecialchars(config('sitedescription'), ENT_QUOTES, 'UTF-8'); ?></h3>
            <a href="/loading" class="btn btn-outline-theme btn-lg mt-2 omh-goTo">Subscribe to Watch</a>
        </div>
    </div>
</div>
<section class="mopie-fade">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-4 d-flex justify-content-between">
                <h3 class="h4">
                    <a href="<?php echo view_page('popular-movies'); ?>" class="section-title" title="Popular">Popular <i class="fa fa-angle-right ml-3" aria-hidden="true"></i></a>
                </h3>
            </div>
        </div>
        <div class="owl-carousel">
            <?php 
            $page = empty($_GET['page']) ? 1 : intval($_GET['page']);
            $Movies = unserialize(ocim_data_movie('home_m_', $page, 'getNowPlayingMovies'));
            if (is_array($Movies['result'])) :
                foreach (array_slice($Movies['result'], 0, 20) as $row) {
            ?>
            <article id="<?php echo htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8');?>" class="item">
                <div class="thumb mb-4">
                    <a href="<?php echo seo_movie($row['id'], $row['title']); ?>" rel="bookmark" title="<?php echo htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8'); ?> (<?php echo date('Y', strtotime($row['release_date'])); ?>)">
                        <div class="_img_holder">
                            <img class="img-fluid rounded" src="<?php echo htmlspecialchars($row['poster_path'], ENT_QUOTES, 'UTF-8'); ?>?resize=300,450" alt="Image <?php echo htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8'); ?>" title="Image <?php echo htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8'); ?> (<?php echo date('Y', strtotime($row['release_date'])); ?>)">
                            <div class="_overlay_link">
                                <button class="play-button play-button--small" type="button"></button>
                                <div class="rate"><i class="fa fa-star text-warning"></i> <span class="small text-white"><?php echo htmlspecialchars($row['vote_average'], ENT_QUOTES, 'UTF-8'); ?>/10</span></div>
                            </div>
                        </div>
                    </a>
                    <header class="entry-header">
                        <h2 class="entry-title">
                            <a href="<?php echo seo_movie($row['id'], $row['title']); ?>" class="_title" rel="bookmark" title="<?php echo htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8'); ?> (<?php echo date('Y', strtotime($row['release_date'])); ?>)"><?php echo htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8'); ?> (<?php echo date('Y', strtotime($row['release_date'])); ?>)</a>
                        </h2>
                    </header>
                </div>
            </article>
            <?php 
                }
            endif; 
            ?>
        </div>
        <div class="divider"></div>
        <div class="row">
            <div class="col-12 mb-4 d-flex justify-content-between">
                <h3 class="h4">
                    <a href="<?php echo view_page('movies-nowplay'); ?>" class="section-title" title="Now Playing">Now Playing <i class="fa fa-angle-right ml-3" aria-hidden="true"></i></a>
                </h3>
            </div>
        </div>
        <div class="owl-carousel">
            <?php 
            $Movies = unserialize(ocim_data_movie('home_m_', $page, 'getNowPlayingMovies'));
            if (is_array($Movies['result'])) :
                foreach (array_slice($Movies['result'], 0, 20) as $row) {
            ?>
            <article id="<?php echo htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8');?>" class="item">
                <div class="thumb mb-4">
                    <a href="<?php echo seo_movie($row['id'], $row['title']); ?>" rel="bookmark" title="<?php echo htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8'); ?> (<?php echo date('Y', strtotime($row['release_date'])); ?>)">
                        <div class="_img_holder">
                            <img class="img-fluid rounded" src="<?php echo htmlspecialchars($row['poster_path'], ENT_QUOTES, 'UTF-8'); ?>?resize=300,450" alt="Image <?php echo htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8'); ?>" title="Image <?php echo htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8'); ?> (<?php echo date('Y', strtotime($row['release_date'])); ?>)">
                            <div class="_overlay_link">
                                <button class="play-button play-button--small" type="button"></button>
                                <div class="rate"><i class="fa fa-star text-warning"></i> <span class="small text-white"><?php echo htmlspecialchars($row['vote_average'], ENT_QUOTES, 'UTF-8'); ?>/10</span></div>
                            </div>
                        </div>
                    </a>
                    <header class="entry-header">
                        <h2 class="entry-title">
                            <a href="<?php echo seo_movie($row['id'], $row['title']); ?>" class="_title" rel="bookmark" title="<?php echo htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8'); ?> (<?php echo date('Y', strtotime($row['release_date'])); ?>)"><?php echo htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8'); ?> (<?php echo date('Y', strtotime($row['release_date'])); ?>)</a>
                        </h2>
                    </header>
                </div>
            </article>
            <?php 
                }
            endif; 
            ?>
        </div>
        <div class="divider"></div>
        <div class="row">
            <div class="col-12 mb-4 d-flex justify-content-between">
                <h3 class="h4">
                    <a href="<?php echo view_page('upcoming-movies'); ?>" class="section-title" title="Coming Soon">Coming Soon <i class="fa fa-angle-right ml-3" aria-hidden="true"></i></a>
                </h3>
            </div>
        </div>
        <div class="owl-carousel">
            <?php 
            $Movies = unserialize(ocim_data_movie('home_movie_upcoming_', $page, 'getUpcomingMovies'));
            if (is_array($Movies['result'])) :
                foreach (array_slice($Movies['result'], 0, 20) as $row) {
            ?>
            <article id="<?php echo htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8');?>" class="item">
                <div class="thumb mb-4">
                    <a href="<?php echo seo_movie($row['id'], $row['title']); ?>" rel="bookmark" title="<?php echo htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8'); ?> (<?php echo date('Y', strtotime($row['release_date'])); ?>)">
                        <div class="_img_holder">
                            <img class="img-fluid rounded" src="<?php echo htmlspecialchars($row['poster_path'], ENT_QUOTES, 'UTF-8'); ?>?resize=300,450" alt="Image <?php echo htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8'); ?>" title="Image <?php echo htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8'); ?> (<?php echo date('Y', strtotime($row['release_date'])); ?>)">
                            <div class="_overlay_link">
                                <button class="play-button play-button--small" type="button"></button>
                                <div class="rate"><i class="fa fa-star text-warning"></i> <span class="small text-white"><?php echo htmlspecialchars($row['vote_average'], ENT_QUOTES, 'UTF-8'); ?>/10</span></div>
                            </div>
                        </div>
                    </a>
                    <header class="entry-header">
                        <h2 class="entry-title">
                            <a href="<?php echo seo_movie($row['id'], $row['title']); ?>" class="_title" rel="bookmark" title="<?php echo htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8'); ?> (<?php echo date('Y', strtotime($row['release_date'])); ?>)"><?php echo htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8'); ?> (<?php echo date('Y', strtotime($row['release_date'])); ?>)</a>
                        </h2>
                    </header>
                </div>
            </article>
            <?php 
                }
            endif; 
            ?>
        </div>
        <div class="divider"></div>
        <div class="row">
            <div class="col-12 mb-4 d-flex justify-content-between">
                <h3 class="h4">
                    <a href="<?php echo view_page('toprated-movies'); ?>" class="section-title" title="Top Rated">Top Rated <i class="fa fa-angle-right ml-3" aria-hidden="true"></i></a>
                </h3>
            </div>
        </div>
        <div class="owl-carousel">
            <?php 
            $Movies = unserialize(ocim_data_movie('home_movie_toprated_', $page, 'getTopRatedMovies'));
            if (is_array($Movies['result'])) :
                foreach (array_slice($Movies['result'], 0, 20) as $row) {
            ?>
            <article id="<?php echo htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8');?>" class="item">
                <div class="thumb mb-4">
                    <a href="<?php echo seo_movie($row['id'], $row['title']); ?>" rel="bookmark" title="<?php echo htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8'); ?> (<?php echo date('Y', strtotime($row['release_date'])); ?>)">
                        <div class="_img_holder">
                            <img class="img-fluid rounded" src="<?php echo htmlspecialchars($row['poster_path'], ENT_QUOTES, 'UTF-8'); ?>?resize=300,450" alt="Image <?php echo htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8'); ?>" title="Image <?php echo htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8'); ?> (<?php echo date('Y', strtotime($row['release_date'])); ?>)">
                            <div class="_overlay_link">
                                <button class="play-button play-button--small" type="button"></button>
                                <div class="rate"><i class="fa fa-star text-warning"></i> <span class="small text-white"><?php echo htmlspecialchars($row['vote_average'], ENT_QUOTES, 'UTF-8'); ?>/10</span></div>
                            </div>
                        </div>
                    </a>
                    <header class="entry-header">
                        <h2 class="entry-title">
                            <a href="<?php echo seo_movie($row['id'], $row['title']); ?>" class="_title" rel="bookmark" title="<?php echo htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8'); ?> (<?php echo date('Y', strtotime($row['release_date'])); ?>)"><?php echo htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8'); ?> (<?php echo date('Y', strtotime($row['release_date'])); ?>)</a>
                        </h2>
                    </header>
                </div>
            </article>
            <?php 
                }
            endif; 
            ?>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-4 d-flex justify-content-between">
                <h3 class="h4">
                    <a href="<?php echo view_page('tv-popular'); ?>" class="section-title" title="Tv Popular">Tv Popular <i class="fa fa-angle-right ml-3" aria-hidden="true"></i></a>
                </h3>
            </div>
        </div>
        <div class="owl-carousel">
            <?php 
            $Movies = unserialize(ocim_data_tv('home_tv_popular_', $page, 'getPopularTVShows'));
            if (is_array($Movies['result'])) :
                foreach (array_slice($Movies['result'], 0, 20) as $row) {
            ?>
            <article id="<?php echo htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8');?>" class="item">
                <div class="thumb mb-4">
                    <a href="<?php echo seo_tv($row['id'], $row['title']); ?>" rel="bookmark" title="<?php echo htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8'); ?> (<?php echo date('Y', strtotime($row['release_date'])); ?>)">
                        <div class="_img_holder">
                            <img class="img-fluid rounded" src="<?php echo htmlspecialchars($row['poster_path'], ENT_QUOTES, 'UTF-8'); ?>?resize=300,450" alt="Image <?php echo htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8'); ?>" title="Image <?php echo htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8'); ?> (<?php echo date('Y', strtotime($row['release_date'])); ?>)">
                            <div class="_overlay_link">
                                <button class="play-button play-button--small" type="button"></button>
                                <div class="rate"><i class="fa fa-star text-warning"></i> <span class="small text-white"><?php echo htmlspecialchars($row['vote_average'], ENT_QUOTES, 'UTF-8'); ?>/10</span></div>
                            </div>
                        </div>
                    </a>
                    <header class="entry-header">
                        <h2 class="entry-title">
                            <a href="<?php echo seo_tv($row['id'], $row['title']); ?>" class="_title" rel="bookmark" title="<?php echo htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8'); ?> (<?php echo date('Y', strtotime($row['release_date'])); ?>)"><?php echo htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8'); ?> (<?php echo date('Y', strtotime($row['release_date'])); ?>)</a>
                        </h2>
                    </header>
                </div>
            </article>
            <?php 
                }
            endif; 
            ?>
        </div>

        <div class="divider"></div>

        <div class="row">
            <div class="col-12 mb-4 d-flex justify-content-between">
                <h3 class="h4">
                    <a href="<?php echo view_page('tv-airing'); ?>" class="section-title" title="Airing Today">Airing Today <i class="fa fa-angle-right ml-3" aria-hidden="true"></i></a>
                </h3>
            </div>
        </div>
        <div class="owl-carousel">
            <?php 
            $Movies = unserialize(ocim_data_tv('home_tv_airing_', $page, 'getAiringTodayTVShows'));
            if (is_array($Movies['result'])) :
                foreach (array_slice($Movies['result'], 0, 20) as $row) {
            ?>
            <article id="<?php echo htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8');?>" class="item">
                <div class="thumb mb-4">
                    <a href="<?php echo seo_tv($row['id'], $row['title']); ?>" rel="bookmark" title="<?php echo htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8'); ?> (<?php echo date('Y', strtotime($row['release_date'])); ?>)">
                        <div class="_img_holder">
                            <img class="img-fluid rounded" src="<?php echo htmlspecialchars($row['poster_path'], ENT_QUOTES, 'UTF-8'); ?>?resize=300,450" alt="Image <?php echo htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8'); ?>" title="Image <?php echo htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8'); ?> (<?php echo date('Y', strtotime($row['release_date'])); ?>)">
                            <div class="_overlay_link">
                                <button class="play-button play-button--small" type="button"></button>
                                <div class="rate"><i class="fa fa-star text-warning"></i> <span class="small text-white"><?php echo htmlspecialchars($row['vote_average'], ENT_QUOTES, 'UTF-8'); ?>/10</span></div>
                            </div>
                        </div>
                    </a>
                    <header class="entry-header">
                        <h2 class="entry-title">
                            <a href="<?php echo seo_tv($row['id'], $row['title']); ?>" class="_title" rel="bookmark" title="<?php echo htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8'); ?> (<?php echo date('Y', strtotime($row['release_date'])); ?>)"><?php echo htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8'); ?> (<?php echo date('Y', strtotime($row['release_date'])); ?>)</a>
                        </h2>
                    </header>
                </div>
            </article>
            <?php 
                }
            endif; 
            ?>
        </div>

        <div class="divider"></div>

        <div class="row">
            <div class="col-12 mb-4 d-flex justify-content-between">
                <h3 class="h4">
                    <a href="<?php echo view_page('tv-ontheair'); ?>" class="section-title" title="On The Air">On The Air <i class="fa fa-angle-right ml-3" aria-hidden="true"></i></a>
                </h3>
            </div>
        </div>
        <div class="owl-carousel">
            <?php 
            $Movies = unserialize(ocim_data_tv('home_tv_ontheair_', $page, 'getOnTheAirTVShows'));
            if (is_array($Movies['result'])) :
                foreach (array_slice($Movies['result'], 0, 20) as $row) {
            ?>
            <article id="<?php echo htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8');?>" class="item">
                <div class="thumb mb-4">
                    <a href="<?php echo seo_tv($row['id'], $row['title']); ?>" rel="bookmark" title="<?php echo htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8'); ?> (<?php echo date('Y', strtotime($row['release_date'])); ?>)">
                        <div class="_img_holder">
                            <img class="img-fluid rounded" src="<?php echo htmlspecialchars($row['poster_path'], ENT_QUOTES, 'UTF-8'); ?>?resize=300,450" alt="Image <?php echo htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8'); ?>" title="Image <?php echo htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8'); ?> (<?php echo date('Y', strtotime($row['release_date'])); ?>)">
                            <div class="_overlay_link">
                                <button class="play-button play-button--small" type="button"></button>
                                <div class="rate"><i class="fa fa-star text-warning"></i> <span class="small text-white"><?php echo htmlspecialchars($row['vote_average'], ENT_QUOTES, 'UTF-8'); ?>/10</span></div>
                            </div>
                        </div>
                    </a>
                    <header class="entry-header">
                        <h2 class="entry-title">
                            <a href="<?php echo seo_tv($row['id'], $row['title']); ?>" class="_title" rel="bookmark" title="<?php echo htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8'); ?> (<?php echo date('Y', strtotime($row['release_date'])); ?>)"><?php echo htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8'); ?> (<?php echo date('Y', strtotime($row['release_date'])); ?>)</a>
                        </h2>
                    </header>
                </div>
            </article>
            <?php 
                }
            endif; 
            ?>
        </div>
    </div>
</section>

<?php include('footer.php'); ?>
