<?php
	require_once('comments.php');
	session_start();
    $comments = view_all_comments($pdo, 'SELECT * FROM comment JOIN posts on comment.Post_ID=posts.Post_ID Join users on comment.User_ID=users.User_ID');
	$index = 1;
	$item = $_GET['id'];
	
	foreach ($comments as $forumComment) {
		if($_SESSION["role"] != 1 and $_SESSION["ID"] != $forumComment['User_ID']) die("You are not permitted here!");
		if($forumComment['Comment_ID'] == $item){
			?>
			
			<div class="col-lg-3 col-sm-6">
                    <div class="team-box mt-4 position-relative overflow-hidden rounded text-center shadow">
                        <div class="p-4"><?php
                        echo '<div class="p-4">';
						echo '<h5 class="font-size-19 mb-1">' ."Post Title: ". $forumComment['Title'] . '</h5>';
						echo '<h5 class="font-size-19 mb-1">' ."Comment ID: ". $forumComment['Comment_ID'] . '</h5>';
						echo '<h5 class="font-size-19 mb-1">' ."Username: ". $forumComment['Username'] . '</h5>';
						echo '<h5 class="font-size-19 mb-1">' ."Content: ". $forumComment['Comment'] . '</h5>';
						echo '<h5 class="font-size-19 mb-1">' . '<a href="edit.php?id='.$forumComment['Comment_ID'].'">' . 'Edit' . '</a>' . '</h5>';
						echo '<h5 class="font-size-19 mb-1">' . '<a href="delete.php?id='.$forumComment['Comment_ID'].'">' . 'Delete' . '</a>' . '</h5>';
                        echo '</div>';
                        ?></div>
                    </div>
                </div>
				<?php
		}
		$index ++;
	}


?>