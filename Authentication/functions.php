<?php
session_start();

$host='localhost';
$db='gaming_forum';
$user='root';
$pass='';
$charset='utf8';
$dsn="mysql:host=$host;dbname=$db;charset=$charset";
$pdo = new PDO($dsn, $user, $pass);

function sign_up($pdo, $query, $data){
    $query = $pdo->prepare($query);
    $query->execute($data);
}

function sign_in($pdo, $query, $data){
    $query = $pdo->prepare($query);
    $query->execute($data);
    $user = $query->fetch(PDO::FETCH_ASSOC);
    return $user;
}



?>