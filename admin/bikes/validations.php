<?php


if (empty($name) || empty($number_plate) || empty($cc) || empty($tax_expiry_date) || empty($category_id) || empty($user_id)) {
    setError('Please fill the all the fields');
    redirect('addbike.php');
  }


//file type validation

if($_FILES['bike_image']['error']!=0){
    setError("Please upload an image");
    redirect('addbike.php');
}
$bikefile = $_FILES['bike_image']['tmp_name'];



$biketype = mime_content_type($bikefile);
$bikesize = $_FILES['bike_image']['size'];

$images = ['image/png', 'image/jpeg'];

if ($biketype != 'image/png' && $biketype != 'image/jpeg') {
    setError('Image type must be jpeg or png');
    redirect('addbike.php');
}
// MB size validation
$bikemb_size = $bikesize / 1024 / 1024;
if ($bikemb_size > 5) {
    setError('Your image size be must less than 5 mb.');
    redirect('addbike.php');
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

$bike_file_name=uniqid().$ext;
move_uploaded_file($bikefile,"../../uploads/$bike_file_name"); 


if($_FILES['billbook']['error']!=0){
    setError("Please upload a billbook pdf");
    redirect('addbike.php');
}
$billbook_file = $_FILES['billbook']['tmp_name'];

$billbook_type = mime_content_type($billbook_file);
$billbook_size = $_FILES['billbook']['size'];


if ($billbook_type != 'application/pdf') {
    setError('Bill book must be in pdf format');
    redirect('addbike.php');
}
// MB size validation
$billbookmb_size = $billbook_size / 1024 / 1024;
if ($billbookmb_size > 10) {
    setError('Your billbook pdf size must be less than 10 mb.');
    redirect('addbike.php');
}
   $ext=".pdf";
$billbook_file_name=uniqid().$ext;
move_uploaded_file($billbook_file,"../../uploads/$billbook_file_name");
