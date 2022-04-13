<?php
$title = 'Profile';
require_once '../admin/db.php';
require_once '../admin/functions.php';
require_once './header.php';

$user = find('users', $_SESSION['user_id']);
$sql="SELECT FROM rent WHERE renter_id=".$user['id'];

?>

<div class="d-flex justify-content-center">
    <div class="container shadow m-4">
        <div id="head">
            <div class="d-flex justify-content-end"><a href="editprofile.php" class="btn btn-dark btn-md text-light m-4" role="button">Edit Profile</a></div>
            <div class="title" style="margin-top: -5%;">
                <p class="h1 text-center">Profile</p>
                <p class="text-center" style="margin-top: -1.5%;">Bike Renter</p>
            </div>
        </div>
        <div id="body" class="d-flex justify-content-center align-items-center">
            <div id="image" class="d-flex  justify-content-center p-4">
                <img src="../uploads/<?php echo $user['personal_image']; ?>" alt="" class="border rounded" height="300px" style="object-fit:cover; padding:5px;">
            </div>
            <hr>
            <div>
                <p>Name: <?php echo $user['name'];?></p>
                <p>Email: <?php echo $user['email'];?></p>
                <p>Address: <?php echo $user['address'];?></p>
                <p>Date of Birth: <?php echo date('j-M-Y',strtotime($user['dob']));?></p>
                <p>Citizenship Number: <?php echo $user['citizenship_number'];?></p>
                <p>License Number: <?php echo $user['license_number'];?></p>
                <p>Post: <?php echo $user['role'];?></p>
                
            </div>
        </div>
    </div>
</div>

<?php require_once './footer.php'; ?>