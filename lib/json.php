<?php

function readJSON() {
    // Read JSON file content
    $json_data = file_get_contents('.\\data\\posts.json');

    // Decode JSON data into PHP array
    $data = json_decode($json_data, true);

    // Accessing values from the decoded JSON data
    $forum = $data['forum'][0];
    $username = $forum['username'];
    $title = $forum['title'];
    $post = $forum['post'];
    $date = $forum['date'];

    ?>
    <div class="card mb-4">
        <a href="#!"><img class="card-img-top" src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg" alt="..." /></a>
            <div class="card-body">
                <div class="small text-muted"><?php $date ?></div>
                <h2 class="card-title h4"><?php $title ?></h2>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla.</p>
                <a class="btn btn-primary" href="#!">Read more →</a>
            </div>
    </div>
    <?php

}

?>
