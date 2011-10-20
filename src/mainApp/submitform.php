<?php

echo '<pre>';
print_r($_POST);
echo '</pre>';
require('../config.php');
include('../functions/functions.php');

/*
  if (isset($_POST['likes']) && $_POST['likes'] == 1) {
  $params .= ', likes_count';
  }

  if (isset($_POST['posts']) && $_POST['posts'] == 1) {
  $params .= ', wall_count';
  }

  if (isset($_POST['posts_containing']) && $_POST['posts_containing'] == 1) {
  $params .= ', ';
  $data = $_POST['post_data'];
  }

  if (isset($_POST['city']) && $_POST['city'] == 1) {
  $params .= ', location';
  }

  if (isset($_POST['birthyear']) && $_POST['birthyear'] == 1) {
  $params .= ', birthday_date';
  }
 */
$result_array = array();

foreach ($_POST['friends'] as $key => $fid) {
    set_time_limit(0);
    $result_array[$key] = array();
    $result_array = getName($result_array, $facebook, $fid, $key);

    if (isset($_POST['likes']) && $_POST['likes'] == 1) {
        $result_array = getUserLikes($result_array, $facebook, $fid, $key);
    }
    
    if(isset($_POST['posts']) && $_POST['posts'] == 1) {
        $nr = $_POST['post_numbers'];
        $result_array = getUserWall($result_array, $facebook, $fid, $key, $nr);
    }
    
    if(isset($_POST['posts_containing']) && $_POST['posts_containing'] == 1) {
        $nr = $_POST['post_numbers'];
        $data = $_POST['post_data'];
        $result_array = getUserWallSpec($result_array, $facebook, $fid, $key, $nr, $data);
    }



    // FQL queries return the results in an array, so we have
    //  to get the user's name from the first element in the array.
    /* echo '<pre>';
      print_r($result_array);
      echo '</pre>';
      echo '<pre>Index: ' . $key . ', Name: ' . utf8_decode($result_array[0]['name']) . '</pre>'; */
}
print("All done!");
writeToCVSFile($result_array);


echo '<pre>';
print_r($result_array);
echo '</pre>';
?>
