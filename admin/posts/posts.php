<?php
$host='localhost';
$db='gaming_forum';
$user='root';
$pass='';
$charset='utf8';
$dsn="mysql:host=$host;dbname=$db;charset=$charset";
$pdo = new PDO($dsn, $user, $pass);

function create_post($pdo, $query, $data){
    $query=$pdo->prepare($query);
    $query->execute($data);
}

Function view_all_posts($pdo, $query){
    $query=$pdo->prepare($query);
    $query->execute();
    $posts = $query->fetchAll(PDO::FETCH_DEFAULT);
    return $posts;
}

Function view_all_comments($pdo, $query){
    $query=$pdo->prepare($query);
    $query->execute();
    $posts = $query->fetchAll(PDO::FETCH_DEFAULT);
    return $posts;
}

function update_post($pdo, $query, $data){
    $query = $pdo->prepare($query);
    $query->execute($data);
}

function get_post($pdo, $query, $data){
    $query = $pdo->prepare($query);
    $query->execute($data);
    $current_post = $query->fetch(PDO::FETCH_ASSOC);
    return $current_post;
}

function delete_post($pdo, $query, $data){
    $query = $pdo->prepare($query);
    $query->execute($data);
}
?>

