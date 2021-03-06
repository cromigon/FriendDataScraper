<?php
require 'config.php';

$me = null;
try {
    $uid = $facebook->getUser();
    $me = $facebook->api('/me');
} catch (FacebookApiException $e) {
    error_log($e);
}

if ($me) {
    $logoutUrl = $facebook->getLogoutUrl();
    $friends = $facebook->api('/me/friends');
} else {
    $loginUrl = $facebook->getLoginUrl(
            array('canvas' => 0,
                'fbconnect' => 0,
                'scope' => 'read_stream,publish_stream,user_relationship_details, friends_relationship_details, user_likes,friends_likes,user_about_me,friends_about_me,user_hometown,friends_hometown,user_birthday,friends_birthday,publish_stream,user_religion_politics,friends_religion_politics,user_location,friends_location,email',
                'next' => 'http://localhost/fb/FriendDataAnalyzer/newIndex.php',
                'cancel_url' => 'http://localhost/fb/FriendDataAnalyzer/newIndex.php'));
}
?>

<!-- The HTML output that the user sees -->
<!doctype html>
<html xmlns:fb="http://www.facebook.com/2008/fbml">
    <head>
        <title>Friend Data Analyzer</title>
        <link rel ="stylesheet"
              href="style/stylesheet.css"
              type="text/css"
              media="screen"
              />
    </head>
    <body>
        <div id="wrapper">
        <?php
        if ($me):
            include('mainApp/index.php');
            ?>
            <a href="<?php echo $logoutUrl; ?>">
                <img src="http://www.mywindowsphone.net/images/facebookLogOutButton.png">
            </a>

        <?php else: ?>
            <a href="<?php echo $loginUrl; ?>">
                <img src="http://static.ak.fbcdn.net/rsrc.php/zB6N8/hash/4li2k73z.gif">
            </a>
        <?php endif ?>
        </div>
    </body>
</html>
