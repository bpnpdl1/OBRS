<?php
require_once '../../admin/db.php';
require_once '../../admin/functions.php';
if (empty($_POST)) {
    die('Something Went wrong');
}
if (!empty($_POST)) {
    $name = request('name');
    $number_plate = request('number_plate');
    $cc = request('cc');
    $tax_expiry_date = request('tax_expiry_date');
    $city_id = request('city_id');
    $category_id = request('category_id');
 

    $_SESSION['bike_register_form'] = compact('name', 'number_plate', 'cc', 'tax_expiry_date', 'city_id', 'category_id');
}


if (empty($name) || empty($number_plate) || empty($cc) || empty($tax_expiry_date) || empty($city_id) || empty($category_id)) {
    setError('Please fill the all the fields');
    redirect('index.php');
}


//file type validation

if ($_FILES['bike_image']['error'] != 0) {
    setError("Please upload an image");
    redirect('index.php');
}
$bikefile = $_FILES['bike_image']['tmp_name'];



$biketype = mime_content_type($bikefile);
$bikesize = $_FILES['bike_image']['size'];

$images = ['image/png', 'image/jpeg'];

if ($biketype != 'image/png' && $biketype != 'image/jpeg') {
    setError('Image type must be jpeg or png');
    redirect('index.php');
}
// MB size validation
$bikemb_size = $bikesize / 1024 / 1024;
if ($bikemb_size > 5) {
    setError('Your image size be must less than 5 mb.');
    redirect('index.php');
}
//Unquie name for photoes
switch ($biketype) {
    case "image/png":
        $ext = ".png";
        break;
    case "image/jpeg":
        $ext = ".jpeg";
        break;
}

$bike_file_name = uniqid() . $ext;
move_uploaded_file($bikefile, "../../uploads/$bike_file_name");


if ($_FILES['billbook']['error'] != 0) {
    setError("Please upload a billbook pdf");
    redirect('index.php');
}
$billbook_file = $_FILES['billbook']['tmp_name'];

$billbook_type = mime_content_type($billbook_file);
$billbook_size = $_FILES['billbook']['size'];


if ($billbook_type != 'application/pdf') {
    setError('Bill book must be in pdf format');
    redirect('index.php');
}
// MB size validation
$billbookmb_size = $billbook_size / 1024 / 1024;
if ($billbookmb_size > 10) {
    setError('Your billbook pdf size must be less than 10 mb.');
    redirect('index.php');
}
$ext = ".pdf";
$billbook_file_name = uniqid() . $ext;
move_uploaded_file($billbook_file, "../../uploads/$billbook_file_name");

$billbook = $billbook_file_name;
$images = $bike_file_name;
$user_id=$_SESSION['user_id'];
$approve = 'not approved';

create('bikes', compact('name', 'number_plate', 'cc', 'tax_expiry_date', 'city_id', 'user_id', 'category_id', 'billbook','approve'));
$maxid = query('SELECT MAX(id) FROM bikes');
$bike_id = $maxid[0]["MAX(id)"];
$bike_id;
create('bike_images', compact('images', 'bike_id'));

setSuccess('Bike Registration Request Successfully Sended. Wait for the approval');
redirect('index.php');
