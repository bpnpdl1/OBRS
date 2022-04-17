<?php
//file type validation


$file = $_FILES['personal_image']['tmp_name'];

if (!empty($file)) {

   

    $type = mime_content_type($file);
    $size = $_FILES['personal_image']['size'];

    $images = ['image/png', 'image/jpeg'];

    if ($type != 'image/png' && $type != 'image/jpeg') {
        setError('Image type must be jpeg or png');
        redirect($redirecturl);
    }
    // MB size validation
    $mb_size = $size / 1024 / 1024;
    if ($mb_size > 5) {
        setError('Your image size be must less tha 5 mb.');
        redirect($redirecturl);
    }
    //Unquie name for photoes
    switch ($type) {
        case "image/png":
            $ext = ".png";
            break;
        case "image/jpeg":
            $ext = ".jpeg";
            break;
    }

    $file_name = uniqid() . $ext;
    move_uploaded_file($file, "../uploads/$file_name");
    $personal_image = $file_name;

    update('users', $id, compact('personal_image'));
}
