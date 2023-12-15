<?php
	require_once('users.php');
	session_start();
    $posts = view_all_users($pdo, 'SELECT * FROM users');
	$index = 1;
	$item = $_GET['id'];
	if($_SESSION["role"] != 1 and $_SESSION["ID"] != $item) die("You are not permitted here!");
	
	foreach ($posts as $forumPost) {
		if($_SESSION['role'] == 1){
			if(($forumPost['User_ID'] == $item)){
				?>
				
				<div class="col-lg-3 col-sm-6">
						<div class="team-box mt-4 position-relative overflow-hidden rounded text-center shadow">
							<div class="p-4"><?php
							echo '<div class="p-4">';
							//echo '<h5 class="font-size-19 mb-1">' . $forumPost['username'] . '</h5>';
							echo '<h5 class="font-size-19 mb-1">' . $forumPost['User_ID'] . '</h5>';
							echo '<h5 class="font-size-19 mb-1">' . $forumPost['Email'] . '</h5>';
							echo '<h5 class="font-size-19 mb-1">' . '<a href="edit.php?id='.$forumPost['User_ID'].'">' . 'Edit' . '</a>' . '</h5>';
							echo '<h5 class="font-size-19 mb-1">' . '<a href="delete.php?id='.$forumPost['User_ID'].'">' . 'Delete' . '</a>' . '</h5>';
							echo '</div>';
							?></div>
						</div>
					</div>
					<?php
			}
			
		}
		else{
			if(($_SESSION['ID'] == $forumPost['User_ID'])){
				?>
				
				<div class="col-lg-3 col-sm-6">
						<div class="team-box mt-4 position-relative overflow-hidden rounded text-center shadow">
							<div class="p-4"><?php
							echo '<div class="p-4">';
							//echo '<h5 class="font-size-19 mb-1">' . $forumPost['username'] . '</h5>';
							echo '<h5 class="font-size-19 mb-1">' . $forumPost['User_ID'] . '</h5>';
							echo '<h5 class="font-size-19 mb-1">' . $forumPost['Email'] . '</h5>';
							echo '<h5 class="font-size-19 mb-1">' . '<a href="edit.php?id='.$forumPost['User_ID'].'">' . 'Edit' . '</a>' . '</h5>';
							echo '<h5 class="font-size-19 mb-1">' . '<a href="delete.php?id='.$forumPost['User_ID'].'">' . 'Delete' . '</a>' . '</h5>';
							echo '</div>';
							?></div>
						</div>
					</div>
					<?php
			}
		}
		$index++;
	}


?>
<a href="../../">Go Home</a></h5>
