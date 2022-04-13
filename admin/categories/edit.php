<?php $title="Edit Category";
require_once '../db.php';
require_once '../functions.php';

$id=request('id');

if(hasSuccess()){
    $id= $_SESSION['category_id'];
}

if(empty($id)){
    die('Something Went Wrong');
}
$category=find('categories',$id);
 require "../top.php";
 require "../header.php";
 $_SESSION['category_id']=$id;
 ?>



<?php if(hasError()){ ?>
<div class="alert alert-danger mx-3 border rounded"><?php echo getError(); ?></div>
<?php }
if(hasSuccess()){?>
<div class="alert-success mx-3 border rounded"><?php echo getSuccess();?></div>
<?php }?>

        <div class="category m-5">
            <div class="d-flex justify-content-between">
                <h3>Edit Category Form</h3>
                <a href="index.php">Go back</a>
            </div>
            <form action="editvalidation.php" class="form" method="POST">
                <div class="form-group">
                    <label for="name" class="form-label">Category name</label>
                    <input type="text" id="name" name="name" class="form-control" value="<?php echo $category['name'];?>" onclick="con">
                </div>
               
                <input type="hidden" name="id" value="<?php echo $id;?>">

                <div class="btn d-flex justify-content-end mr-5">
                    <input type="submit" value="Edit Category" class="btn btn-dark">
                </div>

            </form>
        </div>



<?php
 require "../footer.php"


?>