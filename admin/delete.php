<?php
require 'db.php';
$id = request('id');

$name = request('name');

if (empty($id)) {
    die("Please provide ID");
}

$user = find('user', $id);
if (empty($user)) {
    die("User not found!");
}


delete('user', $id);

header("Location: index.php");