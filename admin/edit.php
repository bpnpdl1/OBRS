<?php
require 'db.php';
require_once 'functions.php';
$title = "Edit Details";


$id = request('id');

$user = find('users', $id);

$name = $user['name'];
$email = $user['email'];
$dob = $user['dob'];
$address = $user['address'];
$citizenship_number = $user['citizenship_number'];
$license_number = $user['license_number'];
$personal_image = $user['personal_image'];

$redirecturl = 'edit.php?id=' . $id;



if (!empty($_POST['btnedit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $citizenship_number = $_POST['citizenship_number'];
    $license_number = $_POST['license_number'];

    if (empty($name) || empty($email) || empty($dob) || empty($address) || empty($citizenship_number) || empty($license_number)) {
        setError("Please fill all the fields!");
        redirect($redirecturl);
    }
    if (!preg_match("/^[a-zA-Z\s]+$/", $name)) {
        setError("Do not enter numeric and Special Characters in the name field");
        redirect($redirecturl);
    }
    if (!preg_match("/[0-9]{2}-[0-9]{2}-[0-9]{8}/", $license_number)) {

        setError('license number format is invalid');
        redirect($redirecturl);
    }
 if(preg_match("/[A-z#$%&*()!%^+]+/",$citizenship_number)){
    setError('Do not enter alphabetic  or specials  characters in citizenship fields');
    redirect($redirecturl);
 }
    
   if(dateDiffInDays(date('Y-m-d'),$dob)<18){
    setError('Your Date is Invalid');
    redirect($redirecturl);
   }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        setError("Please provide an valid email!");
        redirect($redirecturl);
    }
    $store_emails = query("SELECT email FROM users WHERE id!=$id AND email='$email'");
    if (!empty($store_emails)) {
        setError("$email is already registered");
        redirect($redirecturl);
    }

    require_once 'filehandling.php';
    update('users', $id, compact('name', 'email', 'dob', 'address', 'citizenship_number', 'license_number'));

    setSuccess('Successfully Updated');
    redirect($redirecturl);
}
require 'top.php';
require 'header.php';

?>
<?php if (hasError()) { ?>
    <div class="alert alert-danger mx-4"><?php echo getError(); ?></div>
<?php }
if (hasSuccess()) { ?>
    <div class="alert alert-success mx-4"><?php echo getSuccess(); ?></div>
<?php } ?>


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