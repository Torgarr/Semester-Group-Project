<?php
require_once('comments.php');
session_start();
if (!isset($_SESSION['email'])) die('You need to be signed in to create a post');

// Check if the form is submitted
if(isset($_POST['submit'])){

    create_comment($pdo, 'INSERT INTO comment (Comment_ID, Post_ID, User_ID, Comment) VALUES (?,?,?,?)', [rand(), $_SESSION['Post_ID'], $_SESSION["ID"],  $_POST['comment']]);
    
    header("Location: index.php");
    exit();
}
if(!isset($_SESSION['email'])) die('Sign in to create a post.');
// Display the form
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Comment</title>
</head>
<body>
    <h2>Add New Comment</h2>

    <?php
    // Display success or error message if available
    if(isset($_SESSION['message'])){
        echo '<p>' . $_SESSION['message'] . '</p>';
        unset($_SESSION['message']); // Clear the message after displaying it
    }
    ?>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

        <label for="inputPost">Comment:</label>
        <textarea name="comment" id="inputPost" required></textarea>

        <input type="submit" name="submit" value="Post Comment">
    </form>
</body>
</html>
