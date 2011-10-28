<?php
$form = <<< EOD
<fieldset>
    <Input type = 'Radio' Name ='anonymize' value= '1' checked='checked'>Anonymize
    <Input type = 'Radio' Name ='anonymize' value= '0'>Don't Anonymize <br />
    <input type="checkbox" name="likes" value="1" /> Likes<br />
    <input type="checkbox" name="posts" value="1" /> Post <br />
    <input type="checkbox" name="posts_containing" value="1" /> Posts Containing: <input type="text" name="post_data" value="Post data" /><br />
    <input type="checkbox" name="wallpost_share" value="1" /> Wallposts by others<br />   
    Number of Posts: <input type="text" name="post_numbers" value="100" /><br />
    <input type="checkbox" name="city" value="1" />Current City<br />
    <input type="checkbox" name="birthyear" value="1" /> Birthday<br /><br />
</fieldset>

EOD;

echo $form;
?>
