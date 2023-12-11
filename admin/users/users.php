<?php
$host='localhost';
$db='gaming_forum';
$user='root';
$pass='';
$charset='utf8';
$dsn="mysql:host=$host;dbname=$db;charset=$charset";
$pdo = new PDO($dsn, $user, $pass);

function view_all_users($pdo, $query){
    $query=$pdo->prepare($query);
    $query->execute();
    $users = $query->fetchAll(PDO::FETCH_DEFAULT);
    return $users;
}



function update_user($pdo, $query, $data){
    $query = $pdo->prepare($query);
    $query->execute($data);
}

function get_user($pdo, $query, $data){
    $query = $pdo->prepare($query);
    $query->execute($data);
    $current_user = $query->fetch(PDO::FETCH_ASSOC);
    return $current_user;
}

function delete_user($pdo, $query, $data){
    $query = $pdo->prepare($query);
    $query->execute($data);
}
?>