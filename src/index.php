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
   } else {
      $loginUrl = $facebook->getLoginUrl();
   }
   
//debug print for login, what I get in the array $me
echo '<pre>'; 
print_r($me);
echo '</pre>';

?>

<!-- The HTML output that the user sees -->
<!doctype html>
<html xmlns:fb="http://www.facebook.com/2008/fbml">
  <head>
    <title>php-sdk</title>
  </head>
  <body>
    <?php if ($me): ?>
    <?php echo "Welcome, " . utf8_decode($me['name']) . ".<br />"; ?>
    <a href="<?php echo $logoutUrl; ?>">
      <img src="http://static.ak.fbcdn.net/rsrc.php/z2Y31/hash/cxrz4k7j.gif">
    </a>
    <?php else: ?>
      <a href="<?php echo $loginUrl; ?>">
        <img src="http://static.ak.fbcdn.net/rsrc.php/zB6N8/hash/4li2k73z.gif">
      </a>
    <?php endif ?>
  </body>
</html>
