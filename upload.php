<?php
if (!empty($_FILES)) {
    if (is_uploaded_file($_FILES['userImage']['tmp_name'])) {
        $sourcePath = $_FILES['userImage']['tmp_name'];
        $targetPath = "file/" . $_FILES['userImage']['name'].'.uploaded';
        if (move_uploaded_file($sourcePath, $targetPath)) {
            ?>
            Successful
<!--            <img src="--><?php //echo $targetPath; ?><!--" width="100px" height="100px"/>-->
            <?php
        }
    }
}