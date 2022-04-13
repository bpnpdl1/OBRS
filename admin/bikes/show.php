<?php
require "../../db.php";

require_once '../functions.php';
$title = "Show";
require "../top.php";
require "../header.php";

$id = $_REQUEST['id'];

if (empty($id)) {
    die('Something went wrong');
}


$bike = find('bikes', $id);
$owner = where('users', 'role', '=', 'owner');

$user = find('users', $bike['user_id']);

if (empty($user)) {
    $user['name'] = "Not registered yet";
}

$bike_image = where('bike_images', 'bike_id', '=', $id);

$category = find('categories', $bike['category_id']);






?>

<div class="upperpart d-flex justify-content-between">
    <h1>Bike Details</h1>
    <div class="m-1 p-2 d-flex justify-content-between">
        <?php if ($bike['approve'] == 'not approved') { ?>
            <a href="approve.php?id=<?php echo $id; ?>">Approve Request</a>
        <?php } ?>
        <a href="edit.php?id=<?php echo $id; ?>" class="mx-3">Edit</a>
        <a href="delete.php?id=<?php echo $id; ?>" class="mx-3" onclick="confirmDelete(<?php echo $id; ?>)">Delete</a>
        <a href="index.php" class="mx-3">Go back</a>

    </div>
</div>

<?php if (hasSuccess()) { ?>
    <div class="alert alert-success mx-4 text-center">
        <?php echo getSuccess(); ?>
    </div>

<?php } ?>
<?php if (hasError()) { ?>
    <div class="alert alert-danger mx-4 text-center">
        <?php echo getError(); ?>
    </div>

<?php } ?>

<div class="row">
    <div class="col">
        <ul class="list-group ">
            <li class="list-group-item">Name: <?php echo $bike['name']; ?></li>
            <li class="list-group-item">Rent Price Per Day: <?php if($bike['price']==0){
                echo 'Rental Price is not setted yet';
            } 
            else{
                echo $bike['price'];
            }
            ?></li>
            <li class="list-group-item">Number_plate: <?php echo $bike['number_plate']; ?></li>
            <li class="list-group-item">cc: <?php echo $bike['cc']; ?></li>
            <li class="list-group-item">Bike owner: <?php echo $user['name']; ?></li>
            <li class="list-group-item">Category: <?php

                                                    if (empty($category)) {
                                                        echo "Not registered category";
                                                    } else {
                                                        echo $category['name'];
                                                    }

                                                    ?></li>
            <li class="list-group-item">Bill Book: <button class="btn btn-dark btn-sm" data-toggle="modal" data-target="#pdfbillbook">View it</button></li>
        </ul>
    </div>
    <div class="col ">
        <div class="d-flex justify-content-between">
            <h2>Images</h2>

        </div>


        <div class="images d-flex justify-content-center">

            <?php if (!empty($bike_image)) { ?>
                <img src="../../uploads/<?php echo $bike_image[0]['images']; ?>" style="width:45%">
            <?php } else { ?>
                <p>There is not images</p>
            <?php } ?>
        </div>
    </div>
</div>

<!-- Modal -->
<div id="pdfbillbook" class="modal fade" role="dialog" style="height: 100vh;">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4>Bill Book</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">
                <object data="../../uploads/<?php echo $bike['billbook']; ?>" type="application/pdf" style="width: 100%; height:400px"></object>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

<?php
require "../footer.php"


?>
<script>
    function confirmDelete(id) {
        if (confirm('Are you sure you want to delete this?')) {
            location.href = 'delete.php?id=' + id;
        }
    }
</script>