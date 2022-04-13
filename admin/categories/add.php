<?php
require_once '../db.php';
require_once '../functions.php';
$title = "Add Category";



require_once '../top.php';
require_once '../header.php'

?>
<?php if(hasError()){ ?>
<div class="alert alert-danger mx-3 border rounded"><?php echo getError(); ?></div>
<?php }
if(hasSuccess()){?>
<div class="alert-success mx-3 border rounded"><?php echo getSuccess();?></div>
<?php }?>

        <div class="category m-5">
            <div class="d-flex justify-content-between">
                <h3>Add Category Form</h3>
                <a href="index.php">Go back</a>
            </div>
            <form action="store.php" class="form" method="POST">
                <div class="form-group">
                    <label for="name" class="form-label">Enter Category name</label>
                    <input type="text" id="name" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="description" class="form-label">Enter a Description</label>
                    <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                </div>

                <div class="btn d-flex justify-content-end mr-5">
                    <input type="submit" value="Add Category" class="btn btn-dark">
                </div>

            </form>
        </div>

        <?php

        require_once '../footer.php';
        ?>