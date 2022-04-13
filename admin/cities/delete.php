<?php $title="Delete";
require_once '../db.php';
require_once '../functions.php';
$id=request('id');

if(empty($id)){
    die('Something went wrong');
}

delete('cities',$id);
setSuccess('Successfully Deleted!');
redirect('index.php');



?>