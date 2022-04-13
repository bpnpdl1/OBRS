<?php
require_once '../admin/db.php';
require_once '../admin/functions.php';

$title = 'Renter';
require_once 'header.php';

if(hasSuccess()){
?>
<script>alert('<?php echo getSuccess()?>')</script>

<?php } ?>


<div id="bgimagerenter" style="height: 400px;padding-left: 10%;display: flex;align-items:center">

<ul style="list-style: none; width:300px" class="bg-dark text-light p-3 ulrent">
  <li><big>Rent</big> Your favorite bike </li>
  <li><big>Ride</big> the bike</li>
  <li><big>Remember</big> us for next time</li>
</ul>

</div>


<!-- selection part -->
<?php require_once 'find.php'; ?>

<!-- selection part -->
<h2 class="text-center m-3">Lastest Bikes for <b>Rent</b></h2>
<div style="padding-left: 25px;">
  <div class="row d-flex justify-content-center align-items-center">
    <?php

    $bikes = where('bikes', 'approve', '=', 'approved');

    // foreach ($bikes as $bike)
    for ($i = count($bikes) - 1; $i > count($bikes) - 5; $i--) {
      $bike = $bikes[$i];


    ?>

      <div class="col m-2"><?php require '../card.php'; ?>


      </div>
    <?php } ?>
  </div>
</div>
<?php
require_once './footer.php';
?>