<?php
require_once('pages.php');

if(count($_POST)>0){

    createPage($_POST);
    $item = getSize() - 1;
    header('location: edit.php?id='.$item);
}


?>

<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
<label>File Name</label><br />
<input name="file_name" type="text" /><br />
<label>File Contents</label><br />
<textarea name="file_contents" rows="10" cols="30"></textarea><br />
<button type="submit">Submit Form</button>
</form>

<a href="index.php">Back to Page List</a>