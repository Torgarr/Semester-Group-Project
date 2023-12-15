<?php
require_once('users.php');
session_start();
if($_SESSION["role"] != 1 and $_SESSION["ID"] != $_GET['id']) die("You are not permitted here!");


// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Check if the user with the specified ID exists in the database
    $user_id = $_GET['id'];
    $current_user = get_user($pdo, 'SELECT * FROM users WHERE User_ID = ?', [$_SESSION["ID"]]);

    if ($current_user) {
        // Delete the specified user's data
        delete_user($pdo, 'DELETE FROM users WHERE User_ID = ?', [$_SESSION["ID"]]);

        $_SESSION['message'] = 'User successfully deleted';
    } else {
        $_SESSION['message'] = 'Invalid user ID';
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
    <title>Delete User</title>
</head>
<body>
    <h2>Delete User</h2>

    <?php
    // Display success or error message if available
    if (isset($_SESSION['message'])) {
        echo '<p>' . $_SESSION['message'] . '</p>';
        unset($_SESSION['message']); // Clear the message after displaying it
    }
    ?>
    

    <form action="<?= $_SERVER['PHP_SELF'] ?>?id=<?= $_GET['id'] ?>" method="post">
        <p>Are you sure you want to delete this User?</p>
        <input type="submit" name="submit" value="Delete User">
    </form>
</body>
</html>