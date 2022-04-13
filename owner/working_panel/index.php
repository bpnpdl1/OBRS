<?php
require_once '../../admin/db.php';
require_once '../../admin/functions.php';
$title = 'Working Panel';


$categories=all('categories');
$cities=all('cities');
$owner_id=$_SESSION['user_id'];
$sn=1;
$bikes=where('bikes','user_id','=',$_SESSION['user_id']);
require_once '../header.php';
$Sql = 'SELECT * FROM `rent` WHERE `owner_id`=' . $owner_id . ' AND `status`=1';
$rents = query($Sql);

$rsql = 'SELECT * FROM `rent` WHERE `owner_id`=' . $owner_id . ' AND `status`=2';
$renterbike = query($rsql);
?>
<section>
<div class="m-3">
    <h2 class="text-center">Working Panel</h2>
    <div class="d-flex justify-content-between">
        <h5 class="mx-4">Your Bikes</h5>
      <div class="d-flex justify-content-between">
      <a href="http://localhost/Online_Bike_Rental_System/owner/working_panel/renterdbike.php" class="px-2">Rentered Bike <sup style="text-decoration: none;"><?php echo count($renterbike);?></sup></a>
      <a href="http://localhost/Online_Bike_Rental_System/owner/working_panel/rentalrequest.php" class="px-2">Bike Rent Request <sup style="text-decoration: none;"><?php echo count($rents);?></sup></a>
        <a href="http://localhost/Online_Bike_Rental_System/owner/Bike_registration" class="px-2">Add Bikes </a>
      </div>
</div>
</div>
<div  class="d-flex justify-content-center mx-4">
<table class="table mx-4 ">
  <thead class="thead-light" style="background-color: #000000; color:#ffffff;">
    <tr>
      <th scope="col">SN</th>
      <th scope="col">Bike Name</th>
      <th scope="col">Number Plate</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php 
foreach($bikes as $bike){
    
    $rent=where('rent','owner_id','=',$owner_id,false);
    $renter=find('users',$rent['renter_id']);
    ?>
    <tr>
      <th scope="row"><?php echo $sn++;?></th>
      <td><?php echo $bike['name'];?></td>
      <td><?php echo $bike['number_plate'];?></td>
      <td><a href="">See more</a></td>
    </tr>
    <?php }?>
  </tbody>
</table>
</div>
        










</section>



<?php

require_once '../footer.php';

?>