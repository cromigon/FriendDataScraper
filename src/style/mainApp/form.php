<?php
$form = <<< EOD
<fieldset>
    <form action=" submitform.php " method='post'>
    <input type="checkbox" name="likes" value="1" /> Likes<br />
    <input type="checkbox" name="posts" value="1" /> Posts<br />
    <input type="checkbox" name="posts_containing" value="1" /> Posts Containing <input type="text" name="post_data" value="Post data" /><br />
    <input type="checkbox" name="religion" value="1" /> Religion<br />
    <input type="checkbox" name="city" value="1" />Current City<br />
    <input type="checkbox" name="age" value="1" /> Age<br />
    <input type="checkbox" name="birthyear" value="1" /> Birthyear<br /><br />
    <button type="submit">Submit</button>
    </form>
</fieldset>

EOD;

echo $form;
?>
