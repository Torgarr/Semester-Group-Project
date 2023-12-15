<?php
    require_once('users.php');
	session_start();
    $users = view_all_users($pdo, 'SELECT * FROM users');
    if($_SESSION["role"] != 1) die("You are not permitted here!");

    $index = 1;
    foreach ($users as $forumPost) {
        ?>
            <div class="col-lg-3 col-sm-6">
                    <div class="team-box mt-4 position-relative overflow-hidden rounded text-center shadow">
                        <div class="p-4"><?php
                        echo '<div class="p-4">';
                        echo '<h5 class="font-size-19 mb-1">' . '<a href="detail.php?id='.$forumPost['User_ID'].'">' . $forumPost['Email'] . '</a>' . '</h5>';
                        echo '</div>';
                        ?></div>
                    </div>
                </div>
            <?php
			$_SESSION["User_ID"] = $forumPost['User_ID'];
        $index++;
    }
	
	
?>
<a href="../../">Go Home</a></h5>