<?php
require_once '../db.php';
require_once '../functions.php';
$id = $_SESSION['id'];

if (!empty($_POST)) {

    if (!empty($_FILES['bike_image']['tmp_name'])) {
        $bikefile = $_FILES['bike_image']['tmp_name'];
        $biketype = mime_content_type($bikefile);
        $bikesize = $_FILES['bike_image']['size'];

        $images = ['image/png', 'image/jpeg'];

        if ($biketype != 'image/png' && $biketype != 'image/jpeg') {
            setError('Image type must be jpeg or png');
            redirect('edit.php?id=' . $id);
        }
        // MB size validation
        $bikemb_size = $bikesize / 1024 / 1024;
        if ($bikemb_size > 5) {
            setError('Your image size be must less than 5 mb.');
            redirect('edit.php?id=' . $id);
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
        $images = $bike_file_name;
    }

    if (!empty($_FILES['billbook']['tmp_name'])) {

        $billbook_file = $_FILES['billbook']['tmp_name'];

        $billbook_type = mime_content_type($billbook_file);
        $billbook_size = $_FILES['billbook']['size'];


        if ($billbook_type != 'application/pdf') {
            setError('Bill book must be in pdf format');
            redirect('edit.php?id=' . $id);
        }
        // MB size validation
        $billbookmb_size = $billbook_size / 1024 / 1024;
        if ($billbookmb_size > 10) {
            setError('Your billbook pdf size must be less than 10 mb.');
            redirect('edit.php?id=' . $id);
        }
        $ext = ".pdf";
        $billbook_file_name = uniqid() . $ext;
        move_uploaded_file($billbook_file, "../../uploads/$billbook_file_name");
        $billbook = $billbook_file_name;
    }
}

$name = request('name');
$number_plate = request('number_plate');
$cc = request('cc');
$tax_expiry_date = request('tax_expiry_date');
$city_id = request('city_id');
$category_id = request('category_id');
$user_id = request('user_id');
$price = request('price');

$bikesimage=where('bike_images','bike_id','=',$id);
$bikesimage=$bikesimage[0];


update('bikes', $id, compact('name', 'number_plate', 'cc', 'tax_expiry_date', 'user_id', 'category_id', 'price'));
if (!empty($images)) {
    update('bike_images', $bikesimage['id'], compact('images'));
}
if (!empty($billbook)) {
    update('bikes', $id, compact('billbook'));
}

setSuccess('Successfully Edited !');
redirect('edit.php?id=' . $id);
