<?php


if (empty($name) || empty($email) || empty($password) || empty($dob) || empty($cpassword) || empty($address) || empty($citizenship_number) || empty($license_number)) {
    setError("Please fill all the fields!");
    redirect('signup.php');

}
if(!preg_match("/^[a-zA-Z\s]+$/",$name)){
    setError("Do not enter numeric and Special Characters in the name field");
    redirect('signup.php');
}
if(!preg_match("/[0-9]{2}-[0-9]{2}-[0-9]{8}/",$license_number)){

    setError('license number format is invalid');
    redirect('signup.php');
}




if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    setError("Please provide an valid email!");
    redirect('signup.php');
}

$user = where('users', 'email', '=', $email, false);

if ($user) {
    setError("Email has already been taken!");
    redirect('signup.php');
}

if ($password != $cpassword) {
    setError("Password and Confirm Password do not match!");
    redirect('signup.php');
}

if (strlen($password) < 8) {
    setError("Password must be 8 characters or more!");
    redirect('signup.php');
}
$presentdate = date('Y-m-d');
if ($presentdate < $dob) {
    setError("Your date is Invalid");
    header('Location: signup.php');
    die;

}
$diff=((int)$presentdate-(int)$dob);
if($diff<18){
    setError("Your age is under 18.");
    redirect('signup.php');
}

