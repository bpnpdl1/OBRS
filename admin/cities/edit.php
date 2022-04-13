<?php $title = "City Edit";
require_once '../db.php';
require_once '../functions.php';
require "../top.php";
require "../header.php";
$id=request('id');
$_SESSION['id_city']=$id;

if(hasError()){
    if(empty($id)){
        $id=$_SESSION['id_city'];
    }
}


if(empty($id)){
    echo 'Something went Wrong';
    die;
}
$city=find('cities',$id);
$_SESSION['id_city']=$id;

?>


<?php if (hasError()) { ?>
    <div class="alert alert-danger mx-3 border rounded"><?php echo getError(); ?></div>
<?php }
if (hasSuccess()) { ?>
    <div class="alert-success mx-3 border rounded"><?php echo getSuccess(); ?></div>
<?php } ?>

<div class="category m-5">
    <div class="d-flex justify-content-between">
        <h3>Edit City Form</h3>
        <a href="index.php">Go back</a>
    </div>
    <form action="editvalidation.php" class="form" method="POST">
        <div class="form-group">
            <label for="name" class="form-label">City name</label>
            <input type="text" id="name" name="name" class="form-control" value="<?php echo $city['name'];?>">
        </div>
        <div class="form-group">
            <label for="longtitude" class="form-label">City Longtitude</label>
            <input type="text" id="longtitude" name="longtitude" class="form-control" value="<?php echo $city['longtitude'];?>">
        </div>
        <div class="form-group">
            <label for="latitude" class="form-label">City Latitude</label>
            <input type="text" id="latitude" name="latitude" class="form-control" value="<?php echo $city['latitude'];?>">
        </div>

        <div class="btn d-flex justify-content-end mr-5">
            <input type="submit" value="Edit City" class="btn btn-dark" name="btneddit">
        </div>

    </form>
</div>

<?php
require "../footer.php"


?>