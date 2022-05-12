<pre>
<?php
    // ----------------- ЗДЕСЬ ВСЁ ПО-ДУГОМУ ---------------------
    function connect_db() {
//        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $db = mysqli_connect('localhost', 'root', '', 'site');
        if (!db) {
            exit('Error'.mysqli_error());
        }
        return $db;
     }

    function get_games($db, $id = FALSE) {
        $sql = "SELECT * FROM `игра` ";
        $sql_genre = "SELECT DISTINCT идентификатор_игры, графическое_изображение, название, описание, дата_публикации, рейтинг FROM `игра` 
        JOIN `Игра_категория` USING(идентификатор_игры)
        JOIN `Категория` USING(идентификатор_категории)
        WHERE ";

        if ($id) {
        
            if (starts_with($id, 'genre')) {
                $sql = $sql_genre;
                $genre_list = explode(' ' , $id);
                
                for ($i = 1; $i < count($genre_list); $i++) {
                    if($i == 1) {
                        $sql .= "идентификатор_игры in (SELECT DISTINCT идентификатор_игры from `игра`
	                                    JOIN `Игра_категория` USING(идентификатор_игры)
	                                    JOIN `Категория` USING(идентификатор_категории)
                                        WHERE `название_категории` = '" . $genre_list[$i] . "')";
                    } else if ($genre_list[$i] != 'sort_date' && $genre_list[$i] != 'sort_dateDESC' && $genre_list[$i] != 'sort_rating' && $genre_list[$i] != 'sort_ratingDESC'){
                        $sql .= "AND идентификатор_игры in (SELECT DISTINCT идентификатор_игры from `игра`
	                                    JOIN `Игра_категория` USING(идентификатор_игры)
	                                    JOIN `Категория` USING(идентификатор_категории)
                                        WHERE `название_категории` = '" . $genre_list[$i] . "')";
                    } else if ($genre_list[$i] == 'sort_date') {
                        $sql .= "ORDER BY дата_публикации";
                    } else if ($genre_list[$i] == 'sort_dateDESC') {
                        $sql .= "ORDER BY дата_публикации DESC";
                    } else if ($genre_list[$i] == "sort_rating") {
                        $sql .= "ORDER BY рейтинг";
                    } else if ($genre_list[$i] == "sort_ratingDESC") {
                        $sql .= "ORDER BY рейтинг DESC";
                    }
                }
                $sql .= ";";
            }
            if ($id == 'sort_date') {
                $sql .= "ORDER BY дата_публикации";
            } else if ($id == 'sort_dateDESC') {
                $sql .= "ORDER BY дата_публикации DESC";
            } else if ($id == "sort_rating") {
                $sql .= "ORDER BY рейтинг";
            } else if ($id == "sort_ratingDESC") {
                $sql .= "ORDER BY рейтинг DESC";
            }
        }
        $result = mysqli_query($db, $sql);
        for ($i = 0; $i < mysqli_num_rows($result); $i++) {
            $games[] = mysqli_fetch_array($result);
        }
     return $games;
     }

     function get_reviews($db) {
        $sql = "SELECT идентификатор_отзыва, отзыв.имя_пользователя,идентификатор_игры, рейтинг, текст, фото_профиля 
                FROM `отзыв` join пользователь on пользователь.имя_пользователя = отзыв.имя_пользователя";
        $result = mysqli_query($db, $sql);
        for ($i = 0; $i < mysqli_num_rows($result); $i++) {
            $reviews[] = mysqli_fetch_array($result);
        }
     return $reviews;
     }

     function get_comments($db) {
        $sql = "SELECT DISTINCT идентификатор_комментария, идентификатор_родителя,
        идентификатор_новости, комментарий.имя_пользователя, текст,  фото_профиля 
        FROM `комментарий` join пользователь on пользователь.имя_пользователя = комментарий.имя_пользователя";
        $result = mysqli_query($db, $sql);
        for ($i = 0; $i < mysqli_num_rows($result); $i++) {
            $comments[] = mysqli_fetch_array($result);
        }
     return $comments; 
     }

     function get_news($db) {
        $sql = "select новость.идентификатор_новости, название, содержание, изображение from изображение
                join новость on изображение.Новость_идентификатор_новости = новость.идентификатор_новости
                GROUP BY новость.идентификатор_новости, изображение
                ORDER BY  новость.идентификатор_новости";
        $result = mysqli_query($db, $sql);
        for ($i = 0; $i < mysqli_num_rows($result); $i++) {
            $news[] = mysqli_fetch_array($result);
        }
     return $news;
     }

    function starts_with($haystack, $needle) {
        $count = strlen($needle);
        if (substr($haystack, 0, $count) == $needle) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    ?>
</pre>
