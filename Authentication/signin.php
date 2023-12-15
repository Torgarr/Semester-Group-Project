<?php
require_once('functions.php');
if (isset($_SESSION['email'])) die('You are already signed in.');
$showForm = true;
if (count($_POST) > 0) {
    if (isset($_POST['email'][0]) && isset($_POST['password'][0])) {
        // process information
        $user = sign_in($pdo, 'SELECT * FROM users WHERE Email = ?', [$_POST['email']]);
        if ($user && password_verify($_POST['password'], $user['Password'])) {
            // Sign in user
            // 1. Save the user's data into the session
            $_SESSION['email'] = $user['Email'];
            $_SESSION['ID'] = $user['User_ID'];
            $_SESSION['role'] = $user['Admin'];
            // 2. Show a welcome message
            echo 'Welcome to our website';
            header("Location: ../admin/users/detail.php?id=".$_SESSION['ID']);
            $showForm = false;
        }
    }
    else echo 'Email and password are missing';

    // The credentialas are wrong
    if ($showForm) echo 'Your credentials are wrong';
} 

if ($showForm) {
?>
    <h1>Signin</h1>
    <form method="POSt">
        Email <br />
        <input type="email" name="email" required /><br /><br />
        Password<br />
        <input type="password" name="password" required />
        <button type="submit">Sign in</button>

    </form>
<?php
}
?>