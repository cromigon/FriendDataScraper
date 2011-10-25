<?php

   require 'facebook-sdk/facebook.php';
	$facebook = new Facebook(array(
	  'appId'  => 'YOUR_APPID_HERE',
	  'secret' => 'YOUR_APPSECRET_HERE',
	  'cookie' => true,
          'callback' => 'localhost/fb/FriendDataAnalyzer/',
	));
        

?>
