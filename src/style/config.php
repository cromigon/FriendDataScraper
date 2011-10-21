<?php

   require 'facebook-sdk/facebook.php';
	
	$facebook = new Facebook(array(
	  'appId'  => '156435901112829',
	  'secret' => '04aab90eb749f132b8158f5a8685f5dd',
	  'cookie' => true,
          'callback' => 'localhost/fb/FriendDataAnalyzer/',
	));

?>
