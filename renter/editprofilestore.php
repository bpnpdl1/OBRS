<?php
$title = 'Edit Profile';
require_once '../admin/db.php';
require_once '../admin/functions.php';
$user_id = $_SESSION['user_id'];

$profile=request('profile');
$password=request('password');
if (!empty($profile)) {
    $name = request('name');
    $email = request('email');
    $dob = request('dob');
    $address = request('address');
    $citizenship_number = request('citizenship_number');
    $license_number = request('license_number');
echo 'sjsak';

    if (!preg_match("/^[a-zA-Z\s]+$/", $name)) {
        setError("Do not enter numeric and Special Characters in the name field");
        redirect('editprofile.php');
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        setError("Please provide an valid email!");
        redirect('editprofile.php');
    }

    $usql = "SELECT*FROM users WHERE id!=$user_id AND email='$email'";
    $users = query($usql);
    if (!empty($users)) {
        setError("This email is already registered!");
        redirect('editprofile.php');
    }
    if(!preg_match("/[0-9]{2}-[0-9]{2}-[0-9]{2,8}/",$license_number)){

        setError('license number format is invalid');
        redirect('editprofile.php');
    }


    update('users', $user_id, compact('name', 'email', 'dob', 'address', 'citizenship_number', 'license_number'));
    setSuccess("Your Profile is Successfully Updated!");
    redirect('editprofile.php');
}

if (!empty($password)) {
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $cnew_password = $_POST['cnew_password'];
    $user=find('users',$user_id);

    if (empty($old_password) || empty($new_password) || empty($cnew_password)) {
        setError('Password input fields are empty');
        redirect('editprofile.php');
    }
    if (strlen($old_password) < 8 || strlen($new_password) < 8  || strlen($cnew_password) < 8) {
        setError("Password must be 8 characters or more!");
        redirect('editprofile.php');
    }
    if ($new_password != $cnew_password) {
        setError('New password and Confirm Password are not matching');
        redirect('editprofile.php');
    }
    if (password_verify($old_password, $user['password'])) {
        $password = password_hash($new_password, PASSWORD_DEFAULT);

        $csql = "UPDATE users SET password='$password' WHERE id=$user_id";
        query($csql);
        setSuccess('Password Successfully!');
        redirect('editprofile.php');
    }
    else{
        setError('Old Password isn t matching');
        redirect('editprofile.php');
    }

   
}
