<?php

function writeToCVSFile($write_array) {

    if (isset($write_array[0]['wallposts'])) {
        $wallposts = 'wallposts.csv';
        $wallposts_write = fopen($wallposts, 'w') or die("can't open file");
        $list = array();
    }

    foreach ($write_array as $key => $index) {
        if (isset($write_array[$key]['wallposts'])) {
            $list[$key] = array();
            
            foreach ($write_array[$key]['wallposts'] as $messageindex => $arrayindex) {
                $arrayindex = str_replace(',', " ", $arrayindex);
                $arrayindex = str_replace('\n', " ", $arrayindex);
                $list[$key][$messageindex] = utf8_decode($arrayindex);
            }
        }
        array_unshift($list[$key], $key);
    }
    
    
    echo '<pre>';
    print_r($list);
    echo '</pre>';
    
    foreach($list as $fields) {
        fputcsv($wallposts_write, $fields);
    }
    fclose($wallposts_write);
}

?>
