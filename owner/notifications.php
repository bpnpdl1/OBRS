<?php
require_once '../admin/db.php';
require_once '../admin/functions.php';
$title = 'Notifications';
$owner_id = $_SESSION['user_id'];
$usql="UPDATE notifications SET seen='seen' WHERE owner_id=$owner_id ";
query($usql);




$sql = "SELECT*FROM notifications WHERE owner_id=$owner_id AND seen='seen'  ORDER BY id DESC";

$notications = query($sql);



require_once 'header.php';

?>

<div class="m-4 d-flex justify-content-between">
    <div>
        <h2 class="mx-4">Notifications</h2>
    </div>
    <div class="mr-4 pr-4"><a href="">Clear all</a></div>
</div>

<div class="m-4">
    <ul class="list-group">
        <?php if (empty($notications)) { ?>
            <h5 class="m-4">Notifications is empty</h5>
        <?php
        }
        ?>

        <?php
        if (!empty($notications)) {
            foreach ($notications as $notification) { ?>
                <li class="list-group-item"><?php echo $notification['text']; ?></li>

        <?php }
        } ?>


    </ul>
</div>