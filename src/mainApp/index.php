<?php

$form = <<< EOD
<div id='form'>
<form action=" mainApp/submitform.php " method='post'>
EOD;
echo $form;
echo "<div id='friends'>";
include('windows/friends.php');
echo '</div>';

include('windows/form.php');
echo '<button type="submit">Submit</button>';
echo '</form>';
echo '</div>';
echo '<img src="http://fc02.deviantart.net/fs71/i/2011/036/d/f/fluttershy__s_gala_dress_by_tocupine-d38udha.png" id="fluttershy">';
echo "<div id=profile>";
include('windows/userProfile.php');
echo '</div><br />';

?>
