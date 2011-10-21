<?php

   require 'facebook-sdk/facebook.php';
	
	$facebook = new Facebook(array(
	  'appId'  => 'YOUR_APP_ID_HERE',
	  'secret' => 'YOUR_APP_SECRET_HERE',
	  'cookie' => true,
          'callback' => 'localhost/fb/FriendDataAnalyzer/',
	));

?>
