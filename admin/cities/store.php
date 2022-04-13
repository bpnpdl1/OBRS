<?php
require_once '../db.php';
require_once '../functions.php';

$name = request('name');
$longtitude = request('longtitude');
$latitude = request('latitude');

if (!empty($_POST)) {


    if (empty($name) || empty($longtitude) || empty($latitude)) {
        setError("Input fleids are empty!");
        redirect('add.php');
    }
    if (where('cities', 'name', '=', $name)) {
        setError("This city is already registered!");
        redirect('add.php');
    }

    create('cities', compact('name', 'longtitude', 'latitude'));
    setSuccess("City added Successfully!");
    redirect('add.php');
}
