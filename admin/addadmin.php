<?php
require_once './db.php';
require_once './functions.php';
$title = "Add Admin";
require 'top.php';
require 'header.php';



?>
<?php if (hasError()) { ?>
    <div class="alert alert-danger mx-4 text-center">
        <?php echo getError(); ?>
    </div>
<?php } ?>

<?php if (hasSuccess()) { ?>
    <div class="alert alert-success mx-4 text-center">
        <?php echo getSuccess(); ?>
    </div>
<?php } ?>
<!-- Modal -->
<form action="adminvalidation.php" class="form" method="POST">

    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #000000;">
                <h5 class="modal-title" id="exampleModalLongTitle" style="color: #fff;">Add Admin</h5>

                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col">
                        <label for="name" class="form-label">Enter Name</label>
                        <input type="text" id="name" class="form-control" name="name">
                    </div>
                    <div class="form-group col">
                        <label for="email" class="form-label">Enter email</label>
                        <input type="text" id="email" class="form-control" name="email">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <label for="password" class="form-label">Enter password</label>
                        <input type="text" id="password" class="form-control" name="password">
                    </div>
                    <div class="form-group col">
                        <label for="cpassword" class="form-label">Enter Confirm Password</label>
                        <input type="text" id="cpassword" class="form-control" name="cpassword">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <label for="dob" class="form-label">Enter Date of birth</label>
                        <input type="date" id="dob" class="form-control" name="dob" max="<?php echo date('Y-m-d'); ?>">
                    </div>
                    <div class="form-group col">
                        <label for="address" class="form-label">Enter Address</label>
                        <input type="text" id="address" class="form-control" name="address">
                    </div>
                </div>
            </div>

            <button type="submit" class="btn m-3" name="btnaddadmin" style="background-color:#000000;color:#fff;">Add Admin</button>

        </div>
    </div>

</form>

<?php require 'footer.php'; ?>