<?php
require 'db.php';
$title = "Edit Details";
require 'top.php';
require 'header.php';

$id = request('id');
// require '../file_handing.php';
$user = find('users', $id);

$name = $user['name'];
$email = $user['email'];
$dob = $user['dob'];
$address = $user['address'];
$citizenship_number = $user['citizenship_number'];
$license_number = $user['license_number'];
$personal_image = $user['personal_image'];


if (!empty($_POST['btnedit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $citizenship_number = $_POST['citizenship_number'];
    $license_number = $_POST['license_number'];
    $user = update('users', $id, compact('name', 'email', 'dob', 'address', 'citizenship_number', 'license_number'));
    die("data updated");
}

?>

<form action="edit.php?id=<?php echo $user['id']; ?>" class="form container shadow p-4" style="width: 90%;" method="POST" enctype="multipart/form-data">
    <legend style="background-color: #000000; color:#ffffff;" class="p-2 text-center">Edit <?php echo $name; ?> details.</legend>
    <div class="row d-flex justify-content-center"><img src="../uploads/<?php echo $user['personal_image']; ?>" style="width: 200px; height:200px;" class="border border-dark rounded" alt=""></div>
    <div class="row ">

        <div class="col"><label for="name" class="form-label">Name</label><input type="text" name="name" class="form-control" value="<?php echo $name; ?>"></div>
        <div class="col"><label for="email" class="form-label">email</label><input type="text" name="email" class="form-control" value="<?php echo $email; ?>"></div>

    </div>
    <div class="row">
        <div class="col"><label for="address" class="form-label">address</label><input type="text" name="address" class="form-control" value="<?php echo $address; ?>"></div>
        <div class="col"><label for="dob" class="form-label">dob</label><input type="date" name="dob" class="form-control" value="<?php echo $dob; ?>"></div>

    </div>
    <div class="row">
        <div class="col"><label for="citizenship_number" class="form-label">citizenship_number</label><input type="text" name="citizenship_number" class="form-control" value="<?php echo $citizenship_number; ?>"></div>
        <div class="col"><label for="license_number" class="form-label">license_number</label><input type="text" name="license_number" class="form-control" value="<?php echo $license_number; ?>"></div>

    </div><br>
    <div class="row">
        <div class="col m-2"> <input type="file" name="personal_image" class="form-control-file" src="../uploads/<?php echo $personal_image; ?>"></div>
    </div>

    <div class="row"><input type="submit" name="btnedit" class="form-control text-center btn" style="background-color:#000000;color:#ffffff" value="Edit"></div>



</form>

<?php
require 'footer.php';
?>