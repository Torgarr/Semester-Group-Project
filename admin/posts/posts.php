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

<!-- <div class="col-lg-3 col-sm-6">
                    <div class="team-box mt-4 position-relative overflow-hidden rounded text-center shadow">
                        <div class="p-4"><?php
                        // echo '<div class="p-4">';
                        // echo '<h5 class="font-size-19 mb-1">' . 'Welcome to the Team Page. Follow this link to manage teams:' . '</h5>';
						// echo '<h5 class="font-size-19 mb-1"> <a href="index.php"</a></h5>';
                        ?></div>
                    </div>
                </div> -->