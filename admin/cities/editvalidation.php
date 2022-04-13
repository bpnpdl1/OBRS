<?php
require_once '../db.php';
require_once '../functions.php';
$id = $_SESSION['id_city'];
$name = request('name');
$longtitude = request('longtitude');
$latitude = request('latitude');
if (!empty($_POST)) {
    if (empty($name) || empty($longtitude) || empty($latitude)) {
        setError("Input fleids are empty!");
        redirect('edit.php?id=' . $id);
    }

    update('cities', $id, compact('name', 'longtitude', 'latitide'));
    setSuccess("City added Edited Successfully!");
    redirect('edit.php?id=' . $id);
}
