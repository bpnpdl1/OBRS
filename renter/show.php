<?php
$title="Show Bikes";
require_once '../admin/db.php';
require_once '../admin/functions.php';
require_once './header.php';

if(empty($_POST['city_id'])){
  echo '<div class="p-4">Please Go back and select the city.</div>';
  die;
}
if(!empty($_POST['type_id'])){
$categorysql=" AND category_id=". $_POST['type_id'];
}
else{
  $categorysql="";
}
$sql="SELECT * FROM bikes WHERE status=0 AND city_id=".$_POST['city_id'].$categorysql;

    $bikes = query($sql);

?>
<br>
<h1  class=" px-5">Bike Details</h1>
<?php if(empty($bikes)){ ?>
<div class="row d-flex justify-content-center align-items-center px-5" style="height:100px">
<h4>No Bikes are Found in this City</h4>
</div>
<?php
die;
}?>

<div class="row d-flex justify-content-start align-items-center px-5" >
    <?php
    
    foreach ($bikes as $bike) {
    ?>
      <div class="col-3"><?php require '../card.php'; ?>

      </div>
    <?php } ?>
  </div>