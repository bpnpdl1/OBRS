<?php

function redirect($url)
{
    header("Location: $url");
    die;
}

function setSuccess($text)
{
    $_SESSION['success'] = $text;
}

function hasSuccess()
{
    return !empty($_SESSION['success']);
}

function getSuccess()
{
    $msg = $_SESSION['success'] ?? '';
    unset($_SESSION['success']);
    return $msg;
}

function setError($error)
{
    $_SESSION['error'] = $error;
}

function hasError()
{
    return !empty($_SESSION['error']);
}

function getError()
{
    $err = $_SESSION['error'] ?? '';
    unset($_SESSION['error']);

    return $err;
}

function is_admin()
{

    $user = user();

    if (empty($user)) {
        return false;
    }

    if ($user['role'] != "admin") {
        return false;
    }

    return true;
}

function check_admin()
{
    if (!is_admin()) {
        die("You do not have permission to view this page!");
    }
}


function is_renter()
{

    $user = user();

    if (empty($user)) {
        return false;
    }

    if ($user['role'] != "renter") {
        return false;
    }

    return true;
}

function check_renter()
{
    if (!is_renter()) {
        setError('Please Login to be Renter');
        redirect('http://localhost/Online_Bike_Rental_System/signin.php');
    }
}


function is_owner()
{

    $user = user();

    if (empty($user)) {
        return false;
    }

    if ($user['role'] != "owner") {
        return false;
    }

    return true;
}

function check_owner()
{
    if (!is_owner()) {
        setError('Please Sign in  As bike Owner to procced');
        redirect('http://localhost/Online_Bike_Rental_System/signin.php');
    }
}
function dateDiffInDays($date1, $date2)
{
    // Calculating the difference in timestamps
    $diff = strtotime($date2) - strtotime($date1);

    // 1 day = 24 hours
    // 24 * 60 * 60 = 86400 seconds
    return abs(round($diff / 86400));
}



