<?php
	require_once('posts.php');
	session_start();
    $posts = view_all_posts($pdo, 'SELECT * FROM posts');
	$index = 1;
	$item = $_GET['id'];
	
	foreach ($posts as $forumPost) {
		if($_SESSION["role"] != 1 and $_SESSION["ID"] != $forumPost['User_ID']) die("You are not permitted here!");
		if($forumPost['Post_ID'] == $item){
			?>
			
			<div class="col-lg-3 col-sm-6">
                    <div class="team-box mt-4 position-relative overflow-hidden rounded text-center shadow">
                        <div class="p-4"><?php
                        echo '<div class="p-4">';
						echo '<h5 class="font-size-19 mb-1">' . $forumPost['Title'] . '</h5>';
						echo '<h5 class="font-size-19 mb-1">' . $forumPost['Content'] . '</h5>';
						echo '<h5 class="font-size-19 mb-1">' . '<a href="edit.php?id='.$forumPost['Post_ID'].'">' . 'Edit' . '</a>' . '</h5>';
						echo '<h5 class="font-size-19 mb-1">' . '<a href="delete.php?id='.$forumPost['Post_ID'].'">' . 'Delete' . '</a>' . '</h5>';
                        echo '</div>';
                        ?></div>
                    </div>
                </div>
				<?php
		}
		$index ++;
	}


?>