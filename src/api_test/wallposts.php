<?php
include('../config.php');

$wall = $facebook->api('/me/feed');

echo '<pre>';
print_r($wall);
echo '</pre>';
?>
