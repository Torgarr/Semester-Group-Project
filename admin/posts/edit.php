<?php
require_once('posts.php');
session_start();
// Fetch the current post from the database
$postID = $_GET['id'];
$current_post = get_post($pdo, 'SELECT * FROM posts WHERE Post_ID = ?', [$_SESSION["Post_ID"]]);

if($_SESSION["role"] != 1 and $_SESSION["ID"] != $current_post['User_ID']) die("You are not permitted here!");

// Check if the form is submitted
if(isset($_POST['submit'])){
    $postID = $_GET['id'];
    update_post($pdo, 'UPDATE posts SET Date_Updated = ?, Content = ?, Title = ? WHERE Post_ID = ?', [date("Y-m-d H:i:s"), $_POST['post'], $_POST['title'], $_SESSION["Post_ID"]]);
    $_SESSION['message'] = 'Post successfully edited';
    header("Location: {$_SERVER['PHP_SELF']}?id={$postID}");
    exit();
}

// Fetch the current post from the database
$postID = $_GET['id'];
$current_post = get_post($pdo, 'SELECT * FROM posts WHERE Post_ID = ?', [$_SESSION["Post_ID"]]);



if (!$current_post) {
    $_SESSION['message'] = 'Invalid post ID';
    header("Location: {$_SERVER['PHP_SELF']}");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
</head>
<body>
    <h2>Edit Post</h2>

    <?php
    // Display success or error message if available
    if(isset($_SESSION['message'])){
        echo '<p>' . $_SESSION['message'] . '</p>';
        unset($_SESSION['message']); // Clear the message after displaying it
    }
    ?>
	
    <form action="<?= $_SERVER['PHP_SELF'] ?>?id=<?= $_GET['id'] ?>" method="post">

        <label for="inputTitle">Title:</label>
        <input type="text" name="title" id="inputTitle" value="<?= $current_post['Title'] ?>" required>

        <label for="inputPost">Post:</label>
        <textarea name="post" id="inputPost" required><?= $current_post['Content'] ?></textarea>

        <input type="submit" name="submit" value="Edit Post">
    </form>
</body>
</html>
