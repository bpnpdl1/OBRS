<?php $title="Delete";
 require_once '../db.php';
 require_once '../functions.php';
$id=request('id');
if(empty($id)){
die('Smonething went wrong');
}


 delete('categories',$id);
 setSuccess('Category is Successfully Deleted');
 redirect('index.php');






