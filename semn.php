<?php

if (empty($_GET['page'])) {
    $pathinfo = pathinfo($uri);
    $dirname = str_replace('/' . config('category_url') . '/', '', $pathinfo['dirname']);
    $filename = $pathinfo['filename'];
    $page = 1;
} else {
    $dirname = $_GET['terms'];
    $filename = $_GET['id'];
    $page = $_GET['page'];
    $hal = ' Pages ' . $page;
    $title_after = $hal;
    $description_after = $hal . ' on ' . site_path();
}

$hack_title = ucwords($dirname) . ' Movies';
include('header.php');
?>
<div id="main">
    <div id="home" class="clearfix">
        <div class="container">
            <section class="col-md-12">
                <h3 class="widget-title">
                    <span>Category for "<?php echo htmlspecialchars($dirname); ?>"<?php echo htmlspecialchars($hal); ?></span>
                </h3>
                <div class="col-container clearfix">
                    <?php
                    $Movies = unserialize(ocim_data_genre('home_genre_' . $filename . '_', $filename, $page));
                    if (is_array($Movies['result'])) :
                        foreach (array_slice($Movies['result'], 0, 18) as $row) {
                    ?>
                            <article id="post-293660" class="col-md-4 col-sm-6 col-xs-6 col-box">
                                <div class="backdrop-container">
                                    <img class="img-responsive ease" src="<?php echo htmlspecialchars($row['backdrop_path']); ?>" alt="<?php echo htmlspecialchars($row['title']); ?>">
                                    <span class="img-cover"></span>
                                </div>
                                <div class="detail-container ease">
                                    <span class="star">
                                        <span class="glyphicon glyphicon-star"></span>
                                        <span class="rate"><?php echo htmlspecialchars($row['vote_average']); ?></span>
                                    </span>
                                    <header class="entry-header">
                                        <h2 class="entry-title text-center">
                                            <a href="<?php echo seo_movie($row['id'], $row['title']); ?>"><?php echo htmlspecialchars($row['title']); ?></a>
                                        </h2>
                                    </header>
                                    <div class="play-btn">
                                        <a href="<?php echo seo_movie($row['id'], $row['title']); ?>">
                                            <span class="play-btn-border ease">
                                                <i class="fa fa-play-circle headline-round ease" aria-hidden="true"></i>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </article>
                    <?php
                        }
                    endif;
                    ?>
                </div>
                <footer class="page-footer">
                    <nav class="text-center">
                        <ul class="pagination pagination-sm">
                            <?php
                            if ($Movies['total_results'][0] > 19) :
                                require_once(DOCUMENT_ROOT . '/app/class/CSSPagination.class.php');

                                $totalResults = $Movies['total_results'][0] > 1000 ? 1000 : $Movies['total_results'][0];
                                $limit = 20;
                                $link = '/?action=category&terms=' . urlencode($dirname) . '&id=' . urlencode($filename);
                                $pagination = new CSSPagination($totalResults, $limit, $link);
                                $pagination->setPage($page);
                                echo $pagination->showPage();
                            endif;
                            ?>
                        </ul>
                    </nav>
                </footer>
            </section>
        </div>
    </div>
</div>
<?php include('footer.php'); ?>
