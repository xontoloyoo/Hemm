<?php

include('header.php');
$newquery = htmlspecialchars(bad_words(get_search_query()), ENT_QUOTES, 'UTF-8');
?>
<div class="jumbo-hero" style="background-image:url(/assets/v1/images/bg.jpg)">
    <div class="container">
        <div class="jumbo-hero__inner">
            <h1 class="header">Search Result for "<?php echo $newquery; ?>"</h1>
        </div>
    </div>
</div>
<section class="mopie-fade">
   <div class="container">
      <div class="row">
<?php 
$page = !empty($_GET['page']) ? intval($_GET['page']) : 1;
$Movies = unserialize(ocim_data_search_movie(limit_word($newquery, 3), $page));

if (is_array($Movies['result'])):
    foreach (array_slice($Movies['result'], 0, 18) as $row) {
?>
        <article id="<?php echo htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8');?>" class="item col-6 col-md-2">
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
else:
    $unserialize = unserialize(ocim_search(limit_word($newquery, 3), limit_word($newquery, 3) . '_search'));
    if (is_array($unserialize['result'])):
        foreach ($unserialize['result'] as $sect) {
?>
        <article id="<?php echo htmlspecialchars($sect['id'], ENT_QUOTES, 'UTF-8');?>" class="item col-6 col-md-2">
            <div class="thumb mb-4">
                <a href="<?php echo seo_video($sect['id'], $sect['title']); ?>" rel="bookmark" title="<?php echo htmlspecialchars($sect['title'], ENT_QUOTES, 'UTF-8'); ?> (<?php echo date('Y', strtotime($sect['release_date'])); ?>)">
                    <div class="_img_holder">
                        <img class="img-fluid rounded" src="<?php echo htmlspecialchars($sect['poster_path'], ENT_QUOTES, 'UTF-8'); ?>?resize=300,450" alt="Image <?php echo htmlspecialchars($sect['title'], ENT_QUOTES, 'UTF-8'); ?>" title="Image <?php echo htmlspecialchars($sect['title'], ENT_QUOTES, 'UTF-8'); ?> (<?php echo date('Y', strtotime($sect['release_date'])); ?>)">
                        <div class="_overlay_link">
                            <button class="play-button play-button--small" type="button"></button>
                            <div class="rate"><i class="fa fa-star text-warning"></i> <span class="small text-white"><?php echo htmlspecialchars($sect['vote_average'], ENT_QUOTES, 'UTF-8'); ?>/10</span></div>
                        </div>
                    </div>
                </a>
                <header class="entry-header">
                    <h2 class="entry-title">
                        <a href="<?php echo seo_movie($sect['id'], $sect['title']); ?>" class="_title" rel="bookmark" title="<?php echo htmlspecialchars($sect['title'], ENT_QUOTES, 'UTF-8'); ?> (<?php echo date('Y', strtotime($sect['release_date'])); ?>)"><?php echo htmlspecialchars($sect['title'], ENT_QUOTES, 'UTF-8'); ?> (<?php echo date('Y', strtotime($sect['release_date'])); ?>)</a>
                    </h2>
                </header>
            </div>
        </article>
<?php
        }
    else:
?>
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h2><i class="fa fa-exclamation"></i> No Movie Found for this search</h2>
                </div>
            </div>
        </div>
        <br>
<?php 
    endif;
endif;

if (config('tvdb_search') == "false"):
    $tvdb  = new Tvdb(options('tvdb_api'));
    $serie = $tvdb->search($newquery);
    if (!empty($serie)):
        foreach ($serie as $tv):
            $_seri = $tvdb->seriesEpisode($tv->id)['serie'];
?>
        <article id="<?php echo htmlspecialchars($sect['id'], ENT_QUOTES, 'UTF-8');?>" class="item col-6 col-md-2">
            <div class="thumb mb-4">
                <a href="<?php seo_serie($tv->id) ?>" rel="bookmark" title="<?php echo htmlspecialchars($tv->name, ENT_QUOTES, 'UTF-8'); ?>">
                    <div class="_img_holder">
                        <img class="img-fluid rounded" src="<?php echo htmlspecialchars($tvdb->poster($_seri->poster), ENT_QUOTES, 'UTF-8'); ?>?resize=300,450" alt="Image <?php echo htmlspecialchars($tv->name, ENT_QUOTES, 'UTF-8'); ?>" title="Image <?php echo htmlspecialchars($tv->name, ENT_QUOTES, 'UTF-8'); ?>">
                        <div class="_overlay_link">
                            <button class="play-button play-button--small" type="button"></button>
                            <div class="rate"><i class="fa fa-star text-warning"></i> <span class="small text-white"><?php echo htmlspecialchars($_seri->rating, ENT_QUOTES, 'UTF-8'); ?>/10</span></div>
                        </div>
                    </div>
                </a>
                <header class="entry-header">
                    <h2 class="entry-title">
                        <a href="<?php seo_serie($tv->id) ?>" class="_title" rel="bookmark" title="<?php echo htmlspecialchars($tv->name, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($tv->name, ENT_QUOTES, 'UTF-8'); ?></a>
                    </h2>
                </header>
            </div>
        </article>
<?php 
        endforeach;
    else:
?>
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h2><i class="fa fa-exclamation"></i> No TV Show Found for this search</h2>
                </div>
            </div>
        </div>
<?php 
    endif;
else:
    $TV = unserialize(ocim_data_search_tv(limit_word($newquery, 3), $page));
    if (is_array($TV['result'])):
        foreach (array_slice($TV['result'], 0, 18) as $row):
?>
        <article id="<?php echo htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8');?>" class="item col-6 col-md-2">
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
        endforeach;
    else:
?>
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h2><i class="fa fa-exclamation"></i> No TV Show Found for this search</h2>
                </div>
            </div>
        </div>
        <br>
<?php 
    endif;
endif;
?>
      </div>
      <div class="row">
         <div class="col-12 text-center pagenate">
            <ul class="pagination" role="navigation">
<?php 
if ($TV['total_results'][0] > 19):
    require_once(DOCUMENT_ROOT . '/app/class/CSSPagination.class.php');

    $totalResults = $TV['total_results'][0] > 1000 ? 1000 : $TV['total_results'][0];
    $limit  = 20; 
    $link   = '/?s=' . urlencode($newquery);
    $pagination = new CSSPagination($totalResults, $limit, $link);
    $pagination->setPage($page);
    echo $pagination->showPage();
endif;
?>
            </ul>
         </div>
      </div>
   </div>
</section>
<?php include('footer.php'); ?>
