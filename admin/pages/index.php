<!-- index.php -->
<?php
require_once('pages.php');
?>
<table>
    <thead>
        <tr>
            <th>Title</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <!-- Loop through the pages and display them in rows -->
        <?php
        $i = 0;
        while ($i < getSize()) { ?>
            <tr>
                <td><?php echo getPageTitle($i); ?></td>
                <td>
                    <a href="detail.php?id=<?php echo $i; ?>">View</a>
                    <a href="edit.php?id=<?php echo $i; ?>">Edit</a>
                    <a href="delete.php?id=<?php echo $i; ?>">Delete</a>
                </td>
            </tr>
        <?php
            $i++;
        }; 
        ?>
    </tbody>
</table>


<a href="create.php">Create New Page</a>