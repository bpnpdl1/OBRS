<?php
require '../db.php';
require '../functions.php';
$title = "Add bikes";
require '../top.php';
require '../header.php';




?>




<div class="row d-flex justify-content-between mx-4">
    <h1>Add Bike</h1>
    <a href="index.php">Go back</a>
</div>
<div class="alert">
    <p><?php echo getError(); ?></p>
</div>
<div>
    <form class="form m-3" action="index.php" enctype="multipart/form-data" method="post">
        <div class="form-group row">
            <!-- Bike name -->
            <div class="col">
                <label for="name" title="Your bike brand name" class="form-label">Enter Bike Name</label>
                <input type="text" id="bikename" name="name" class="form-control">
            </div>
            <div class="col">
                <label for="number_plate" class="form-label">Enter Number Plate</label>
                <input type="text" id="number_plate" name="number_plate" class="form-control">
            </div>
        </div>

        <div class="form-group row">
            <div class="col">
                <label for="cc" class="form-label">Enter bike cc</label>
                <input type="number" id="cc" class="form-control" name="cc" max=300 min=100>
            </div>
            <div class="col">
                <label for="city" class="form-label">Choose City</label>
                <select name="city_id" id="city" class="form-control">
                    <option value="">Not Choosen</option>
                    <?php
                    $cities=all('cities');
                    foreach($cities as $city){ ?>
<option value="<?php echo $city['id'];?>"><?php echo $city['name'];?></option>
                  <?php  } ?>
                </select>
            </div>
            <div class="col">
                <label for="taxexpirydate" class="form-label">Enter Tax Expiry date</label>
                <input type="date" id="tax_expiry_date" name="tax_expiry_date" class="form-control">
            </div>


        </div>
        <div class="form-group row">
            <div class="col">
                <label for="ownername" class="form-label">Choose Owner name</label>
                <select id="ownername" name="user_id" class="form-control">
                    <option value="">Not choosen</option>
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
                    <option value="">Not Choosen</option>
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
    <input type="number" class="form-control" id="price" name="price" min="150">
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
                <input type="submit" name="btnaddbike" class="form-control my-2 text-center btn" style="background-color:#000000;color:#ffffff" value="Add Bike">
            </div>
        </div>
</div>

</form>
</div>

<?php require '../footer.php'; ?>