<?php
require_once './db.php';
require_once './functions.php';

if (!empty($_POST)) {
    $name = request('name');
    $password = password_hash(request('password'), PASSWORD_DEFAULT);
    $cpassword = request('cpassword');
    $dob = request('dob');
    $address = request('address');
    $role = 'admin';

        if (empty($name)||empty($password)||empty($cpassword)||empty($dob)||empty($address)||empty($role)) {
            setError('Please fill the all the fields');
            redirect('addadmin.php');
        }
    


    if (request('password') != $cpassword) {
        setError("Password and Confirm password are not matching");
        redirect('addadmin.php');
    }
    
    create('users', compact('name', 'password', 'dob', 'address', 'role'));
    setSuccess('New Admin ' . $name . ' is Successfully Added ');
    redirect('addadmin.php');
}


