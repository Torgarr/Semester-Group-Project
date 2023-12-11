<?php
require_once('posts.php');
session_start();



// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Check if the post with the specified ID exists in the database
    $post_id = $_GET['id'];
    $current_post = get_post($pdo, 'SELECT * FROM posts WHERE Post_ID = ?', [$_SESSION["Post_ID"]]);
    if($_SESSION["role"] != 1 and $_SESSION["ID"] != $current_post['User_ID']) die("You are not permitted here!");

    if ($current_post) {
        // Delete the specified post's data
        delete_post($pdo, 'DELETE FROM posts WHERE Post_ID = ?', [$_SESSION["Post_ID"]]);

        $_SESSION['message'] = 'Post successfully deleted';
    } else {
        $_SESSION['message'] = 'Invalid post ID';
    }

    // Redirect to avoid form resubmission on page refresh
    header("Location: index.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Post</title>
</head>
<body>
    <h2>Delete Post</h2>

    <?php
    // Display success or error message if available
    if (isset($_SESSION['message'])) {
        echo '<p>' . $_SESSION['message'] . '</p>';
        unset($_SESSION['message']); // Clear the message after displaying it
    }
    ?>
    

    <form action="<?= $_SERVER['PHP_SELF'] ?>?id=<?= $_GET['id'] ?>" method="post">
        <p>Are you sure you want to delete this post?</p>
        <input type="submit" name="submit" value="Delete Post">
    </form>
</body>
</html>