<?php
$name = utf8_decode($me['name']);
$user = <<< EOD
    <img src="https://graph.facebook.com/{$me['id']}/picture">
    <p> <b>Logged in as</b> <br> {$name}</p>
EOD;

echo $user;
?>
