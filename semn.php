<?php

if ($uri == site_url() . '/' . options('url_tvdb') || $uri == site_url() . '/' . options('url_tvdb') . '/') {
    header('Location: ' . site_url());
    exit();
}

require_once(DOCUMENT_ROOT . '/app/class/class.TMDB.php');

function tmdb_api() {
    $tmdb_api_option = options('tmdb_api');
    if (!$tmdb_api_option) {
        return ''; // or handle this case appropriately
    }
    $arraytmdb = explode(",", $tmdb_api_option);
    return $arraytmdb[array_rand($arraytmdb)];
}

function ocim_data_movie($nama = 'home_m_', $page = 1, $get = 'getNowPlayingMovies') {
    $apikey = tmdb_api();
    $tmdb   = new TMDB($apikey, 'en', true);
    $path   = DOCUMENT_ROOT . '/cache/home/';
    $name   = $nama . $page . '.json';
    
    if (is_file($path . $name) && !ocim_expire($path . $name)) {
        $data = file_get_contents($path . $name);
        return $data;
    } else {
        $Movie = $tmdb->$get($page);
        if (isset($Movie['results']) && is_array($Movie['results'])) {
            $results = array();
            foreach ($Movie['results'] as $row) {
                $item['id'] = $row['id'];
                $item['title'] = $row['title'] ?? $row['original_title'];
                $item['poster_path'] = $row['poster_path'] 
                    ? 'https://image.tmdb.org/t/p/w300' . $row['poster_path'] 
                    : site_theme() . '/images/no-cover.png';
                $item['backdrop_path'] = $row['backdrop_path'] 
                    ? 'https://image.tmdb.org/t/p/w780' . $row['backdrop_path'] 
                    : site_theme() . '/images/no-backdrop.png';
                $item['overview'] = $row['overview'];
                $item['release_date'] = $row['release_date'];
                $item['popularity'] = $row['popularity'];
                $item['vote_average'] = $row['vote_average'];
                $item['vote_count'] = $row['vote_count'];
                $results['result'][] = $item;
            }
            $results['total_results'] = $Movie['total_results'];
            if (config('cache') == 'true') {
                file_put_contents($path . $name, json_encode($results));
            }
            return json_encode($results);
        }
    }
    return null; // or handle no results case appropriately
}

function ocim_data_genre($nama = 'home_g_', $id = '', $page = 1, $get = 'GetGenreMovies') {
    $apikey = tmdb_api();
    $tmdb   = new TMDB($apikey, 'en', true);

    $path   = DOCUMENT_ROOT . '/cache/search/';
    $name   = $nama . $page . '.json';

    if (is_file($path . $name) && !ocim_expire($path . $name)) {
        $data = file_get_contents($path . $name);
        return $data;
    } else {
        $Movie = $tmdb->$get($id, $page);
        if (isset($Movie['results']) && is_array($Movie['results'])) {
            $results = array();
            foreach ($Movie['results'] as $row) {
                $item['id'] = $row['id'];
                $item['title'] = isset($row['title']) ? $row['title'] : $row['original_title'];
                $item['poster_path'] = isset($row['poster_path']) 
                    ? 'https://image.tmdb.org/t/p/w300' . $row['poster_path'] 
                    : site_theme() . '/images/no-cover.png';
                $item['backdrop_path'] = isset($row['backdrop_path']) 
                    ? 'https://image.tmdb.org/t/p/w780' . $row['backdrop_path'] 
                    : site_theme() . '/images/no-backdrop.png';
                $item['overview'] = $row['overview'];
                $item['release_date'] = $row['release_date'];
                $item['popularity'] = $row['popularity'];
                $item['vote_average'] = $row['vote_average'];
                $item['vote_count'] = $row['vote_count'];
                $results['result'][] = $item;
            }
            $results['total_results'] = $Movie['total_results'];
            if (config('cache') == 'true') {
                file_put_contents($path . $name, json_encode($results));
            }
            return json_encode($results);
        }
    }
    return null; // or handle no results case appropriately KA2
}

function ocim_data_tv($nama = 'home_tv_', $page = 1, $get = 'getOnTheAirTVShows') {
    $apikey = tmdb_api();
    $tmdb   = new TMDB($apikey, 'en', true);

    $path   = DOCUMENT_ROOT . '/cache/home/';
    $name   = $nama . $page . '.json';

    if (is_file($path . $name) && !ocim_expire($path . $name)) {
        $data = file_get_contents($path . $name);
        return $data;
    } else {
        $Movie = $tmdb->$get($page);
        if (isset($Movie['results']) && is_array($Movie['results'])) {
            $results = array();
            foreach ($Movie['results'] as $row) {
                $item['id'] = $row['id'];
                $item['title'] = isset($row['name']) ? $row['name'] : $row['original_name'];
                $item['poster_path'] = isset($row['poster_path']) 
                    ? 'https://image.tmdb.org/t/p/w300' . $row['poster_path'] 
                    : site_theme() . '/images/no-cover.png';
                $item['backdrop_path'] = isset($row['backdrop_path']) 
                    ? 'https://image.tmdb.org/t/p/w780' . $row['backdrop_path'] 
                    : site_theme() . '/images/no-backdrop.png';
                $item['overview'] = $row['overview'];
                $item['release_date'] = $row['first_air_date'];
                $item['popularity'] = $row['popularity'];
                $item['vote_average'] = $row['vote_average'];
                $item['vote_count'] = $row['vote_count'];
                $results['result'][] = $item;
            }
            $results['total_results'] = $Movie['total_results'];
            if (config('cache') == 'true') {
                file_put_contents($path . $name, json_encode($results));
            }
            return json_encode($results);
        }
    }
    return null; // or handle no results case appropriately ka3
}
function ocim_data_search_movie($query = '', $page = 1) {
    $apikey = tmdb_api();
    $tmdb   = new TMDB($apikey, 'en', true);

    $Movie = $tmdb->searchMovie($query, $page);
    if (isset($Movie['results']) && is_array($Movie['results'])) {
        $results = array();
        foreach ($Movie['results'] as $row) {
            $item['id'] = $row['id'];
            $item['title'] = isset($row['title']) ? $row['title'] : $row['original_title'];
            $item['poster_path'] = isset($row['poster_path']) 
                ? 'https://image.tmdb.org/t/p/w300' . $row['poster_path'] 
                : site_theme() . '/images/no-cover.png';
            $item['backdrop_path'] = isset($row['backdrop_path']) 
                ? 'https://image.tmdb.org/t/p/w780' . $row['backdrop_path'] 
                : site_theme() . '/images/no-backdrop.png';
            $item['overview'] = $row['overview'];
            $item['release_date'] = $row['release_date'];
            $item['popularity'] = $row['popularity'];
            $item['vote_average'] = $row['vote_average'];
            $item['vote_count'] = $row['vote_count'];
            $results['result'][] = $item;
        }
        $results['total_results'] = $Movie['total_results'];
        return json_encode($results);
    }
    return null; // or handle no results case appropriately ka 4
}
function ocim_data_search_tv($query = '', $page = 1) {
    $apikey = tmdb_api();
    $tmdb   = new TMDB($apikey, 'en', true);
    $Movie  = $tmdb->searchTVShow($query, $page);

    if (isset($Movie['results']) && is_array($Movie['results'])) {
        $results = array();
        foreach ($Movie['results'] as $row) {
            $item['id'] = $row['id'];
            $item['title'] = isset($row['name']) ? $row['name'] : $row['original_name'];
            $item['poster_path'] = isset($row['poster_path']) 
                ? 'https://image.tmdb.org/t/p/w300' . $row['poster_path'] 
                : site_theme() . '/images/no-cover.png';
            $item['backdrop_path'] = isset($row['backdrop_path']) 
                ? 'https://image.tmdb.org/t/p/w780' . $row['backdrop_path'] 
                : site_theme() . '/images/no-backdrop.png';
            $item['overview'] = $row['overview'];
            $item['release_date'] = $row['first_air_date'];
            $item['popularity'] = $row['popularity'];
            $item['vote_average'] = $row['vote_average'];
            $item['vote_count'] = $row['vote_count'];
            $results['result'][] = $item;
        }
        $results['total_results'] = $Movie['total_results'];
        return json_encode($results);
    }
    return null; // or handle no results case appropriately ka 5
}

function ocim_search($query, $nama = 'search_') {
    $path = DOCUMENT_ROOT . '/cache/search/';
    $name = $nama . '.json';

    if (is_file($path . $name) && !ocim_expire($path . $name, 86400)) {
        $data = file_get_contents($path . $name);
        return $data;
    } else {
        $youtube_api = '';
        if (options('youtube_api') != '') {
            $array_tube = explode(",", options('youtube_api'));
            $youtube_api = $array_tube[array_rand($array_tube)];
        }

        $limit = 12;
        $query_param = permalink($query, array('delimiter' => '+'));
        $youtube_response = file_get_contents('https://www.googleapis.com/youtube/v3/search?part=snippet&q=' . $query_param . '&key=' . $youtube_api . '&maxResults=' . $limit . '&order=viewCount&duration=short&type=video');
        $youtube = json_decode($youtube_response, true);

        if (isset($youtube['items']) && !empty($youtube['items'])) {
            $data = array();
            foreach ($youtube['items'] as $entry) {
                $y['title'] = bad_words($entry['snippet']['title']);
                $y['id'] = $entry['id']['videoId'];
                $y['date'] = $entry['snippet']['publishedAt'];
                $y['description'] = $entry['snippet']['description'];
                $y['img'] = 'https://i.ytimg.com/vi/' . $entry['id']['videoId'];
                $y['channel'] = $entry['snippet']['channelTitle'];
                $data['result'][] = $y;
            }
        }

        if (config('cache') == 'true') {
            file_put_contents($path . $name, json_encode($data));
        }

        return json_encode($data);
    }
}

if ((isset($_GET['action']) && $_GET['action'] == 'movie') || strposa($uri, options('url_movie'))) {
    if (isset($_GET['id']) || strposa($uri, options('url_movie'))) {
        if (strposa($uri, options('url_movie'))) {
            $str = explode("/", $uri);
            if (isset($str[2]) && (is_numeric($str[2]) || strposa($str[2], 'tt') !== false)) {
                $TMDBID = $str[2];
            } else {
                header('Location: /');
                exit();
            }
        } else {
            $TMDBID = $_GET['id'];
        }

        $path = $_SERVER['DOCUMENT_ROOT'] . '/cache/movie/';
        $basename = $TMDBID . '.json';
        if (is_file($path . $basename) && !ocim_expire($path . $basename, 86400)) {
            $data = file_get_contents($path . $basename);
            $row = unserialize($data);
        } else {
            $apikey = tmdb_api();
            $tmdb = new TMDB($apikey, 'en', true);
            $row = $tmdb->getMovie($TMDBID);
        }
    }
}
if (!($row['status_code'] ?? null) == 34) {
    $title = $row['title'];
    $cm['id'] = $TMDBID;
    $cm['title'] = $row['title'];
    $cm['slug'] = seo_movie($TMDBID, $row['title']);
    $cm['pubdate'] = $row['release_date'];

    $randone = $movie_title_awal[mt_rand(0, count($movie_title_awal) - 1)];
    $randtwo = $movie_title_akhir[mt_rand(0, count($movie_title_akhir) - 1)];
    $release_date = $row['release_date'];
    $year = date('Y', strtotime($release_date));
    $hack_title = $randone . $row['title'] . ' (' . $year . ') ' . $randtwo;
    $title_after = ' | ' . config('sitename');
    $description = $randone . $row['title'] . ' (' . $year . ') : ' . $randtwo . ' ' . $row['overview'];
    $runtime = $row['runtime'];
    $vote_count = $row['vote_count'];

    if (isset($row['images']['backdrops']) && !empty($row['images']['backdrops'])) {
        shuffle($row['images']['backdrops']);
        foreach ($row['images']['backdrops'] as $result) {
            $images = 'https://image.tmdb.org/t/p/original' . $result['file_path'];
            $w780 = 'https://image.tmdb.org/t/p/w780' . $result['file_path'];
        }
    } elseif (isset($row['images']['posters']) && !empty($row['images']['posters'])) {
        shuffle($row['images']['posters']);
        foreach ($row['images']['posters'] as $result) {
            $images = 'https://image.tmdb.org/t/p/original' . $result['file_path'];
            $w780 = 'https://image.tmdb.org/t/p/w780' . $result['file_path'];
        }
    } else {
        $images = site_theme() . '/images/no-backdrop.png';
        $w780 = site_theme() . '/images/no-backdrop.png';
    }

    if (isset($row['poster_path'])) {
        $images_small = 'https://image.tmdb.org/t/p/w185' . $row['poster_path'];
    } elseif (isset($row['backdrop_path'])) {
        $images_small = 'https://image.tmdb.org/t/p/w185' . $row['backdrop_path'];
    } else {
        $images_small = site_theme() . '/images/no-cover.png';
    }

    if (isset($row['genres']) && is_array($row['genres'])) {
        $genres = array();
        foreach ($row['genres'] as $result) {
            $genres[] = '<span itemprop="genre"><a itemprop="url" href="' . seocat(permalink($result['name']), $result['id']) . '">' . $result['name'] . '</a></span>';
        }
        $genre = implode(", ", $genres);
    }

    if (isset($row['genres']) && is_array($row['genres'])) {
        foreach ($row['genres'] as $result) {
            $category = $result['name'];
            $categoryid = $result['id'];
        }
    }

    if (isset($row['credits']['cast']) && is_array($row['credits']['cast'])) {
        $ic = 0;
        $casts = array();
        foreach ($row['credits']['cast'] as $result) {
            $casts[] = '<span itemprop="actor" itemscope itemtype="https://schema.org/Person"><span itemprop="name">' . $result['name'] . '</span></span>';
            if ($ic++ == 10) break;
        }
        $cast = implode(", ", $casts);
    }

    if ($row['vote_average'] > 0) {
        $get_rating = $row['vote_average'];
        $emp_rating = 11 - $get_rating;
    } else {
        $emp_rating = 10;
    }

    if (isset($row['keywords']['keywords']) && is_array($row['keywords']['keywords'])) {
        $keyword = array();
        foreach ($row['keywords']['keywords'] as $result) {
            $keyword[] = '<span class="itemprop" itemprop="keywords">' . $result['name'] . '</span>';
        }
        $keywords = implode(", ", $keyword);
    }

    if (isset($row['production_countries']) && is_array($row['production_countries'])) {
        $countrys = array();
        foreach ($row['production_countries'] as $result) {
            $countrys[] = $result['name'];
        }
        $country = implode(", ", $countrys);
    }

    if (isset($row['production_companies']) && is_array($row['production_companies'])) {
        $production = array();
        foreach ($row['production_companies'] as $result) {
            $production[] = '<span itemprop="creator" itemscope itemtype="https://schema.org/Organization"><span itemprop="name">' . $result['name'] . '</span></span>';
        }
        $companies = implode(", ", $production);
    }

    if ($row['title'] != '') {
        if (!is_dir($path)) {
            mkdir($path, 0755, true);
        }
        file_put_contents($path . $basename, serialize($row));
        file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/cache/single/' . $basename, serialize($cm));
    } else {
        ocim_throw();
    }
} else {
    ocim_throw();
}

endif;
if ((isset($_GET['action']) && $_GET['action'] == 'tv') || strposa($uri, options('url_tv'))) {
    if (isset($_GET['id']) || strposa($uri, options('url_tv'))) {
        if (strpos($_GET['id'] ?? '', '-') !== false) {
            $apikey = tmdb_api();
            $tmdb = new TMDB($apikey, 'en', true);
            $str = explode("-", $_GET['id']);
            $TMDBID = $str[0];

            if (isset($str[2]) && $str[2] != '') {
                $row = $tmdb->getTVShow($TMDBID);
                $row2 = $tmdb->getTVSeason($TMDBID, $str[1]);
                $row3 = $tmdb->getTVEpisode($TMDBID, $str[1], $str[2]);
                $title = $row['name'] . ' - Season ' . $str[1] . ' Episode ' . $str[2] . ' : ' . $row3['name'];
                $hack_title = 'Watch ' . $row['name'] . ' - Season ' . $str[1] . ' Episode ' . $str[2] . ' : ' . $row3['name'] . ' Online Free';
                $description = $row['overview'];
            } elseif (isset($str[1]) && $str[1] != '') {
                $row = $tmdb->getTVShow($TMDBID);
                $row2 = $tmdb->getTVSeason($TMDBID, $str[1]);
                $title = $row['name'] . ' - ' . $row2['name'];
                $hack_title = 'Watch ' . $row['name'] . ' - ' . $row2['name'] . ' Online Free';
                $description = $row['overview'];
            } else {
                $row = $tmdb->getTVShow($TMDBID);
                $title = $row['name'];
                $hack_title = 'Watch ' . $row['name'] . ' Online Free';
                $description = $row['overview'];
            }
        } else {
            if (strposa($uri, options('url_tv')) !== false) {
                $strs = explode("/", $uri);
                $str = explode("-", $strs[2]);
                $TMDBID = $str[0];

                if (isset($str[2]) && $str[2] != '') {
                    $apikey = tmdb_api();
                    $tmdb = new TMDB($apikey, 'en', true);
                    $row = $tmdb->getTVShow($TMDBID);
                    $row2 = $tmdb->getTVSeason($TMDBID, $str[1]);
                    $row3 = $tmdb->getTVEpisode($TMDBID, $str[1], $str[2]);
                    $epi_name = $row3['name'] == '' ? '' : ' : ' . $row3['name'];
                    $title = $row['name'] . ' - Season ' . $str[1] . ' Episode ' . $str[2] . $epi_name;
                    $randone = $tv_title_awal[mt_rand(0, count($tv_title_awal) - 1)];
                    $randtwo = $tv_title_akhir[mt_rand(0, count($tv_title_akhir) - 1)];
                    $hack_title = $randone . $row['name'] . ' - ' . $row2['name'] . ' Episode ' . $str[2] . $epi_name . ' ' . $randtwo;
                    $title_after = ' | ' . config('sitename');
                    $description = $row3['overview'] == '' ? $row['overview'] : $row3['overview'];
                } elseif (isset($str[1]) && $str[1] != '') {
                    $apikey = tmdb_api();
                    $tmdb = new TMDB($apikey, 'en', true);
                    $row = $tmdb->getTVShow($TMDBID);
                    $row2 = $tmdb->getTVSeason($TMDBID, $str[1]);
                    $title = $row['name'] . ' - ' . $row2['name'];
                    $randone = $tv_title_awal[mt_rand(0, count($tv_title_awal) - 1)];
                    $randtwo = $tv_title_akhir[mt_rand(0, count($tv_title_akhir) - 1)];
                    $hack_title = $randone . $row['name'] . ' - ' . $row2['name'] . ' ' . $randtwo;
                    $title_after = ' | ' . config('sitename');
                    $description = $row['overview'];
                } else {
                    $apikey = tmdb_api();
                    $tmdb = new TMDB($apikey, 'en', true);
                    $row = $tmdb->getTVShow($TMDBID);
                    $title = $row['name'];
                    $randone = $tv_title_awal[mt_rand(0, count($tv_title_awal) - 1)];
                    $randtwo = $tv_title_akhir[mt_rand(0, count($tv_title_akhir) - 1)];
                    $hack_title = $randone . $row['name'] . ' ' . $randtwo;
                    $title_after = ' | ' . config('sitename');
                    $description = $row['overview'];
                }
            } else {
                $TMDBID = $_GET['id'];
                $apikey = tmdb_api();
                $tmdb = new TMDB($apikey, 'en', true);
                $row = $tmdb->getTVShow($TMDBID);
                $title = $row['name'];
                $randone = $tv_title_awal[mt_rand(0, count($tv_title_awal) - 1)];
                $randtwo = $tv_title_akhir[mt_rand(0, count($tv_title_akhir) - 1)];
                $hack_title = $randone . $row['name'] . ' ' . $randtwo;
                $title_after = ' | ' . config('sitename');
                $description = $row['overview'];
            }
        }
    }
}

if ($row['name'] != '') {
    $id = $row['id'];
    $first_air_date = $row['first_air_date'];
    $last_air_date = $row['last_air_date'];
    $year = date('Y', strtotime($last_air_date));
    $run_time0 = $row['episode_run_time'][0] ?? '26';
    $run_time1 = $row['episode_run_time'][1] ?? '14';
    $runtime = '00:' . $run_time0 . ':' . $run_time1;
    $vote_count = $row['vote_count'];
    $number_of_episodes = $row['number_of_episodes'];
    $number_of_seasons = $row['number_of_seasons'];
    $status = $row['status'];

    if (isset($row['images']['backdrops']) && !empty($row['images']['backdrops'])) {
        shuffle($row['images']['backdrops']);
        foreach ($row['images']['backdrops'] as $result) {
            $images = 'https://image.tmdb.org/t/p/original' . $result['file_path'];
            $w600 = 'https://image.tmdb.org/t/p/w600' . $result['file_path'];
        }
    } elseif (isset($row['backdrop_path']) && $row['backdrop_path'] != null) {
        $images = 'https://image.tmdb.org/t/p/original' . $row['backdrop_path'];
        $w600 = 'https://image.tmdb.org/t/p/w600' . $row['backdrop_path'];
    } else {
        $images = site_theme() . '/images/no-backdrop.png';
        $w600 = site_theme() . '/images/no-backdrop.png';
    }

    if (isset($row['poster_path']) && $row['poster_path'] != null) {
        $images_small = 'https://image.tmdb.org/t/p/w185' . $row['poster_path'];
    } elseif (isset($row['backdrop_path']) && $row['backdrop_path'] != null) {
        $images_small = 'https://image.tmdb.org/t/p/w185' . $row['backdrop_path'];
    } else {
        $images_small = site_theme() . '/images/no-cover.png';
    }

    if (isset($row['genres']) && is_array($row['genres'])) {
        $genres = array();
        foreach ($row['genres'] as $result) {
            $genres[] = $result['name'];
        }
        $genre = implode(", ", $genres);
    }

    if (isset($row['genres']) && is_array($row['genres'])) {
        foreach ($row['genres'] as $result) {
            $category = $result['name'];
            $categoryid = $result['id'];
        }
    }

    if (isset($row['credits']['cast']) && is_array($row['credits']['cast'])) {
        $ic = 0;
        $casts = array();
        foreach ($row['credits']['cast'] as $result) {
            $casts[] = '<span itemprop="actor" itemscope itemtype="https://schema.org/Person">' . $result['name'] . '</span>';
            if ($ic++ == 10) break;
        }
        $cast = implode(", ", $casts);
    }

    if ($row['vote_average'] > 0) {
        $get_rating = $row['vote_average'];
        $emp_rating = 11 - $get_rating;
    } else {
        $emp_rating = 10;
    }

    if (isset($row['keywords']['keywords']) && is_array($row['keywords']['keywords'])) {
        $keyword = array();
        foreach ($row['keywords']['keywords'] as $result) {
            $keyword[] = '<span class="itemprop" itemprop="keywords">' . $result['name'] . '</span>';
        }
        $keywords = implode(", ", $keyword);
    }

    if (isset($row['alternative_titles']['results']) && is_array($row['alternative_titles']['results'])) {
        $alternative = array();
        foreach ($row['alternative_titles']['results'] as $result) {
            $alternative[] = $result['title'];
        }
        $alternative_titles = implode(", ", $alternative);
    }

    if (isset($row['networks']) && is_array($row['networks'])) {
        $countrys = array();
        foreach ($row['networks'] as $result) {
            $countrys[] = $result['name'];
        }
        $networks = implode(", ", $countrys);
    }

    if (isset($str[2]) && $str[2] != '') {
        if (isset($row3['still_path']) && $row3['still_path']) {
            $images = 'https://image.tmdb.org/t/p/original' . $row3['still_path'];
        }
    }
} else {
    ocim_throw();
}
endif;

function covtime($youtube_time) {
    preg_match_all('/(\d+)/', $youtube_time, $parts);

    // Put in zeros if we have less than 3 numbers.
    while (count($parts[0]) < 3) {
        array_unshift($parts[0], "0");
    }

    $sec_init = (int)$parts[0][2];
    $seconds = $sec_init % 60;
    $seconds_overflow = floor($sec_init / 60);

    $min_init = (int)$parts[0][1] + $seconds_overflow;
    $minutes = $min_init % 60;
    $minutes_overflow = floor($min_init / 60);

    $hours = (int)$parts[0][0] + $minutes_overflow;

    if ($hours != 0) {
        return sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds);
    } else {
        return sprintf('%02d:%02d', $minutes, $seconds);
    }
}
function convertToHoursMins($min, $format = '%02d:%02d:00') {
    $min = (int)$min;
    $hours = (int)($min / 60);
    $minutes = $min % 60;

    return sprintf($format, $hours, $minutes);
}
function seo($query) {
    if (config('_seo') == 'true') {
        if ($query) {
            return site_url() . '/' . config('search_url') . '/' . permalink($query) . config('url_end');
        }
    } else {
        return site_url() . '/?s=' . permalink($query);
    }
    return ''; // Return an empty string if no condition is met
}
function seo_movie($id, $query) {
    if (config('_seo') == 'true') {
        return '/' . options('url_movie') . '/' . $id . '/' . permalink($query) . config('url_end'); 
    } else {
        return '/?action=' . options('url_movie') . '&id=' . $id;
    }
}
function seo_tv($id, $query, $delimiter = '+') {
    if (config('_seo') == 'true') {
        return '/' . options('url_tv') . '/' . $id . '/' . permalink($query, ['delimiter' => $delimiter]) . config('url_end'); 
    } else {
        return '/?action=' . options('url_tv') . '&id=' . $id;
    }
}
function seo_tvdb($id, $season = '', $episode = '', $name = '') {
    if (config('_seo') == 'true') {
        if ($season == '' || $episode == '') {
            $uri = '/' . options('url_tvdb') . '/' . $id . '/';
        } else {
            $uri = '/' . options('url_tvdb') . '/' . $id . '/' . $season . '/' . $episode;
        }
    } else {
        if ($season == '' || $episode == '') {
            $uri = '/?action=' . options('url_tvdb') . '&id=' . $id;
        } else {
            $uri = '/?action=' . options('url_tvdb') . '&id=' . $id . '&season=' . $season . '&episode=' . $episode;
        }
    }

    return $uri;
}
function seo_video($id, $query, $delimiter = '+') {
    if (config('_seo') == 'true') {
        return site_url() . '/' . options('url_watch') . '/' . $id . '/' . permalink($query, ['delimiter' => $delimiter]) . config('url_end'); 
    } else {
        return site_url() . '/?action=video&id=' . $id;
    }
}

function view_page($page) {
    if (config('_seo') == 'true') {
        return site_url() . '/' . options('url_page') . '/' . $page . '/';
    } else {
        return site_url() . '/?do=' . $page;
    }
}

function seocat($query, $id = '') {
    if (config('_seo') == 'true') {
        return site_url() . '/' . config('category_url') . '/' . $query . '/' . $id;
    } else {
        return site_url() . '/?terms=' . $id;
    }
}

if (strtotime(date('Y-m-d G:i:s')) - filemtime($_SERVER['DOCUMENT_ROOT'] . '/cache/') > 86400) {
    deleteDirectory($_SERVER['DOCUMENT_ROOT'] . '/cache/home/');
    deleteDirectory($_SERVER['DOCUMENT_ROOT'] . '/cache/search/');
    deleteDirectory($_SERVER['DOCUMENT_ROOT'] . '/cache/movie/');
    deleteDirectory($_SERVER['DOCUMENT_ROOT'] . '/cache/tvdb/');
}

include(DOCUMENT_ROOT . '/app/core/tvdbController.php');
