<?php

if ($uri == site_url() . '/' . options('url_tvdb') or $uri == site_url() . '/' . options('url_tvdb') . '/') {
    header('location:'.site_url());
}
require_once( DOCUMENT_ROOT . '/app/class/class.TMDB.php');
function tmdb_api() {
	$arraytmdb = explode(",", options('tmdb_api'));
	return $arraytmdb[array_rand($arraytmdb)];
}
function ocim_data_movie( $nama = 'home_m_', $page = 1, $get = 'getNowPlayingMovies') {
        $apikey = tmdb_api();
        $tmdb   = new TMDB($apikey, 'en', true);
	$path	= DOCUMENT_ROOT . '/cache/home';
	$name	= $nama.$page.'.json';
	if ( file_exists( $path . $name ) && ! ocim_expire( $path . $name ) ) {
		$data	= file_get_contents( $path . $name );
		return $data;
	} else {

		$Movie = $tmdb->$get($page);
		if ( $Movie['results'] ) {
                        $results = array();
                        foreach((array)$Movie['results'] as $row) {
	                        $item['id'] =  $row['id'];
                        	if ($row[title]) {
                                	$item['title'] = $row['title'];
                        	} else {
                                	$item['title'] = $row['original_title'];
                        	}
                        	if ($row[poster_path]) {
                                	$item['poster_path'] = 'https://image.tmdb.org/t/p/w300'.$row[poster_path];
                        	}else{
                                	$item['poster_path'] = site_theme().'/images/no-cover.png';
                        	}
                        	if ($row[backdrop_path]) {
                                	$item['backdrop_path'] = 'https://image.tmdb.org/t/p/w780'.$row[backdrop_path];
                        	}else{
                                	$item['backdrop_path'] = site_theme().'/images/no-backdrop.png';
                        	}
	                        $item['overview'] =  $row['overview'];
	                        $item['release_date'] =  $row['release_date'];
	                        $item['popularity'] =  $row['popularity'];
	                        $item['vote_average'] =  $row['vote_average'];
	                        $item['vote_count'] =  $row['vote_count'];
		        	$results['result'][] = $item;
			}
		        $results['total_results'][] = $Movie['total_results'];
                        if( config('cache') == 'true'):
		              file_put_contents( $path . $name, serialize( $results ) );
                        endif;
		        return serialize( $results );
		}
	}
}
function ocim_data_genre( $nama = 'home_g_', $id = '', $page = 1, $get = 'GetGenreMovies') {
        $apikey = tmdb_api();
        $tmdb   = new TMDB($apikey, en, true);

	$path	= DOCUMENT_ROOT . '/cache/search/';
	$name	= $nama.$page.'.json';
	if ( file_exists( $path . $name ) && ! ocim_expire( $path . $name ) ) {
		$data	= file_get_contents( $path . $name );
		return $data;
	} else {
		$Movie = $tmdb->$get($id,$page);
		if ( $Movie['results'] ) {
                        $results = array();
                        foreach((array)$Movie['results'] as $row) {
	                        $item['id'] =  $row['id'];
                        	if ($row[title]) {
                                	$item['title'] = $row['title'];
                        	} else {
                                	$item['title'] = $row['original_title'];
                        	}
                        	if ($row[poster_path]) {
                                	$item['poster_path'] = 'https://image.tmdb.org/t/p/w300'.$row[poster_path];
                        	}else{
                                	$item['poster_path'] = site_theme().'/images/no-cover.png';
                        	}
                        	if ($row[backdrop_path]) {
                                	$item['backdrop_path'] = 'https://image.tmdb.org/t/p/w780'.$row[backdrop_path];
                        	}else{
                                	$item['backdrop_path'] = site_theme().'/images/no-backdrop.png';
                        	}
	                        $item['overview'] =  $row['overview'];
	                        $item['release_date'] =  $row['release_date'];
	                        $item['popularity'] =  $row['popularity'];
	                        $item['vote_average'] =  $row['vote_average'];
	                        $item['vote_count'] =  $row['vote_count'];
		        	$results['result'][] = $item;
			}
		        $results['total_results'][] = $Movie['total_results'];
                        if( config('cache') == 'true'):
		              file_put_contents( $path . $name, serialize( $results ) );
                        endif;
		        return serialize( $results );
		}
	}
}
function ocim_data_tv( $nama = 'home_tv_', $page = 1, $get = 'getOnTheAirTVShows') {
        $apikey = tmdb_api();
        $tmdb   = new TMDB($apikey, 'en', true);

	$path	= DOCUMENT_ROOT . '/cache/home/';
	$name	= $nama.$page.'.json';
	if ( file_exists( $path . $name ) && ! ocim_expire( $path . $name ) ) {
		$data	= file_get_contents( $path . $name );
		return $data;
	} else {
		$Movie = $tmdb->$get($page);
		if ( $Movie['results'] ) {
                        $results = array();
                        foreach((array)$Movie['results'] as $row) {
	                        $item['id'] =  $row['id'];
                        	if ($row[name]) {
                                	$item['title'] = $row['name'];
                        	} else {
                                	$item['title'] = $row['original_name'];
                        	}
                        	if ($row[poster_path]) {
                                	$item['poster_path'] = 'https://image.tmdb.org/t/p/w300'.$row[poster_path];
                        	}else{
                                	$item['poster_path'] = site_theme().'/images/no-cover.png';
                        	}
                        	if ($row[backdrop_path]) {
                                	$item['backdrop_path'] = 'https://image.tmdb.org/t/p/w780'.$row[backdrop_path];
                        	}else{
                                	$item['backdrop_path'] = site_theme().'/images/no-backdrop.png';
                        	}
	                        $item['overview'] =  $row['overview'];
	                        $item['release_date'] =  $row['first_air_date'];
	                        $item['popularity'] =  $row['popularity'];
	                        $item['vote_average'] =  $row['vote_average'];
	                        $item['vote_count'] =  $row['vote_count'];
		        	$results['result'][] = $item;
			}
		        $results['total_results'][] = $Movie['total_results'];
                        if( config('cache') == 'true'):
		              file_put_contents( $path . $name, serialize( $results ) );
                        endif;
		        return serialize( $results );
		}
	}
}
function ocim_data_search_movie( $query = '', $page = 1) {
        $apikey = tmdb_api();
        $tmdb   = new TMDB($apikey, en, true);

		$Movie = $tmdb->searchMovie($query,$page);
		if ( $Movie['results'] ) {
                        $results = array();
                        foreach((array)$Movie['results'] as $row) {
	                        $item['id'] =  $row['id'];
                        	if ($row[title]) {
                                	$item['title'] = $row['title'];
                        	} else {
                                	$item['title'] = $row['original_title'];
                        	}
                        	if ($row[poster_path]) {
                                	$item['poster_path'] = 'https://image.tmdb.org/t/p/w300'.$row[poster_path];
                        	}else{
                                	$item['poster_path'] = site_theme().'/images/no-cover.png';
                        	}
                        	if ($row[backdrop_path]) {
                                	$item['backdrop_path'] = 'https://image.tmdb.org/t/p/w780'.$row[backdrop_path];
                        	}else{
                                	$item['backdrop_path'] = site_theme().'/images/no-backdrop.png';
                        	}
	                        $item['overview'] =  $row['overview'];
	                        $item['release_date'] =  $row['release_date'];
	                        $item['popularity'] =  $row['popularity'];
	                        $item['vote_average'] =  $row['vote_average'];
	                        $item['vote_count'] =  $row['vote_count'];
		        	$results['result'][] = $item;
			}
		        $results['total_results'][] = $Movie['total_results'];
		        return serialize( $results );
		}
}
function ocim_data_search_tv( $query = '', $page = 1) {
        $apikey = tmdb_api();
        $tmdb   = new TMDB($apikey, en, true);
		$Movie = $tmdb->searchTVShow($query,$page);
		if ( $Movie['results'] ) {
                        $results = array();
                        foreach((array)$Movie['results'] as $row) {
	                        $item['id'] =  $row['id'];
                        	if ($row[name]) {
                                	$item['title'] = $row['name'];
                        	} else {
                                	$item['title'] = $row['original_name'];
                        	}
                        	if ($row[poster_path]) {
                                	$item['poster_path'] = 'https://image.tmdb.org/t/p/w300'.$row[poster_path];
                        	}else{
                                	$item['poster_path'] = site_theme().'/images/no-cover.png';
                        	}
                        	if ($row[backdrop_path]) {
                                	$item['backdrop_path'] = 'https://image.tmdb.org/t/p/w780'.$row[backdrop_path];
                        	}else{
                                	$item['backdrop_path'] = site_theme().'/images/no-backdrop.png';
                        	}
	                        $item['overview'] =  $row['overview'];
	                        $item['release_date'] =  $row['first_air_date'];
	                        $item['popularity'] =  $row['popularity'];
	                        $item['vote_average'] =  $row['vote_average'];
	                        $item['vote_count'] =  $row['vote_count'];
		        	$results['result'][] = $item;
			}
		        $results['total_results'][] = $Movie['total_results'];
		        return serialize( $results );
		}
}
function ocim_search( $query, $nama = 'search_' ) {
	$path	= DOCUMENT_ROOT . '/cache/search/';
	$name	= $nama.'.json';
	if ( file_exists( $path . $name ) && ! ocim_expire( $path . $name , 86400 ) ) {
                $data = @file_get_contents( $path . $name );
		return $data;
	} else {
		if( options('youtube_api') != ''){
        		$array_tube = explode(",", options('youtube_api'));
        		$youtube_api = $array_tube[array_rand($array_tube)];
		}
                $limit = 12;
                $youtube = @json_decode(get_contents('https://www.googleapis.com/youtube/v3/search?part=snippet&q='.permalink( $query , $options = array('delimiter' => '+') ).'&key='.$youtube_api.'&maxResults='.$limit.'&order=viewCount&duration=short&type=video',0,null,null),true);
                if ($youtube['items'] != null) {
		        foreach ( $youtube['items'] as $entry ) {
                                $y['title'] = bad_words($entry['snippet']['title']);
                                $y['id'] = $entry['id']['videoId'];
                                $y['date'] = $entry['snippet']['publishedAt'];
                                $y['description'] = $entry['snippet']['description'];
                                $y['img'] = 'https://i.ytimg.com/vi/'.$entry['id']['videoId'];
                                $y['channel'] = $entry['snippet']['channelTitle'];
				$data['result'][] = $y;
                        }
		} 
                if( config('cache') == 'true'):

		        file_put_contents( $path . $name, serialize( $data ) );

                endif;
		return serialize( $data );
	}
}

if ( $_GET['action'] == 'movie' || strposa($uri, options('url_movie') ) ) :
if ( isset($_GET['id'] ) || strposa($uri, options('url_movie') ) ) {
        if(strposa($uri, options('url_movie') ) ) {
                $str = explode("/", $uri);
                if (is_numeric($str[2]) || strposa($str[2], 'tt' ) !== false ) { $TMDBID = $str[2]; }else{ header('Location: /'); }
        }else{ $TMDBID = $_GET['id']; }

	$path	  = $_SERVER['DOCUMENT_ROOT'] . '/cache/movie/';
	$basename = $TMDBID.'.json';
	if ( file_exists( $path . $basename ) && ! ocim_expire( $path . $basename , 86400 ) ) {
                $data = @file_get_contents( $path . $basename );
                $row = unserialize( $data );
	} else {
                $apikey = tmdb_api();
                $tmdb = new TMDB($apikey, 'en', true);
                $row = $tmdb->getMovie($TMDBID);
        }

                if ( !$row['status_code'] == 34 ) {
                        $title          = $row['title'];
                        $cm['id']       = $TMDBID;
                        $cm['title']    = $row['title'];
                        $cm['slug']     = seo_movie( $TMDBID, $row['title'] );
                        $cm['pubdate']  = $row['release_date'];

			$randone        = $movie_title_awal[mt_rand(0, count($movie_title_awal) - 1)];
			$randtwo        = $movie_title_akhir[mt_rand(0, count($movie_title_akhir) - 1)];
                        $release_date   = $row['release_date'];
                        $year           = date('Y', strtotime( $release_date ) );
                        $hack_title     = $randone . $row['title'] .' ('.$year.') '. $randtwo;
                        $title_after    = ' | '.config('sitename');
                        $description    = $randone . $row['title'] .' ('.$year.') : '.$randtwo.' '.$row['overview'];
                        $runtime        = $row['runtime'];
                        $vote_count     = $row['vote_count'];

                        if ($row['images']['backdrops']!=null) {
                                shuffle($row['images']['backdrops']);
                                foreach($row['images']['backdrops'] as $result) {
                                        $images = 'https://image.tmdb.org/t/p/original' . $result['file_path'];
                                        $w780 = 'https://image.tmdb.org/t/p/w780' . $result['file_path'];
                                }
                        } elseif ($row[images]['posters']!=null){
                                shuffle($row[images]['posters']);
                                foreach($row[images]['posters'] as $result) {
                                        $images = 'https://image.tmdb.org/t/p/original' . $result['file_path'];
                                        $w780 = 'https://image.tmdb.org/t/p/w780' . $result['file_path'];
                                }
                        } else {
                                $images = site_theme().'/images/no-backdrop.png';
                                $w780 = site_theme().'/images/no-backdrop.png';
                        }
                        if ($row['poster_path']!=null) {
                                $images_small = 'https://image.tmdb.org/t/p/w185' . $row['poster_path'];
                        } elseif ($row['backdrop_path']!=null){
                                $images_small = 'https://image.tmdb.org/t/p/w185' . $row['backdrop_path'];
                        } else {
                                $images_small = site_theme().'/images/no-cover.png';
                        }
     	     	        if (is_array($row['genres'])){
             	     	        $genres  = array();foreach($row['genres'] as $result) : $genres[] = '<span itemprop="genre"><a itemprop="url" href="'.seocat(permalink($result['name']),$result['id']).'">'.$result['name'].'</a></span>';endforeach;
             	     	        $genre = implode(", ",$genres);
     	     	        }
     	     	        if (is_array($row['genres'])){
             	     	        foreach($row['genres'] as $result) : $category = $result['name'];$categoryid = $result['id'];endforeach;
     	     	        }
     	     	        if (is_array($row['credits']['cast']))
     	     	        {       
             	     	        $ic = 0;$casts = array();foreach($row['credits']['cast'] as $result) :$casts[] = '<span itemprop="actor" itemscope itemtype="https://schema.org/Person"><span itemprop="name">'.$result['name'].'</span></span>';if ($ic++ == 10) break;endforeach;
             	     	        $cast = implode(", ",$casts);
     	     	        }
                        if($row['vote_average'] > 0) {
	                        $get_rating =  $row['vote_average'];
	                        $emp_rating =  11 - $get_rating;
                        } else {
	                        $emp_rating = 10;
                        }
                     	if (is_array($row['keywords']['keywords']))
                     	{
                             	$keyword = array();foreach($row['keywords']['keywords'] as $result) : $keyword[] = '<span class="itemprop" itemprop="keywords">'.$result['name'].'</span>';endforeach;
                             	$keywords = implode(", ",$keyword);
                     	}
     	     	     	if (is_array($row['production_countries']))
     	     	     	{
             	     	     	$countrys = array();foreach($row['production_countries'] as $result) : $countrys[] = $result['name'];endforeach;
             	     	     	$country = implode( ", ",$countrys );
     	     	     	}
                     	if (is_array($row['production_companies']))
                     	{
                             	$production = array();foreach($row['production_companies'] as $result) : $production[] = '<span itemprop="creator" itemscope itemtype="https://schema.org/Organization"><span itemprop="name">'.$result['name'].'</span></span>';endforeach;
                             	$companies = implode(", ",$production);
                     	}
                        if ( $row['title'] != '' ) {
                                if ( !file_exists( $path ) ) {
                                        mkdir( $path, 0755, true );
			                file_put_contents( $path . $basename, serialize( $row ) );
			                file_put_contents( $_SERVER['DOCUMENT_ROOT'] . '/cache/single/' . $basename, serialize( $cm ) );
                                }else {
			                file_put_contents( $path . $basename, serialize( $row ) );
			                file_put_contents( $_SERVER['DOCUMENT_ROOT'] . '/cache/single/' . $basename, serialize( $cm ) );
                                }
		        } else{
                                ocim_throw();
                        }
                } else {
                        ocim_throw();
                }
}
endif;
if ( $_GET['action'] == 'tv' || strposa($uri, options('url_tv') ) ) :
        if ( isset($_GET['id']) || strposa($uri, options('url_tv') ) ) {

                if(strpos($_GET['id'], '-') !== false) {
                        $apikey = tmdb_api();
                        $tmdb = new TMDB($apikey, en, true);
                        $str = explode("-", $_GET['id']);
                        $TMDBID = $str[0];
                        if($str[2] != ''):
                                $row = $tmdb->getTVShow($TMDBID);
                                $row2 = $tmdb->getTVSeason($TMDBID, '/season/'.$str[1]);
                                $row3 = $tmdb->getTVSeason($TMDBID, '/season/'.$str[1]. '/episode/'. $str[2]);
                                $title = $row['name'] .' - Season '.$str[1].' Episode '.$str[2].' : '. $row3['name'];
                                $hack_title = 'Watch '. $row['name'] .' - Season '.$str[1].' Episode '.$str[2].' : '. $row3['name'] .' Online Free';
                                $description = $row['overview'];
                        elseif($str[1] != ''):
                                $row = $tmdb->getTVShow($TMDBID);
                                $row2 = $tmdb->getTVSeason($TMDBID, '/season/'.$str[1]);
                                $title = $row['name'] .' - '.$row2['name'];
                                $hack_title = 'Watch '.$row['name'] .' - '.$row2['name'] .' Online Free';
                                $description = $row['overview'];
                        else:
                                $row = $tmdb->getTVShow($TMDBID);
                                $title = $row['name'];
                                $hack_title = 'Watch '.$row['name'] .' Online Free';
                                $description = $row['overview'];

                        endif;
                } else {
                        if(strpos($uri, options('url_tv') ) !== false ) {
                                $strs = explode("/", $uri);
                                $str = explode("-", $strs[2]);
                                $TMDBID = $str[0];

                                if($str[2] != ''):
                                        $apikey = tmdb_api();
                                        $tmdb = new TMDB($apikey, en, true);
                                        $row = $tmdb->getTVShow($TMDBID);
                                        $row2 = $tmdb->getTVSeason($TMDBID, '/season/'.$str[1]);
                                        $row3 = $tmdb->getTVSeason($TMDBID, '/season/'.$str[1]. '/episode/'. $str[2]);
                                        $epi_name = $row3['name'] == '' ? '' : ' : ' . $row3['name'];
                                        $title = $row['name'] .' - Season '.$str[1].' Episode '.$str[2]. $epi_name;
                                        $randone = $tv_title_awal[mt_rand(0, count($tv_title_awal) - 1)];
                                        $randtwo = $tv_title_akhir[mt_rand(0, count($tv_title_akhir) - 1)];
                                        $hack_title = $randone . $row['name'] .' - '.$row2['name'].' Episode '.$str[2] . $epi_name .' '. $randtwo;
                                        $title_after = ' | '.config('sitename');
                                        $description = $row3['overview'] == '' ? $row['overview'] : $row3['overview'];

                                elseif($str[1] != ''):
                                        $apikey = tmdb_api();
                                        $tmdb = new TMDB($apikey, en, true);
                                        $row = $tmdb->getTVShow($TMDBID);
                                        $row2 = $tmdb->getTVSeason($TMDBID, '/season/'.$str[1]);
                                        $title = $row['name'] .' - '.$row2['name'];
			                $randone = $tv_title_awal[mt_rand(0, count($tv_title_awal) - 1)];
			                $randtwo = $tv_title_akhir[mt_rand(0, count($tv_title_akhir) - 1)];
                                        $hack_title = $randone . $row['name'] .' - '.$row2['name'] .' '. $randtwo;
                                        $title_after = ' | '.config('sitename');
                                        $description = $row['overview'];
                                else:
                                        $apikey = tmdb_api();
                                        $tmdb = new TMDB($apikey, en, true);
                                        $row = $tmdb->getTVShow($TMDBID);
                                        $title = $row['name'];
			                $randone = $tv_title_awal[mt_rand(0, count($tv_title_awal) - 1)];
			                $randtwo = $tv_title_akhir[mt_rand(0, count($tv_title_akhir) - 1)];
                                        $hack_title = $randone . $row['name'] .' '. $randtwo;
                                        $title_after = ' | '.config('sitename');
                                        $description = $row['overview'];
                                endif;
		        }else{
                                $TMDBID = $_GET['id'];
                                $row = $tmdb->getTVShow($TMDBID);
                                $title = $row['name'];
			        $randone = $tv_title_awal[mt_rand(0, count($tv_title_awal) - 1)];
			        $randtwo = $tv_title_akhir[mt_rand(0, count($tv_title_akhir) - 1)];
                                $hack_title = $randone . $row['name'] .' '. $randtwo;
                                $title_after = ' | '.config('sitename');
                                $description = $row['overview'];
		        }

                }
                if ( $row['name'] != '' ) {
                        $id = $row['id'];
                        $first_air_date = $row['first_air_date'];
                        $last_air_date = $row['last_air_date'];
                        $year = date('Y', strtotime( $last_air_date ) );
                        $run_time0 = isset($row['episode_run_time'][0]) ? $row['episode_run_time'][0] : '26';
                        $run_time1 = isset($row['episode_run_time'][1]) ? $row['episode_run_time'][1] : '14';
                        //$run_time2 = isset($row['episode_run_time'][2]) ? $row['episode_run_time'][2] : '20';
                        $runtime = '00:'.$run_time0. ':'.$run_time1;
                        $vote_count = $row['vote_count'];
                        $number_of_episodes = $row['number_of_episodes'];
                        $number_of_seasons = $row['number_of_seasons'];
                        $status = $row['status'];

                        if ($row[images]['backdrops']!=null) {
                                shuffle($row[images]['backdrops']);
                                foreach($row[images]['backdrops'] as $result) {
                                        $images = 'https://image.tmdb.org/t/p/original' . $result['file_path'];
                                        $w600 = 'https://image.tmdb.org/t/p/w600' . $result['file_path'];
                                }
                        } elseif ($row['backdrop_path']!=null){
                                $images = 'https://image.tmdb.org/t/p/original' . $row['backdrop_path'];
                                $w600 = 'https://image.tmdb.org/t/p/w600' . $row['backdrop_path'];
                        } else {
                                $images = site_theme().'/images/no-backdrop.png';
                                $w780 = site_theme().'/images/no-backdrop.png';
                        }
                        if ($row['poster_path']!=null) {
                                $images_small = 'https://image.tmdb.org/t/p/w185' . $row['poster_path'];
                        } elseif ($row['backdrop_path']!=null){
                                $images_small = 'https://image.tmdb.org/t/p/w185' . $row['backdrop_path'];
                        } else {
                                $images_small = site_theme().'/images/no-cover.png';
                        }
     	     	        if (is_array($row['genres'])){
             	     	        $genres  = array();foreach($row['genres'] as $result) : $genres[] = $result['name'];endforeach;
             	     	        $genre = implode(", ",$genres);
     	     	        }
     	     	        if (is_array($row['genres'])){
             	     	        foreach($row['genres'] as $result) : $category = $result['name'];$categoryid = $result['id'];endforeach;
     	     	        }
     	     	        if (is_array($row['credits'][cast]))
     	     	        {       
             	     	        $ic = 0;$casts = array();foreach($row['credits'][cast] as $result) :$casts[] = '<span itemprop="actor" itemscope itemtype="https://schema.org/Person">'.$result['name'].'</span>';if ($ic++ == 10) break;endforeach;
             	     	        $cast = implode(", ",$casts);
     	     	        }
                        if($row['vote_average'] > 0) {
	                        $get_rating =  $row['vote_average'];
	                        $emp_rating =  11 - $get_rating;
                        } else {
	                        $emp_rating = 10;
                        }
                     	if (is_array($row['keywords']['keywords']))
                     	{
                             	$keyword = array();foreach($row['keywords']['keywords'] as $result) : $keyword[] = '<span class="itemprop" itemprop="keywords">'.$result['name'].'</span>';endforeach;
                             	$keywords = implode(", ",$keyword);
                     	}
                     	if (is_array($row['alternative_titles']['results']))
                     	{
                             	$alternative = array();foreach($row['alternative_titles']['results'] as $result) : $alternative[] = $result['title'];endforeach;
                             	$alternative_titles = implode(", ",$alternative);
                     	}
     	     	     	if (is_array($row['networks']))
     	     	     	{
             	     	     	$countrys = array();foreach($row['networks'] as $result) : $countrys[] = $result['name'];endforeach;
             	     	     	$networks = implode( ", ",$countrys );
     	     	     	}

                        if($str[2] != '') {
                            if($row3[still_path])
                            {
                                $images = 'https://image.tmdb.org/t/p/original'.$row3[still_path];
                            }
                        }
                } else {
                        ocim_throw();
                }
        } 
endif;


function covtime($youtube_time) {
        preg_match_all('/(\d+)/',$youtube_time,$parts);

        // Put in zeros if we have less than 3 numbers.
        if (count($parts[0]) == 1) {
                array_unshift($parts[0], "0", "0");
        } elseif (count($parts[0]) == 2) {
                array_unshift($parts[0], "0");
        }

        $sec_init = $parts[0][2];
        $seconds = $sec_init%60;
        $seconds_overflow = floor($sec_init/60);

        $min_init = $parts[0][1] + $seconds_overflow;
        $minutes = ($min_init)%60;
        $minutes_overflow = floor(($min_init)/60);

        $hours = $parts[0][0] + $minutes_overflow;

        if($hours != 0)
                return $hours.':'.$minutes.':'.$seconds;
        else
                return $minutes.':'.$seconds;
}
function convertToHoursMins($min, $format = '%d:%d') {
        $min=(int)$min;
        $heure=(int)($min/60);
        $minute=(($min/60)-$heure)*60;
        if($heure < 10)
            $heure = '0' . $heure;
        if($minute < 10)
            $minute = '0' . $minute;

        return $heure .':' . $minute . ':00';
}
function seo( $query ) {
        if ( config('_seo') == 'true' ):
                if($query):
                        return site_url().'/'.config('search_url').'/'.permalink($query).config('url_end');
                endif;
        else:
                return site_url().'/?s='.permalink($query);
        endif;
}
function seo_movie( $id, $query ) {
        if ( config('_seo') == 'true' ):
                return '/'.options('url_movie').'/'.$id.'/'.permalink($query).config('url_end'); 
        else:
                return '/?action='.options('url_movie').'&id='.$id;
        endif;
}
function seo_tv( $id, $query, $delimiter = '+' ) {
        if ( config('_seo') == 'true' ):
                return '/'.options('url_tv').'/'.$id.'/'.permalink($query).config('url_end'); 
        else:
                return '/?action='.options('url_tv').'&id='.$id;
        endif;
}

function seo_tvdb( $id, $season = '', $episode = '', $name = '' ) {
        if ( config('_seo') == 'true' ) 
        {
            if($season == '' || $episode == '')
                $uri = '/'.options('url_tvdb').'/'.$id.'/';
            else
                $uri = '/'.options('url_tvdb').'/'.$id.'/'.$season.'/'.$episode;
        }
        else
        {
            if($season == '' || $episode == '')
                $uri = '/?action='.options('url_tvdb').'&id='.$id;
            else
                $uri = '/?action='.options('url_tvdb').'&id='.$id.'&season='.$season.'&episode='.$episode;
        }

        return $uri;
}

function seo_video( $id, $query, $delimiter = '+' ) {
        if ( config('_seo') == 'true' ):
                return site_url().'/'.options('url_watch').'/'.$id.'/'.permalink($query).config('url_end'); 
        else:
                return site_url().'/?action=video&id='.$id;
        endif;
}
function view_page($page){
        if ( config('_seo') == 'true' ):
                return site_url().'/'.options('url_page').'/'.$page.'/';
        else:
                return site_url().'/?do='.$page;
        endif;
}
function seocat($query,$id = ''){
        if ( config('_seo') == 'true' ):
                return site_url().'/'.config('category_url').'/'.$query.'/'.$id;
        else:
                return site_url().'/?terms='.$id;
        endif;
}

if ( strtotime( date( 'Y-m-d G:i:s' ) ) - filemtime($_SERVER['DOCUMENT_ROOT'] . '/cache/') > 86400 ) {
        deleteDirectory($_SERVER['DOCUMENT_ROOT'] . '/cache/home/');
        deleteDirectory($_SERVER['DOCUMENT_ROOT'] . '/cache/search/');
        deleteDirectory($_SERVER['DOCUMENT_ROOT'] . '/cache/movie/');
        deleteDirectory($_SERVER['DOCUMENT_ROOT'] . '/cache/tvdb/');
}
include(DOCUMENT_ROOT.'/app/core/tvdbController.php'); 
