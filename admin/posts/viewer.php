<?php
	require_once('posts.php');
	session_start();
    $posts = view_all_posts($pdo, 'SELECT * FROM posts');
	$index = 1;
	$item = $_GET['id'];
    $comments = view_all_comments($pdo, 'SELECT * FROM comment JOIN posts ON comment.Post_ID=posts.Post_ID JOIN users ON users.User_ID=comment.User_ID');

	
	foreach ($posts as $forumPost) {
		if($forumPost['Post_ID'] == $item){
			?>
			
			<div class="col-lg-3 col-sm-6">
                    <div class="team-box mt-4 position-relative overflow-hidden rounded text-center shadow">
                        <div class="p-4"><?php
                        echo '<div class="p-4">';
						echo '<h5 class="font-size-19 mb-1">' . $forumPost['Title'] . '</h5>';
						echo '<h5 class="font-size-19 mb-1">' . $forumPost['Content'] . '</h5>';
						echo '</div>';
                        ?></div>
                    </div>
                </div>
				<?php
		}
	}

    foreach ($comments as $forumComment) {
		if($forumComment['Post_ID'] == $item){
			?>
			
			<div class="col-lg-3 col-sm-6">
                    <div class="team-box mt-4 position-relative overflow-hidden rounded text-center shadow">
                        <div class="p-4"><?php
                        echo '<div class="p-4">';
						echo '<h5 class="font-size-19 mb-1">' . $forumComment['Username'] . '</h5>';
						echo '<h5 class="font-size-19 mb-1">' . $forumComment['Comment'] . '</h5>';
						echo '</div>';
                        ?></div>
                    </div>
                </div>
				<?php
		}
	}

?>

<a href="https://www.example.com">
  <button>Click me</button>
</a>