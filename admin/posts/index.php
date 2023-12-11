<?php
    require_once('posts.php');
	session_start();
    if($_SESSION["role"] != 1) die("You are not permitted here!");
    $posts = view_all_posts($pdo, 'SELECT * FROM posts');
    

    $index = 1;
    foreach ($posts as $forumPost) {

        ?>
            <div class="col-lg-3 col-sm-6">
                    <div class="team-box mt-4 position-relative overflow-hidden rounded text-center shadow">
                        <div class="p-4"><?php
                        echo '<div class="p-4">';
                        echo '<h5 class="font-size-19 mb-1">' . '<a href="detail.php?id='.$forumPost['Post_ID'].'">' . $forumPost['Title'] . '</a>' . '</h5>';
                        echo '</div>';
                        ?></div>
                    </div>
                </div>
            <?php
			$_SESSION["Post_ID"] = $forumPost['Post_ID'];
        $index++;
    }
	echo '<a href="create.php"> <input type="submit" value="Create"/></a>';
	
?>