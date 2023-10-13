<?php
session_start();
$file = __DIR__ . '\\..\\..\\data\\posts.json';
print_r($data_array['forum'][$member_id]);
// Check if the form is submitted

    // Read existing JSON data
    $data = file_get_contents($file);
    $data_array = json_decode($data, true);

    // Check if the member with the specified ID exists in the "forum" array
    $member_id = $_GET['id'];
    if(isset($data_array['forum'][$member_id-1])){
        // Delete the specified user's data
		unset($data_array['forum'][$member_id - 1]);


        // Convert array to JSON and write to the file
        $updated_data = json_encode($data_array, JSON_PRETTY_PRINT);
        file_put_contents($file, $updated_data);

        $_SESSION['message'] = 'Member successfully edited';
    } else {
        $_SESSION['message'] = 'Invalid member ID';
    }

    // Redirect to avoid form resubmission on page refresh
    header("Location: {$_SERVER['PHP_SELF']}?id={$member_id}");
    exit();


// Read existing JSON data to get current member values
$data = file_get_contents($file);
$data_array = json_decode($data, true);

// Get the specified member's values
$member_id = $_GET['id'];
if(isset($data_array['forum'][$member_id])){
    $current_member = $data_array['forum'][$member_id];
} else {
    $_SESSION['message'] = 'Invalid member ID';
    header("Location: {$_SERVER['PHP_SELF']}");
    exit();
}
?>
