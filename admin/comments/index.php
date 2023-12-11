<?php
    require_once('comments.php');
	session_start();
    if($_SESSION["role"] != 1) die("You are not permitted here!");
    $comments = view_all_comments($pdo, 'SELECT * FROM comment');
    

    $index = 1;
    foreach ($comments as $forumComment) {

        ?>
            <div class="col-lg-3 col-sm-6">
                    <div class="team-box mt-4 position-relative overflow-hidden rounded text-center shadow">
                        <div class="p-4"><?php
                        echo '<div class="p-4">';
                        echo '<h5 class="font-size-19 mb-1">' . '<a href="detail.php?id='.$forumComment['Comment_ID'].'">' . $forumComment['Comment'] . '</a>' . '</h5>';
                        echo '</div>';
                        ?></div>
                    </div>
                </div>
            <?php
			$_SESSION["Comment_ID"] = $forumComment['Comment_ID'];
        $index++;
    }
	echo '<a href="create.php"> <input type="submit" value="Create"/></a>';
	
?>