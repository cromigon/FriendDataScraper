<?php

echo '<select multiple="multiple" size="12" name="friends[]">';
sort($friends['data']);
foreach ($friends['data'] as $key => $friend) {

    echo '<option value="' . $friend['id'] . '">' . ($key+1) . ". " . utf8_decode($friend['name']) . " id: " . $friend['id'] . '</option>'; 
}
echo '</select>';
?>
