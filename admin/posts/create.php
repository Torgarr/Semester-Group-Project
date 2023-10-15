<?php
session_start();
$file = __DIR__ . '\\..\\..\\data\\posts.json';
$username = 'Placeholder';
$date = date("m/d/Y");
// Check if the form is submitted
if(isset($_POST['submit'])){
    // Read existing JSON data
    $data = file_get_contents($file);
    $data_array = json_decode($data, true);

    // Extract form data
    $new_post = array(
        'username' => $username,
        'title' => $_POST['title'],
        'post'  => $_POST['post'],
        'date'  => $date
    );
    if(isset($json_data['forum']) && is_array($json_data['forum'])){
        
		// Append new member to the "team" array
        $json_data['forum'][] = $new_post;
    } 
    // Append new data
    $data_array['forum'][] = $new_post;

    // Convert array to JSON and write to the file
    $updated_data = json_encode($data_array, JSON_PRETTY_PRINT);
    file_put_contents($file, $updated_data);

    $_SESSION['message'] = 'Post successfully added';

    // Redirect to avoid form resubmission on page refresh
    header("Location: {$_SERVER['PHP_SELF']}");
    exit();
}

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
        <input type="text" name="role" id="inputRole" required>

        <label for="inputPost">Post:</label>
        <textarea name="post" id="inputPost" required></textarea>

        <input type="submit" name="submit" value="Add Member">
    </form>
</body>
</html>
