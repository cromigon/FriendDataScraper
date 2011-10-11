<?php

echo '<pre>';
print_r($_POST);
echo '</pre>';
require('../config.php');

$params = 'name';


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

$result_array = array();

foreach ($_POST['friends'] as $key => $fid) {
    set_time_limit(0);
    $fql = 'SELECT ' . $params . ' from user where uid = ' . $fid;
    $return_object = $facebook->api(array(
        'method' => 'fql.query',
        'query' => $fql,
            ));

    array_push($result_array, $return_object);

    // FQL queries return the results in an array, so we have
    //  to get the user's name from the first element in the array.
    echo '<pre>';
    print_r($return_object);
    echo '</pre>';
    echo '<pre>Index: ' . $key . ', Name: ' . utf8_decode($return_object[0]['name']) . '</pre>';
}
print("All done!");
?>
