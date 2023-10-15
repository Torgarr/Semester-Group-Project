<?php
require_once('pages.php');
$item = $_GET['id'];
if(count($_POST)>0){
    
    print_r(getPageTitle($item));
    print_r($item);
    deletePage(getPageTitle($item),$item);
    header('location: index.php');
}
?>

<form action="<?= $_SERVER['PHP_SELF'] ?>?id=<?= $_GET['id'] ?>" method="POST" enctype="multipart/form-data">
<label>Confrim Deletion of <?= getPageTitle($item) ?></label><br />
<input type="hidden" name="item_id" value="<?php echo $item; ?>">
<button type="submit">Delete <?= getPageTitle($item) ?></button>
</form>
<a href="index.php">Back to Page List</a>