<?php
require('../config.php');
include('../functions/functions.php');

$result_array = array();
$friendlist = $_POST['friends'];
$anonymization = $_POST['anonymize'];

foreach ($_POST['friends'] as $key => $fid) {
    set_time_limit(0);
    $result_array[$key] = array();
    $result_array = getName($result_array, $facebook, $fid, $key);

    if (isset($_POST['likes']) && $_POST['likes'] == 1) {
        $result_array = getUserLikes($result_array, $facebook, $fid, $key);
    }

    if (isset($_POST['posts']) && $_POST['posts'] == 1) {
        $nr = $_POST['post_numbers'];
        $result_array = getUserWall($result_array, $facebook, $fid, $key, $nr);
    }

    if (isset($_POST['posts_containing']) && $_POST['posts_containing'] == 1) {
        $nr = $_POST['post_numbers'];
        $data = $_POST['post_data'];
        $result_array = getUserWallSpec($result_array, $facebook, $fid, $key, $nr, $data);
    }

    if (isset($_POST['wallpost_share']) && $_POST['wallpost_share'] == 1) {
        $nr = $_POST['post_numbers'];
        $result_array = getWallpostsShared($result_array, $facebook, $fid, $key, $nr, $friendlist);
    }
    
    if(isset($_POST['city']) && $_POST['city'] == 1) {
        $result_array = getHomeTown($result_array, $facebook, $fid, $key);
    }

}

$file = fopen("../log/frienddataanalyzer.log", 'a');
fwrite($file, "Start Of Log " . strftime("%Y-%m-%d - %H:%M:%S") . "\n");
foreach ($_POST as $value) {
    if (is_array($value)) {
        foreach ($value as $index) {
            fwrite($file, $index . "\n");
        }
    }
    fwrite($file, $value . "\n");
}

foreach ($result_array as $value) {
    if (is_array($value)) {
        foreach ($value as $index) {
            if (is_array($index)) {
                foreach ($index as $i) {
                    fwrite($file, $i . "\n");
                }
            } else {
                fwrite($file, $index . "\n");
            }
        }
    }
    fwrite($file, $value . "\n");
}
fwrite($file, "End Of Log \n");
fclose($file);
print("All done!");
echo '<br />';
print("You can find the log in fb/FriendDataAnalyzer/log/frienddataanalyzer.log in your webroot.");
echo '<br /><br />';
echo '<a href="http://localhost/fb/FriendDataAnalyzer">Return to the application</a>';
writeToCVSFile($result_array, $friendlist, $anonymization);
?>
