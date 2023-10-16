<?php
require_once('functions.php');
if(count($_POST)>0){
    if(isset($_POST['email'][0]) && isset($_POST['password'][0])){
        $dir = dirname(__FILE__,2).'\data\users.csv.php';
        $fp=fopen($dir,'a+');
        fputs($fp,$_POST['email'].';'.$_POST['password'].PHP_EOL);
        fclose($fp);
    }
    else echo 'Email and password are missing';
}
?>
<h1>Signup</h1>
<form method="POSt">
    Email <br />
    <input type="emial" name="email" required /><br /><br />
    Email<br />
    <input type="password" name="password" required/>
    <button type="submit">Sign up</button>

</form>