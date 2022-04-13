<?php
require_once './db.php';
require_once './admin/functions.php';
if (!empty($_SESSION['user_id'])) {
  $user = find('users', $_SESSION['user_id']);
  if ($user['role'] == 'owner') {
    redirect('http://localhost/Online_Bike_Rental_System/owner/');
  }
  if ($user['role'] == 'renter') {
    redirect('http://localhost/Online_Bike_Rental_System/renter/');
  }
  if ($user['role'] == 'admin') {
    redirect('http://localhost/Online_Bike_Rental_System/admin/');
  }
}
$title = "OBRS";

require 'header.php'; ?>



<?php require 'home.php'; ?>
<br>
<h3 class="text-center">Latest bikes on <b>Rent</b></h3>
<div style="padding-left: 25px;">
  <div class="row d-flex justify-content-center align-items-center">
    <?php

    $bikes = where('bikes','approve','=','approved');

    // foreach ($bikes as $bike)
    for ($i = count($bikes) - 1; $i > count($bikes) - 5; $i--) {
      $bike = $bikes[$i];


    ?>

      <div class="col m-2"><?php require 'card.php'; ?>


      </div>
    <?php } ?>
  </div>
</div>

<br>


<br>

<?php require 'footer.php'; ?>