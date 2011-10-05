<?php

   require 'config.php';

   $session = $facebook->getSession();

   header('Location: http://localhost/fb/index.php');
?>
