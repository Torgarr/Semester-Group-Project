<?php
require_once('users.php');
session_start();
if($_SESSION["role"] != 1 and $_SESSION["ID"] != $item) die("You are not permitted here!");


// Check if the form is submitted
if(isset($_POST['submit'])){
    $userID = $_GET['id'];
    $password = password_hash($_POST['Password'], PASSWORD_DEFAULT);
    if($_SESSION['role'] == 1){
        update_user($pdo, 'UPDATE users SET Company_ID = ?, First_Name = ?, Last_Name = ?, Email = ?, Username = ?, Password = ?, Admin = ? WHERE User_ID = ?', [$_POST['Company'], $_POST['First'], $_POST['Last'], $_POST['Email'], $_POST['Username'], $password, $_POST['Admin'], $_SESSION['ID']]);
    }
    else{
        update_user($pdo, 'UPDATE users SET Company_ID = ?, First_Name = ?, Last_Name = ?, Email = ?, Username = ?, Password = ? WHERE User_ID = ?', [$_POST['Company'], $_POST['First'], $_POST['Last'], $_POST['Email'], $_POST['Username'], $password, $_SESSION['ID']]);
    }
    $_SESSION['message'] = 'User successfully edited';
    header("Location: {$_SERVER['PHP_SELF']}?id={$userID}");
    exit();
}

// Fetch the current post from the database
$userID = $_GET['id'];
$current_user = get_user($pdo, 'SELECT * FROM users WHERE User_ID = ?', [$_SESSION["ID"]]);



if (!$current_user) {
    $_SESSION['message'] = 'Invalid User ID';
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

        <label for="inputTitle">Company ID:</label>
        <input type="text" name="Company" id="Company" value="<?= $current_user['Company_ID'] ?>" required><br>

        <label for="inputTitle">First Name:</label>
        <input type="text" name="First" id="First" value="<?= $current_user['First_Name'] ?>" required><br>

        <label for="inputTitle">Last Name:</label>
        <input type="text" name="Last" id="Last" value="<?= $current_user['Last_Name'] ?>" required><br>

        <label for="inputTitle">Email:</label>
        <input type="text" name="Email" id="Email" value="<?= $current_user['Email'] ?>" required><br>

        <label for="inputTitle">Username:</label>
        <input type="text" name="Username" id="Username" value="<?= $current_user['Username'] ?>" required><br>

        <label for="inputTitle">Password:</label>
        <input type="text" name="Password" id="Password"  required><br>

        <?php
        if($_SESSION['role'] == 1){
            ?>
            <label for="inputTitle">Admin:</label>
            <input type="text" name="Admin" id="Admin" value="<?= $current_user['Admin'] ?>" required><br>
            <?php
        }
        ?>

        <input type="submit" name="submit" value="Edit User">
    </form>
</body>
</html>
