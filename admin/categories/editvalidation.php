<?php 



require_once '../db.php';
require_once '../functions.php';
$id=$_POST['id'];

$name=$_POST['name'];

if(empty($_POST['name'])){
setError('Category name cant be empty');
redirect('edit.php?id='.$id);
}

update('categories',$id,compact('name'));
setSuccess('Category is Successfully Edited');

redirect('edit.php?id='.$id);


?>