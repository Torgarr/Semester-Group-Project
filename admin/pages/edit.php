<?php
require_once('pages.php');
$item = $_GET['id'];
if(count($_POST)>0){
    
    deletePage(getPageTitle($item),$item);
    
    createPage($_POST);
    $item = (getSize() - 1);
}

?>

<form action="<?= $_SERVER['PHP_SELF'] ?>?id=<?= $_GET['id'] ?>" method="POST" enctype="multipart/form-data">
<label>File Name</label><br />
<input name="file_name" type="text" value="<?= pathinfo(getPageTitle($item), PATHINFO_FILENAME) ?>"/><br />
<label>File Contents</label><br />
<textarea name="file_contents" rows="10" cols="30" ><?= getPageContent($item) ?></textarea><br />
<button type="submit">Save Changes</button>
</form>

<a href="index.php">Back to Page List</a>