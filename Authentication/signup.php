<?php
require_once('functions.php');
if(isset($_SESSION['email'])) die('You are already signed in, please sign out if you want to create a new account.');
$showForm=true;
if(count($_POST)>0){
    if(isset($_POST['email'][0]) && isset($_POST['password'][0])){
        // TODO check if the email already exists
        // process information
        $dir = dirname(__FILE__,2).'\data\users.csv.php';
        $fp=fopen($dir,'a+');
        fputs($fp,$_POST['email'].';'.password_hash($_POST['password'], PASSWORD_DEFAULT).PHP_EOL);
        fclose($fp);
        echo 'Your account has been created, procees to the <a href="signin.php">Sign in page</a>.';
        $showForm=false;
    }
    else echo 'Email and password are missing';
    
}
if($showForm){
?>
<h1>Signup</h1>
<form method="POSt">
    Email <br />
    <input type="emial" name="email" required /><br /><br />
    Password<br />
    <input type="password" name="password" required/>
    <button type="submit">Sign up</button>

</form>
<?php
}
?>