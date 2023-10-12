<?php
require_once('pages.php');
$item = $_GET['id'];
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Page Detail</title>
</head>
<body>
    <h1><?php echo getPageTitle($item); ?></h1>
    <!-- Add links for editing and deleting the page -->
    <a href="edit.php?id=<?php echo $item; ?>">Edit Page</a>
    <a href="delete.php?id=<?php echo $item; ?>">Delete Page</a>
    <p><?php echo getPageContent($item); ?></p>

    <br><br>
    <a href="index.php">Back to Page List</a>
</body>
</html>



