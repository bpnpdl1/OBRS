<?php $title = "Delete";
require_once '../db.php';
require_once '../functions.php';
$id = request('id');
if (empty($id)) {
    die('Something went wrong');
}
$bikes = where('bikes', 'category_id', '=', $id);
if (!empty($bikes)) {
    die('You can t delete this categories because there is bikes on this categories');
}


delete('categories', $id);
setSuccess('Category is Successfully Deleted');
redirect('index.php');
