<?php
require_once '../db.php';
require_once '../functions.php';

if (!empty($_POST)) {
    $name = request('name');
    $description = request('description');

    if (empty($name) || empty($description)) {
        setError("Input fleids are empty!");
        redirect('add.php');
    }
    if (where('categories', 'name', '=', $name)) {
        setError("This Bike Category is already registered!");
        redirect('add.php');
    }

    create('categories', compact('name', 'description'));
    setSuccess("Category added Successfully!");
    redirect('add.php');
}
