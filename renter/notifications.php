<?php
require_once '../admin/db.php';
require_once '../admin/functions.php';
$title = 'Notifications';
$renter_id = $_SESSION['user_id'];
$usql="UPDATE notifications SET seen='seen' WHERE owner_id=$renter_id ";
query($usql);




$sql = "SELECT*FROM notifications WHERE renter_id=$renter_id AND seen='seen'  ORDER BY id DESC";

$notications = query($sql);


require_once 'header.php';

?>

<div class="m-4 d-flex justify-content-between">
    <div>
        <h2 class="mx-4">Notifications</h2>
    </div>
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
                <li class="list-group-item"><div class="d-flex justify-content-between ">
                <label><?php echo $notification['text']; ?></label>
                <small class="text-info"><?php echo $notification['seen']; ?></small>
                </div>
            </li>

        <?php }
        } ?>


    </ul>
</div>