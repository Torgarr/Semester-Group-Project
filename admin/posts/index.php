<?php
	session_start();
	$file = __DIR__ . '\\..\\..\\data\\posts.json';
    $content = file_get_contents($file);

    $php_array = json_decode($content, true);


    $index = 1;
    foreach ($php_array['forum'] as $forumPost) {

        ?>
            <div class="col-lg-3 col-sm-6">
                    <div class="team-box mt-4 position-relative overflow-hidden rounded text-center shadow">
                        <div class="p-4"><?php
                        echo '<div class="p-4">';
                        echo '<h5 class="font-size-19 mb-1">' . '<a href="detail.php?id='.$index.'">' . $forumPost['username'] . '</a>' . '</h5>';
                        echo '</div>';
                        ?></div>
                    </div>
                </div>
            <?php
			$_SESSION["name"] = $forumPost['username'];
        $index++;
    }
	echo '<a href="create.php"> <input type="submit" value="Create"/></a>';
	
?>