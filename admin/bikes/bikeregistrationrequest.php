<?php $title = "Pending Bike Request";
require_once '../db.php';
require_once '../functions.php';
require "../top.php";
require "../header.php";
?>
<div class="container">
  <div class="row d-flex justify-content-between">
    <h2>Pending Bike Registration Details</h2>
   <div class="mx-3">
   <a href="index.php" class="mx-3">Go back</a>
 
   
   </div>
  </div>

<table class="table table-hover">
<thead>
  <tr>
    <th scope="col">S\N</th>
    <th scope="col">Name</th>
    <th scope="col">Number plate</th>
    <th scope="col">Other Informations</th>
  </tr>
</thead>
<tbody>
  <?php
  $count = 1;
  $bikes =where('bikes','approve','=','not approved');
  foreach ($bikes as $bike) { ?>
    <tr>
      <th scope="row"><?php echo $count++; ?></th>
      <td><?php echo $bike['name']; ?></td>
      <td><?php echo $bike['number_plate']; ?></td>
      <td><a href="show.php?id=<?php echo $bike['id']; ?>">See details</a></td>
    </tr>
  <?php } ?>
</tbody>
</table>




</div>


<?php
require "../footer.php";
?>