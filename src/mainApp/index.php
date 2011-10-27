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
echo "<div id=profile>";
include('windows/userProfile.php');
echo '</div><br />';

?>
