<?php

function writeToCVSFile($write_array) {

    if (isset($write_array[0]['wallposts'])) {
        $wallposts = 'wallposts.csv';
        $wallposts_write = fopen($wallposts, 'w') or die("can't open file");
        $listwp = array();
    }

    if (isset($write_array[0]['likes'])) {
        $likes = 'likes.csv';
        $likes_write = fopen($likes, 'w') or die("can't open file");
        $listlike = array();
    }


    foreach ($write_array as $key => $index) {
        if (isset($write_array[$key]['wallposts'])) {
            $listwp[$key] = array();

            foreach ($write_array[$key]['wallposts'] as $messageindex => $arrayindex) {
                $arrayindex = str_replace(',', " ", $arrayindex);
                $arrayindex = str_replace('\n', " ", $arrayindex);
                $listwp[$key][$messageindex] = utf8_decode($arrayindex);
            }
            array_unshift($listwp[$key], $key);
        }

        if (isset($write_array[$key]['likes'])) {
            $listlike[$key] = array();

            foreach ($write_array[$key]['likes'] as $likeindex => $arrayindexlike) {
                $arrayindexlike = str_replace(',', " ", $arrayindexlike);
                $arrayindexlike = str_replace('\n', " ", $arrayindexlike);
                $listlike[$key][$likeindex] = utf8_decode($arrayindexlike);
            }
            array_unshift($listlike[$key], $key);
        }
    }




    echo '<pre>';
    print_r($listwp);
    echo '</pre>';
    echo '<pre>';
    print_r($listlike);
    echo '</pre>';

    if (isset($write_array[0]['wallposts'])) {
        foreach ($listwp as $fieldswp) {
            fputcsv($wallposts_write, $fieldswp);
            fclose($wallposts_write);
        }
    }
    if (isset($write_array[0]['likes'])) {
        foreach ($listlike as $fieldslike) {
            fputcsv($likes_write, $fieldslike);
            fclose($likes_write);
        }
    }
}

?>
