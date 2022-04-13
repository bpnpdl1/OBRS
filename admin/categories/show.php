<?php $title="Show";
require_once '../db.php';
require_once '../functions.php';
 require "../top.php";
 require "../header.php";


$id=request('id');
if(empty($id)){
    die('Something Went Wrong');
}
$category=find('categories',$id);

$bikes=where('bikes','category_id','=',$id);


 ?>
 <?php if (hasError()) { ?>
    <div class="alert alert-danger mx-3 border rounded"><?php echo getError(); ?></div>
<?php }
if (hasSuccess()) { ?>
    <div class="alert-success mx-3 border rounded"><?php echo getSuccess(); ?></div>
<?php } ?>
<div class="d-flex justify-content-between px-4"><h3>Category Details </h3>

<div class="d-flex justify-content-center">
<a href="edit.php?id=<?php echo $id;?>" class="m-3">Edit</a>
<a href="delete.php?id=<?php echo $id;?>" class="m-3" onclick="confirmDelete(<?php echo $id; ?>)">Delete</a>
<a href="" class="m-3">Go Back</a>

</div></div>

<div class="px-4">
<p>Category Name:  <?php echo  $category['name'];?></p>
<p>Number of Bikes: <?php echo count($bikes);?> </p>
</div>




<?php
 require "../footer.php"


?>
<script>
    function confirmDelete(id) {
        if (confirm('Are you sure to delete this?')) {
            location.href = 'delete.php?id=' + id;
        }
    }
</script>