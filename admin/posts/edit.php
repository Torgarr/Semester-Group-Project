<?php
session_start();
$file = __DIR__ . '\\..\\..\\data\\posts.json';

// Check if the form is submitted
if(isset($_POST['submit'])){
    // Read existing JSON data
    $data = file_get_contents($file);
    $data_array = json_decode($data, true);

    // Extract form data
    $edited_member = array(
        'username' => $_POST['username'],
        'title' => $_POST['title'],
        'post'  => $_POST['post'],
        'date'  => $_POST['date']
    );

    // Check if the member with the specified ID exists in the "forum" array
    $member_id = $_GET['id'] - 1;
    if(isset($data_array['forum'][$member_id])){
        // Update the existing member's data
        $data_array['forum'][$member_id] = $edited_member;

        // Convert array to JSON and write to the file
        $updated_data = json_encode($data_array, JSON_PRETTY_PRINT);
        file_put_contents($file, $updated_data);

        $_SESSION['message'] = 'Post successfully edited';
    } else {
        $_SESSION['message'] = 'Invalid post ID';
    }

    // Redirect to avoid form resubmission on page refresh
    header("Location: {$_SERVER['PHP_SELF']}?id={$member_id}");
    exit();
}

// Read existing JSON data to get current member values
$data = file_get_contents($file);
$data_array = json_decode($data, true);

// Get the specified member's values
$member_id = $_GET['id'] - 1;
if(isset($data_array['forum'][$member_id])){
    $current_member = $data_array['forum'][$member_id];
} else {
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
    <title>Edit Member</title>
</head>
<body>
    <h2>Edit Member</h2>

    <?php
    // Display success or error message if available
    if(isset($_SESSION['message'])){
        echo '<p>' . $_SESSION['message'] . '</p>';
        unset($_SESSION['message']); // Clear the message after displaying it
    }
    ?>
	
    <form action="<?= $_SERVER['PHP_SELF'] ?>?id=<?= $_GET['id'] ?>" method="post">
        <label for="inputUserName">Username:</label>
        <input type="text" name="username" id="inputUserName" value="<?= $current_member['username'] ?>" required>

        <label for="inputTitle">Title:</label>
        <input type="text" name="title" id="inputTitle" value="<?= $current_member['title'] ?>" required>

        <label for="inputPost">Post:</label>
        <textarea name="bio" id="inputPost" required><?= $current_member['post'] ?></textarea>

        <input type="submit" name="submit" value="Edit Post">
    </form>
</body>
</html>