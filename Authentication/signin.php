<?php
require_once('functions.php');
if(isset($_SESSION['email'])) die('You are already signed in.');
$showForm=true;
if(count($_POST)>0){
    if(isset($_POST['email'][0]) && isset($_POST['password'][0])){
        // process information
        $index = 0;
        $dir = dirname(__FILE__,2).'\data\users.csv.php';
        $fp=fopen($dir,'r');
        while(!feof($fp)){
            $line=fgets($fp);
            if(strstr($line, '<?php die() ?>') || strlen($line)<5) continue;
            $index++;
            $line=explode(';',trim($line));
            if($line[0]==$_POST['email'] && password_verify($_POST['password'],$line[1])){
                // Sign in user
                //1. save the users data into the session
                $_SESSION['email']=$_POST['email'];
                $_SESSION['ID']=$index;
                //2. show a welcome message
                echo 'Welcome to our website';
                $showForm=false;
            }
        }
        
        fclose($fp);
        // The credentialas are wrong
        if($showForm)echo 'Your credentials are wrong';
    }
    else echo 'Email and password are missing';
}
if($showForm){
?>
<h1>Signin</h1>
<form method="POSt">
    Email <br />
    <input type="emial" name="email" required /><br /><br />
    Password<br />
    <input type="password" name="password" required/>
    <button type="submit">Sign in</button>

</form>
<?php
}
?>