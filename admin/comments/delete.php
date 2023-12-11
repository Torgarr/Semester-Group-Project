<?php
require_once('comments.php');
session_start();



// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Check if the comment with the specified ID exists in the database
    $comment_id = $_GET['id'];
    $current_comment = get_comment($pdo, 'SELECT * FROM comment WHERE Comment_ID = ?', [$_SESSION["Comment_ID"]]);
    if($_SESSION["role"] != 1 and $_SESSION["ID"] != $current_comment['User_ID']) die("You are not permitted here!");

    if ($current_comment) {
        // Delete the specified comment's data
        delete_comment($pdo, 'DELETE FROM comment WHERE Comment_ID = ?', [$_SESSION["Comment_ID"]]);

        $_SESSION['message'] = 'comment successfully deleted';
    } else {
        $_SESSION['message'] = 'Invalid comment ID';
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
    <title>Delete Comment</title>
</head>
<body>
    <h2>Delete Comment</h2>

    <?php
    // Display success or error message if available
    if (isset($_SESSION['message'])) {
        echo '<p>' . $_SESSION['message'] . '</p>';
        unset($_SESSION['message']); // Clear the message after displaying it
    }
    ?>
    

    <form action="<?= $_SERVER['PHP_SELF'] ?>?id=<?= $_GET['id'] ?>" method="post">
        <p>Are you sure you want to delete this Comment?</p>
        <input type="submit" name="submit" value="Delete Comment">
    </form>
</body>
</html>