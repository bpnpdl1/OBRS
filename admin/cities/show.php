<?php
require_once '../db.php';
require_once '../functions.php';

$title = "Show";
require "../top.php";
require "../header.php";
$id = request('id');

$city = find('cities', $id);


$bikes=where('bikes','city_id','=',$id);

?>
<div class="d-flex justify-content-between mx-4 px-3">
<h1>City Details</h1>
<div class="">
    <a href="edit.php?id=<?php echo $id; ?>" class="mx-3">Edit</a><a href="delete.php?id=<?php echo $id; ?>" class="mx-3"  onclick="confirmDelete(<?php echo $id; ?>)">Delete</a><a href="" class="mx-3">Go back</a>
</div>

</div>

<div class="d-flex m-5">
    <div>
        <p> City Name: <?php echo  $city['name']; ?></p>
        <p> Longtitude Name: <?php echo $city['longtitude']; ?></p>
        <p> Longtitude Name: <?php echo $city['latitude']; ?></p>
        
        <p><?php 
         echo 'Number of Bikes registered in this city :'.count($bikes)."<br>";
        foreach($bikes as $bike){
        if(empty($bike)){
            echo 'Not Bike Regisered yet in this City';
        }
        else{

           
            
                echo $bike['name']." ";
            }
        }
       

        
        ?></p>

    </div>
   

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