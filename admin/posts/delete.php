<?php
require_once('posts.php');
session_start();



// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Check if the post with the specified ID exists in the database
    $post_id = $_GET['id'];
    $current_post = get_post($pdo, 'SELECT * FROM posts WHERE Post_ID = ?', [$_SESSION["Post_ID"]]);

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
// // Check if the form is submitted

//     // Read existing JSON data
//     $data = file_get_contents($file);
//     $data_array = json_decode($data, true);

//     // Check if the member with the specified ID exists in the "forum" array
//     $post_id = $_GET['id'];
//     if(isset($data_array['forum'][$post_id-1])){
//         // Delete the specified user's data
// 		unset($data_array['forum'][$post_id - 1]);


//         // Convert array to JSON and write to the file
//         $updated_data = json_encode($data_array, JSON_PRETTY_PRINT);
//         file_put_contents($file, $updated_data);

//         $_SESSION['message'] = 'Member successfully edited';
//     } else {
//         $_SESSION['message'] = 'Invalid member ID';
//     }

//     // Redirect to avoid form resubmission on page refresh
//     header("Location: {$_SERVER['PHP_SELF']}?id={$post_id}");
//     exit();


// // Read existing JSON data to get current member values
// $data = file_get_contents($file);
// $data_array = json_decode($data, true);

// // Get the specified member's values
// $post_id = $_GET['id'];
// if(isset($data_array['forum'][$post_id])){
//     $current_post = $data_array['forum'][$post_id];
// } else {
//     $_SESSION['message'] = 'Invalid member ID';
//     header("Location: {$_SERVER['PHP_SELF']}");
//     exit();
// }
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