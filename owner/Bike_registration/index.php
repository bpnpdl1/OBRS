<?php
require_once '../../admin/db.php';
require_once '../../admin/functions.php';
$title = 'Bike Owner';
$name = '';
$number_plate = '';
$cc = '';
$tax_expiry_date = '';
$city_id = '';
$category_id = '';

$categories=all('categories');
$cities=all('cities');
require_once '../header.php';
?>
<section>

    <?php if (hasError()) { ?>
        <div class="alert alert-danger alert-sm mx-4 text-center"><?php echo getError();

                                                                    $name = $_SESSION['bike_register_form']['name'];
                                                                    $number_plate = $_SESSION['bike_register_form']['number_plate'];
                                                                    $cc = $_SESSION['bike_register_form']['cc'];
                                                                    $tax_expiry_date = $_SESSION['bike_register_form']['tax_expiry_date'];
                                                                    $city_id = $_SESSION['bike_register_form']['city_id'];
                                                                    $category_id = $_SESSION['bike_register_form']['category_id'];

                                                                    ?></div>
    <?php } ?>
    <?php if (hasSuccess()) { ?>
        <div class="alert alert-success"><?php echo getSuccess(); ?></div>
    <?php } ?>

    <div class="d-flex justify-content-center mt-4">
        <form action="validations.php" class="form shadow p-3" method="POST" enctype="multipart/form-data">
            <h2 class="text-center m-3 bg-dark text-light rounded p-3">Bike registration form</h2>
            <div class="row">
                <div class="form-group col-6">
                    <label for="name" class="form-label">Enter Bike Name</label>
                    <input type="text" name="name" id="name" class="form-control" value=<?php echo $name; ?>>
                </div>
                <div class="form-group col-6">
                    <label for="number_plate" class="form-label">Enter the Number Plate</label>
                    <input type="text" name="number_plate" id="number_plate" class="form-control" value=<?php echo $number_plate; ?>>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-6">
                    <label for="cc">Enter Your Bike cc</label>
                    <input type="text" id="cc" name="cc" class="form-control" value=<?php echo $cc; ?>>
                </div>

                <div class="form-group col-6">
                    <label for="tax_expiry_date" class="form-label">Select Tax Expiry Date</label>
                    <input type="date" id="tex_expiry_date" name="tax_expiry_date" class="form-control" value=<?php echo $tax_expiry_date; ?>>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-6">
                    <label for="category" class="form-label">Choose category</label>
                    <select name="category_id" id="category" class="form-control" value=<?php echo $category_id; ?>>
                        <option value="">Not Choosen</option>
                        <?php
                        foreach($categories as $category){?>
<option value="<?php echo $category['id'];?>"><?php echo $category['name'];?></option>
                        <?php }?>
                    </select>
                </div>
                <div class="form-group col-6">
                    <label for="city" class="form-label">Choose City</label>
                    <select name="city_id" id="city" class="form-control" class="form-control" value=<?php echo $city_id; ?>>
                        <option value="">Not Choosen</option>
                        <?php
                        foreach($cities as $city){?>
<option value="<?php echo $city['id'];?>"><?php echo $city['name'];?></option>
                        <?php }?>
                    </select>
                </div>

            </div>
            <div class="row">
                <div class="form-group col-6">
                    <label for="image" class="form-label">Upload Bike Image</label><br>
                    <input type="file" name="bike_image" id="image" class="form-control-file">
                </div>
                <div class="form-group col-6">
                    <label for="billbook" class="form-label">Upload Your Billbook</label>
                    <input type="file" id="billbook" name="billbook" class="form-control-file">
                </div>
            </div><br>
            <input type="submit" class="btn btn-dark" style="width: 100%; display:block">
        </form>
    </div>

</section>

<?php

require_once '../footer.php';

?>