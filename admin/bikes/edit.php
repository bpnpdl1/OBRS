<?php $title = "Edit";
require_once '../db.php';
require_once '../functions.php';
require "../top.php";
require "../header.php";

$id = request('id');
$_SESSION['id']=$id;
$bike = find('bikes', $id);

$categoryb=find('categories',$bike['category_id']);
$scity=find('cities',$bike['city_id']);
?>


<div class="row d-flex justify-content-between mx-4">
    <h1>Edit Bike Details </h1>
    <a href="show.php?id=<?php echo $id;?>">Go back</a>
</div>
<?php if(hasError()){?>
<div class="alert alert-danger">
    <p><?php echo getError(); ?></p>
</div>
<?php }?>
<div>
<?php if(hasSuccess()){?>
<div class="alert alert-success mx-4">
    <p><?php echo getSuccess(); ?></p>
</div>
<?php }?>
    <form class="form m-3" action="editvaldiation.php" enctype="multipart/form-data" method="post">
        <div class="form-group row">
            <!-- Bike name -->
            <div class="col">
                <label for="name" title="Your bike brand name" class="form-label">Enter Bike Name</label>
                <input type="text" id="bikename" name="name" class="form-control" value="<?php echo $bike['name']; ?>">
            </div>
            <div class="col">
                <label for="number_plate" class="form-label">Enter Number Plate</label>
                <input type="text" id="number_plate" name="number_plate" class="form-control" value="<?php echo $bike['number_plate']; ?>">
            </div>
        </div>

        <div class="form-group row">
            <div class="col">
                <label for="cc" class="form-label">Enter bike cc</label>
                <input type="number" id="cc" class="form-control" name="cc" max=300 min=100 value="<?php echo $bike['cc']; ?>">
            </div>
            <div class="col">
                <label for="city" class="form-label">City</label>
            <select name="city_id" id="city" class="form-control">
                    <option value="<?php echo $scity['id'];?>"><?php echo $scity['name'];?></option>
                    <?php
                    $cities=all('cities');
                    foreach($cities as $city){ ?>
<option value="<?php echo $city['id'];?>"><?php echo $city['name'];?></option>
                  <?php  } ?>
                </select>
            </div>
            <div class="col">
                <label for="taxexpirydate" class="form-label">Enter Tax Expiry date</label>
                <input type="date" id="tax_expiry_date" name="tax_expiry_date" class="form-control" min="<?php echo date('Y-m-d');?>" value="<?php echo $bike['tax_expiry_date']; ?>">
            </div>


        </div>
        <div class="form-group row">
            <div class="col">
                <label for="ownername" class="form-label">Choose Owner name</label>
                <select id="ownername" name="user_id" class="form-control">
                    <?php $bikeowner = find('users', $bike['user_id']);


                    ?>
                    <option value="<?php echo $bikeowner['id']; ?>">
                        <?php if (!empty($bikeowner)) {
                            echo $bikeowner['name'];
                        } ?>

                    </option>
                    <?php

                    $owners = where('users', 'role', '=', 'owner');
                    foreach ($owners as $owner) {
                    ?>
                        <option value="<?php echo $owner['id']; ?>"><?php echo $owner['name']; ?></option>
                    <?php } ?>
                </select>


            </div>
            <div class="col">
                <label for="category" class="form-label">Choose Bike Category</label>
                <select name="category_id" class="form-control" id="category_id">
                    <?php $bikecategory = find('categories', $bike['category_id']); ?>
                    <option value="<?php echo $categoryb['id']; ?>"><?php echo $categoryb['name'];?></option>
                    <?php
                    $categories = all('categories');
                    foreach ($categories as $category) { ?>
                        <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                    <?php } ?>
                    ?>
                </select>
            </div>
            <div class="col">
                <label for="price" class="form-label">Set Rent Price</label>
                <input type="number" class="form-control" id="price" name="price" min="150" value="<?php echo $bike['price']; ?>">
            </div>

        </div>
        <div class="form-group row">
            <div class="col">
                <label for="image" class="form-label">Upload Bike image</label>
                <input type="file" id="image" name="bike_image" class="form-control-file">
            </div>
            <div class="col">
                <label for="billbook" class="form-label">Upload Bill book scan copy</label>
                <input type="file" id="billbook" name="billbook" class="form-control-file">
            </div>

        </div>
        <div class="form-group">

            <div class="row">
                <input type="submit" name="btneditbike" class="form-control my-2 text-center btn" style="background-color:#000000;color:#ffffff" value="Add Bike">
            </div>
        </div>
</div>

</form>
</div>




<?php
require "../footer.php"


?>