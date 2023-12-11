<?php
require_once('functions.php');
if(isset($_SESSION['email'])) die('You are already signed in, please sign out if you want to create a new account.');
$showForm=true;
if(count($_POST)>0){
    if(isset($_POST['email'][0]) && isset($_POST['password'][0])){
        // TODO: Check if the email already exists
        $result=check_email($pdo, 'SELECT * FROM users WHERE Email=?', [$_POST['email']]);
        if($result>0) die('The email address is already registered');
        else{
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            // Use prepared statements to insert data into the database
            sign_up($pdo, 'INSERT INTO users (User_ID, Company_ID, Username, First_Name, Last_Name, Email, Password, Date_Created, Admin) VALUES (?, ?, ?, ?, ?, ?, ?, NOW(), 0)', [rand(), 1, $_POST['username'], $_POST['first'], $_POST['last'], $_POST['email'], $password]);
            

            echo 'Your account has been created, proceed to the <a href="signin.php">Sign in page</a>.';
            $showForm = false;
        }
    } else {
        echo 'Email and password are missing';
    }
}
if($showForm){
?>
<h1>Signup</h1>
<form method="POST">
    First Name <br />
    <input type="text" name="first" required /><br /><br />
    Last Name <br />
    <input type="text" name="last" required /><br /><br />
    Username <br />
    <input type="text" name="username" required /><br /><br />
    Email <br />
    <input type="email" name="email" required /><br /><br />
    Password<br />
    <input type="password" name="password" required/>
    <button type="submit">Sign up</button>

</form>
<?php
}
?>