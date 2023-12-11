<?php

$host='localhost';
$db='gaming_forum';
$user='root';
$pass='';
$charset='utf8';
$dsn="mysql:host=$host;dbname=$db;charset=$charset";
$pdo = new PDO($dsn, $user, $pass);

function latestPost($pdo, $query) {
    $query=$pdo->prepare($query);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_DEFAULT);
    

        // HTML Output for the latest post
        ?>
        <div class="card mb-4">
            <a href="#!"><img class="card-img-top" src=".\\data\\rabbit.jpg" alt="Default image of a rabbit jumping! <3" /></a>
            <div class="card-body">
                <div class="small text-muted"><?php echo $result['Date_Created']; ?></div>
                <h2 class="card-title h4"><?php echo $result['Title']; ?></h2>
                <p class="card-text"><?php echo $result['Content']; ?></p>
            </div>
        </div>
        <?php
       
}

function readPosts($pdo, $query) {
    $query=$pdo->prepare($query);
    $query->execute();
    $result = $query->fetchALL(PDO::FETCH_DEFAULT);

    
    // HTML Output for each post
    foreach ($result as $forumPost) {
    ?>
    <div class="card mb-4">
        <a href="#!"><img class="card-img-top" src=".\\data\\rabbit.jpg" alt="Default image of a rabbit jumping! <3" /></a>
        <div class="card-body">
            <div class="small text-muted"><?php echo $forumPost['Date_Created']; ?></div>
            <h2 class="card-title h4"><?php echo $forumPost['Title']; ?></h2>
            <p class="card-text"><?php echo $forumPost['Content']; ?></p>
        </div>
    </div>
    <?php
    }
}

function readComments($pdo, $query) {
    $query=$pdo->prepare($query);
    $query->execute();
    $result = $query->fetchALL(PDO::FETCH_DEFAULT);

    

        // HTML Output for each comment
        foreach ($result as $forumPost) {
        ?>
        <div class="card-body">
            <strong><?php echo $forumPost['Username']; ?>:</strong> <?php echo $forumPost['Comment']; ?><br>
        </div>
        <?php
    }
}

?>