<?php
require_once('comments.php');
session_start();
// Fetch the current comment from the database
$commentID = $_GET['id'];
$current_comment = get_comment($pdo, 'SELECT * FROM comment WHERE Comment_ID = ?', [$_SESSION["Comment_ID"]]);

if($_SESSION["role"] != 1 and $_SESSION["ID"] != $current_comment['User_ID']) die("You are not permitted here!");

// Check if the form is submitted
if(isset($_POST['submit'])){
    $commentID = $_GET['id'];
    update_comment($pdo, 'UPDATE comment SET Comment = ? WHERE Comment_ID = ?', [$_POST['comment'],  $_SESSION["Comment_ID"]]);
    $_SESSION['message'] = 'Comment successfully edited';
    header("Location: {$_SERVER['PHP_SELF']}?id={$commentID}");
    exit();
}

// Fetch the current comment from the database
$commentID = $_GET['id'];
$current_comment = get_comment($pdo, 'SELECT * FROM comment WHERE Comment_ID = ?', [$_SESSION["Comment_ID"]]);



if (!$current_comment) {
    $_SESSION['message'] = 'Invalid comment ID';
    header("Location: {$_SERVER['PHP_SELF']}");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Comment</title>
</head>
<body>
    <h2>Edit Comment</h2>

    <?php
    // Display success or error message if available
    if(isset($_SESSION['message'])){
        echo '<p>' . $_SESSION['message'] . '</p>';
        unset($_SESSION['message']); // Clear the message after displaying it
    }
    ?>
	
    <form action="<?= $_SERVER['PHP_SELF'] ?>?id=<?= $_GET['id'] ?>" method="post">

        <label for="inputComment">Comment:</label>
        <textarea name="comment" id="inputComment" required><?= $current_comment['Comment'] ?></textarea>

        <input type="submit" name="submit" value="Edit Comment">
    </form>
</body>
</html>
