<?php
require_once('posts.php');
session_start();

if(isset($_POST['submit'])){

    create_post($pdo, 'INSERT INTO posts (Post_ID, User_ID, Date_Created, Date_Updated, Content, Title) VALUES (?,?,?,?,?,?)', [rand(), $_SESSION['ID'], date("Y-m-d H:i:s"), date("Y-m-d H:i:s"), $_POST['post'], $_POST['title']]);
    
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
    <title>Add Post</title>
</head>
<body>
    <h2>Add New Post</h2>

    <?php
    // Display success or error message if available
    if(isset($_SESSION['message'])){
        echo '<p>' . $_SESSION['message'] . '</p>';
        unset($_SESSION['message']); // Clear the message after displaying it
    }
    ?>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

        <label for="inputTitle">Title:</label>
        <input type="text" name="title" id="inputRole" required>

        <label for="inputPost">Post:</label>
        <textarea name="post" id="inputPost" required></textarea>

        <input type="submit" name="submit" value="Add Member">
    </form>
</body>
</html>
