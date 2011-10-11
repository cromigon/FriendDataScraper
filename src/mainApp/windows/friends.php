<?php

echo '<select multiple="multiple" size="12" name="friends[]">';
foreach ($friends['data'] as $key => $friend) {

    echo '<option value="' . $key . '">' . ($key+1) . ". " . utf8_decode($friend['name']) . '</option>'; 
}
echo '</select>';
?>
