<?php

$form = <<< EOD
<fieldset>
    <input type="checkbox" name="likes" value="1" /> Likes<br />
    <input type="checkbox" name="posts" value="1" /> Posts, Number of Posts: <input type="text" name="post_numbers" value="100" /><br />
    <input type="checkbox" name="posts_containing" value="1" /> Posts Containing: <input type="text" name="post_data" value="Post data" /><br />
    <input type="checkbox" name="city" value="1" />Current City<br />
    <input type="checkbox" name="age" value="1" /> Age<br />
    <input type="checkbox" name="birthyear" value="1" /> Birthyear<br /><br />
</fieldset>

EOD;

echo $form;
?>
