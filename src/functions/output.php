<?php

function writeToCVSFile($write_array, $list_of_friends, $anonymization) {

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

    if (isset($write_array[0]['wallpostTarget'])) {
        $wallpostsShare = '../output/wallpostsShared.csv';
        $wallpostsShare_write = fopen($wallpostsShare, 'w') or die("can't open file");
        $listwps = array();
    }

    if (isset($write_array[0]['towns'])) {
        $towns = '../output/towns.csv';
        $towns_write = fopen($towns, 'w') or die("can't open file");
        $listtow = array();
    }

    if (isset($write_array[0]['birthday'])) {
        $birthday = '../output/birthday.csv';
        $birthday_write = fopen($birthday, 'w') or die("can't open file");
        $listbirthday = array();
    }

    foreach ($write_array as $key => $index) {
        if (isset($write_array[$key]['wallposts'])) {
            $listwp[$key] = array();
            foreach ($write_array[$key]['wallposts'] as $messageindex => $arrayindexwp) {
                $arrayindexwp = str_replace(',', " ", $arrayindexwp);
                $arrayindexwp = str_replace('\n', " ", $arrayindexwp);
                $listwp[$key][$messageindex] = utf8_decode($arrayindexwp);
            }
            if ($anonymization == 1) {
                array_unshift($listwp[$key], $key);
            } else {
                array_unshift($listwp[$key], $list_of_friends[$key]);
            }
        }

        if (isset($write_array[$key]['likes'])) {
            $listlike[$key] = array();

            foreach ($write_array[$key]['likes'] as $likeindex => $arrayindexlike) {
                $arrayindexlike = str_replace(',', " ", $arrayindexlike);
                $arrayindexlike = str_replace('\n', " ", $arrayindexlike);
                $listlike[$key][$likeindex] = utf8_decode($arrayindexlike);
            }
            if ($anonymization == 1) {
                array_unshift($listlike[$key], $key);
            } else {
                array_unshift($listlike[$key], $list_of_friends[$key]);
            }
        }

        if (isset($write_array[$key]['wallpostsCont'])) {
            $listwpc[$key] = array();

            foreach ($write_array[$key]['wallpostsCont'] as $messageindex => $arrayindexwpc) {
                $arrayindexwpc = str_replace(',', " ", $arrayindexwpc);
                $arrayindexwpc = str_replace('\n', " ", $arrayindexwpc);
                $listwpc[$key][$messageindex] = utf8_decode($arrayindexwpc);
            }
            if ($anonymization == 1) {
                array_unshift($listwpc[$key], $key);
            } else {
                array_unshift($listwpc[$key], $list_of_friends[$key]);
            }
        }

        if (isset($write_array[$key]['wallpostTarget'])) {
            $listwps[$key] = array();
            foreach ($write_array[$key]['wallpostTarget'] as $targetindex => $arrayindexwps) {
                $pos = array_search($arrayindexwps, $list_of_friends);
                if ($anonymization == 1) {
                    if ($pos !== false) {
                        array_push($listwps[$key], $pos);
                    }
                } else {
                    if ($pos !== false) {
                        array_push($listwps[$key], $list_of_friends[$pos]);
                    }
                }
            }
            if ($anonymization == 1) {
                array_unshift($listwps[$key], $key);
            } else {
                array_unshift($listwps[$key], $list_of_friends[$key]);
            }
        }

        if (isset($write_array[$key]['towns'])) {
            $listwpc[$key] = array();

            foreach ($write_array[$key]['towns'] as $townindex => $arrayindextow) {
                $arrayindextow = str_replace(',', " ", $arrayindextow);
                $arrayindextow = str_replace('\n', " ", $arrayindextow);
                $listtow[$key][$townindex] = utf8_decode($arrayindextow);
            }
            if ($anonymization == 1) {
                array_unshift($listtow[$key], $key);
            } else {
                array_unshift($listtow[$key], $list_of_friends[$key]);
            }
        }


        if (isset($write_array[$key]['birthday'])) {
            $listbirthday[$key] = array();
            $listbirthday[$key][0] = $write_array[$key]['birthday'];

            if ($anonymization == 1) {
                array_unshift($listbirthday[$key], $key);
            } else {
                array_unshift($listbirthday[$key], $list_of_friends[$key]);
            }
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

    if (isset($write_array[0]['wallpostTarget'])) {
        foreach ($listwps as $fieldswps) {
            fputcsv($wallpostsShare_write, $fieldswps);
        }
        fclose($wallpostsShare_write);
    }

    if (isset($write_array[0]['towns'])) {
        foreach ($listtow as $fieldstow) {
            fputcsv($towns_write, $fieldstow);
        }
        fclose($towns_write);
    }

    if (isset($write_array[0]['birthday'])) {
        foreach ($listbirthday as $fieldsbirthday) {
            fputcsv($birthday_write, $fieldsbirthday);
        }
        fclose($birthday_write);
    }
}

?>
