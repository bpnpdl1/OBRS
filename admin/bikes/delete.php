<?php
require_once '../db.php';
require_once '../functions.php';

$id = request('id');

if (empty($id)) {
    die("Please provide ID");
}
delete('bikes', $id);

setSuccess('Bike  deleted!');
redirect('index.php');
