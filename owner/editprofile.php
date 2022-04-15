<?php
$title = 'Edit Profile';
require_once '../admin/db.php';
require_once '../admin/functions.php';
require_once './header.php';
$user = find('users', $_SESSION['user_id']);







?>
<section class="m-4">
    <?php if (hasError()) { ?>
        <div class="alert alert-danger text-center"><?php echo getError(); ?></div>

    <?php } ?>
    <?php if (hasSuccess()) { ?>
        <div class="alert alert-success text-center"><?php echo getSuccess(); ?></div>

    <?php } ?>

    <div class="row">
        <div class="m-4 p-4 shadow rounded col-7">
            <h2 class="text-center">Edit Profile</h2>
            <form action="editprofilestore.php" method="post">
                <div class="form-group row">
                    <div class="col-6 form-group">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" value="<?php echo $user['name']; ?>" name="name">
                    </div>
                    <div class="col-6 form-group">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" value="<?php echo $user['email']; ?>" name="email">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-6 form-group">
                        <label for="dob" class="form-label">Date of Birth</label>
                        <input type="date" class="form-control" value="<?php echo $user['dob']; ?>" name="dob">
                    </div>
                    <div class="col-6 form-group">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" value="<?php echo $user['address']; ?>" name="address">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-4 form-group">
                        <label for="citizenship_number" class="form-label">Citizenship Numeber</label>
                        <input type="text" class="form-control" value="<?php echo $user['citizenship_number']; ?>" name="citizenship_number">
                    </div>
                    <div class="col-4 form-group">
                        <label for="license_number" class="form-label">License Number</label>
                        <input type="text" class="form-control" value="<?php echo $user['license_number']; ?>" name="license_number">
                    </div>
                    <div class="col-4 form-group">
                        <label for="personal_image" class="form-label" name="personal_image">Change Personal Image</label>
                        <input type="file" class="form-control-file" name="btnedit">
                    </div>
                </div>
                <input type="submit" class="btn btn-dark m-3" style="width: 100%;" name="btnchangeprofile">
            </form>



        </div>
        <div class="m-4 p-4 shadow rounded col-3">
            <h4 class="text-center">Change Password</h4>
            <form action="editprofilestore.php" method="POST">
                <div class="form-group">
                    <label for="oldpassword" class="form-label">Enter Your Old Password</label>
                    <input type="input" class="form-control" name="old_password">
                </div>
                <div class="form-group">
                    <label for="newpassword" class="form-label">Enter Your New Password</label>
                    <input type="input" class="form-control" name="new_password">
                </div>
                <div class="form-group">
                    <label for="cnewpassword" class="form-label">Enter Your New Password</label>
                    <input type="input" class="form-control" name="cnew_password">
                </div>
                <input type="submit" class="btn btn-dark mt-4" style="width:100%" name="btnchangepassword">
            </form>
        </div>
    </div>


</section>
<?php require_once 'footer.php'; ?>