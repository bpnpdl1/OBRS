<?php
require_once '../admin/db.php';
require_once '../admin/functions.php';
$id = request('id');

echo $id;
delete('rent', $id);
setSuccess('Your Rent Cancel Successully');
redirect('index.php');


?>

