<?php
$name = utf8_decode($me['name']);
$user = <<< EOD
    <br>
    <br> <img src="https://graph.facebook.com/{$me['id']}/picture">
    <p> Logged in as <br> {$name}</p>
EOD;

echo $user;
?>
