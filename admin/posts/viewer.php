<h1> Post: </h1>

<?php
	require_once('posts.php');
	session_start();
    $posts = view_all_posts($pdo, 'SELECT * FROM posts');
	$index = 1;
	$item = $_GET['id'];
    $comments = view_all_comments($pdo, 'SELECT * FROM comment JOIN posts ON comment.Post_ID=posts.Post_ID JOIN users ON users.User_ID=comment.User_ID');
	

	
	foreach ($posts as $forumPost) {
		if($forumPost['Post_ID'] == $item){
			$_SESSION["Post_ID"] = $forumPost['Post_ID'];
			?>
			
			<div class="card mb-4">
				<div class="card-body">
				<h2 class="card-title h4"><?php echo $forumPost['Title']; ?></h2>
				<p class="card-text"><?php echo $forumPost['Content']; ?></p>
        	</div>
			<?php
		}
	}

	?>
	
	<hr>
	<h2> Comments: </h2>
	
	<?php

    foreach ($comments as $forumComment) {
		if($forumComment['Post_ID'] == $item){
			?>

			<div class="card mb-2">
				<div class="card-body">
				<h4 class="card-title h4"><?php echo $forumComment['Username']; ?></h4>
				<p class="card-text"><?php echo $forumComment['Comment']; ?></p>
        	</div>
			<?php
		}
	}

?>

<hr><br>

<a href="../comments/create.php">
  <button>Comment</button>
</a>