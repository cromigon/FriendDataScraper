<?php

$form = <<< EOD
<form action=" mainApp/submitform.php " method='post'>
EOD;

echo $form;
include('windows/form.php');
include('windows/friends.php');
echo '<button type="submit">Submit</button>';
echo '</form>';
include('windows/userProfile.php');
include('windows/logout.php');
?>
