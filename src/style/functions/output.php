<?php

function writeToCVSFile($write_array) {

    if (isset($write_array[0]['wallposts'])) {
        $wallposts = '../output/wallposts.csv';
        $wallposts_write = fopen($wallposts, 'w') or die("can't open file");
        $listwp = array();
    }

    if (isset($write_array[0]['likes'])) {
        $likes = '../output/likes.csv';
        $likes_write = fopen($likes, 'w') or die("can't open file");
        $listlike = array();
    }

    if (isset($write_array[0]['wallpostsCont'])) {
        $wallpostsCont = '../output/wallpostsCont.csv';
        $wallpostsCont_write = fopen($wallpostsCont, 'w') or die("can't open file");
        $listwpc = array();
    }
    
     if (isset($write_array[0]['towns'])) {
        $towns = '../output/towns.csv';
        $towns_write = fopen($towns, 'w') or die("can't open file");
        $listtow = array();
    }



    foreach ($write_array as $key => $index) {
        if (isset($write_array[$key]['wallposts'])) {
            $listwp[$key] = array();
            foreach ($write_array[$key]['wallposts'] as $messageindex => $arrayindexwp) {
                $arrayindexwp = str_replace(',', " ", $arrayindexwp);
                $arrayindexwp = str_replace('\n', " ", $arrayindexwp);
                $listwp[$key][$messageindex] = utf8_decode($arrayindexwp);
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

        if (isset($write_array[$key]['wallpostsCont'])) {
            $listwpc[$key] = array();

            foreach ($write_array[$key]['wallpostsCont'] as $messageindex => $arrayindexwpc) {
                $arrayindexwpc = str_replace(',', " ", $arrayindexwpc);
                $arrayindexwpc = str_replace('\n', " ", $arrayindexwpc);
                $listwpc[$key][$messageindex] = utf8_decode($arrayindexwpc);
            }
            array_unshift($listwpc[$key], $key);
            echo '<pre>';
            print_r($listwpc);
            echo '</pre>';
        }
        
        if (isset($write_array[$key]['towns'])) {
            $listwpc[$key] = array();

            foreach ($write_array[$key]['towns'] as $townindex => $arrayindextow) {
                $arrayindextow = str_replace(',', " ", $arrayindextow);
                $arrayindextow = str_replace('\n', " ", $arrayindextow);
                $listtow[$key][$townindex] = utf8_decode($arrayindextow);
            }
            array_unshift($listtow[$key], $key);
            echo '<pre>';
            print_r($listtow);
            echo '</pre>';
        }
    }




    if (isset($write_array[0]['wallposts'])) {
        foreach ($listwp as $fieldswp) {
            fputcsv($wallposts_write, $fieldswp);
        }
        fclose($wallposts_write);
    }
    if (isset($write_array[0]['likes'])) {
        foreach ($listlike as $fieldslike) {
            fputcsv($likes_write, $fieldslike);
        }
        fclose($likes_write);
    }

    if (isset($write_array[0]['wallpostsCont'])) {
        foreach ($listwpc as $fieldswpc) {
            fputcsv($wallpostsCont_write, $fieldswpc);
        }
        fclose($wallpostsCont_write);
    }
    
      if (isset($write_array[0]['towns'])) {
        foreach ($listtow as $fieldstow) {
            fputcsv($towns_write, $fieldstow);
        }
        fclose($towns_write);
    }
}

?>
