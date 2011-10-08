<?php

function getFriends($facebook) {
    //get friends names and ID
    $friends = $facebook->api('/me/friends');
    echo '<pre>';
    print_r($friends);
    echo '</pre>';
}

function getFriendReligion($facebook, $friendID) {
    $friendReligion = $facebook->api('/'.$friendID);
}

?>
