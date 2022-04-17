<?php
$title = "Bikes";
require '../db.php';
require '../functions.php';

$pending_bikes=where('bikes','approve','=','not approved');


if (!empty($_POST['btnaddbike'])) {

  $name = request('name');
  $number_plate = request('number_plate');
  $cc = request('cc');
  $tax_expiry_date = request('tax_expiry_date');
  $city_id = request('city_id');
  $category_id = request('category_id');
  $user_id = request('user_id');
  $price = request('price');
  require './validations.php';
  $images = $bike_file_name;
  $billbook = $billbook_file_name;


  create('bikes', compact('name', 'number_plate', 'cc', 'tax_expiry_date', 'city_id', 'user_id', 'category_id', 'price', 'billbook'));
  $maxid = query('SELECT MAX(id) FROM bikes');
  $bike_id = $maxid[0]["MAX(id)"];
  $bike_id;
  create('bike_images', compact('images', 'bike_id'));
}


require "../top.php";
require "../header.php";
?>
<?php if(hasSuccess()){ ?>
<div class="alert alert-success m-3">
  <?php echo getSuccess();?>
</div>

  <?php }?>


<div class="container">
  <div class="row d-flex justify-content-between">
    <h1>Bike Details</h1>
   <div class="mx-3">
   <a href="addbike.php" class="mx-3">Add Bike</a>
    <a href="bikeregistrationrequest.php" >Pending bike request <sup class="badge rounded-pill bg-dark text-light"> <?php echo count($pending_bikes); ?></sup></a>
  
   </div>
  </div>

  <table class="table table-hover">
    <thead style="background-color: #000000;color:#ffffff">
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
      $bikes = all('bikes');
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
<script>
  function confirmdelete() {
    if (confirm('Are you sure to delete this data!')) {
      href.location("index.php");
    }
  }
</script>