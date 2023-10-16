<?php

function latestPost() {
    // Read JSON file content
    $json_data = file_get_contents('.\\data\\posts.json');

    // Decode JSON data into PHP array
    $data = json_decode($json_data, true);
    
        // Get the last entry from the 'forum' array
        $latestPost = end($data['forum']);

        $username = $latestPost['username'];
        $title = $latestPost['title'];
        $post = $latestPost['post'];
        $date = $latestPost['date'];

        // HTML Output for the latest post
        ?>
        <div class="card mb-4">
            <a href="#!"><img class="card-img-top" src=".\\data\\rabbit.jpg" alt="Default image of a rabbit jumping! <3" /></a>
            <div class="card-body">
                <div class="small text-muted"><?php echo $date; ?></div>
                <h2 class="card-title h4"><?php echo $title; ?></h2>
                <p class="card-text"><?php echo $post; ?></p>
            </div>
        </div>
        <?php
}

function readPosts() {
    // Read JSON file content
    $json_data = file_get_contents('.\\data\\posts.json');

    // Decode JSON data into PHP array
    $data = json_decode($json_data, true);

    foreach ($data['forum'] as $forum) {
        $username = $forum['username'];
        $title = $forum['title'];
        $post = $forum['post'];
        $date = $forum['date'];

        // HTML Output for each post
        ?>
        <div class="card mb-4">
            <a href="#!"><img class="card-img-top" src=".\\data\\rabbit.jpg" alt="Default image of a rabbit jumping! <3" /></a>
            <div class="card-body">
                <div class="small text-muted"><?php echo $date; ?></div>
                <h2 class="card-title h4"><?php echo $title; ?></h2>
                <p class="card-text"><?php echo $post; ?></p>
            </div>
        </div>
        <?php
    }
}

function readComments() {
    // Read JSON file content
    $json_data = file_get_contents('.\\data\\comments.json');

    // Decode JSON data into PHP array
    $data = json_decode($json_data, true);

    // Loop through comments and print them line by line
    foreach ($data['comments'] as $comment) {
        $user = $comment['user'];
        $commentText = $comment['comment'];

        // HTML Output for each comment
        ?>
        <div class="card-body">
            <strong><?php echo $user; ?>:</strong> <?php echo $commentText; ?><br>
        </div>
        <?php
    }
}

?>