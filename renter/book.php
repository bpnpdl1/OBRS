<?php
$renterurl = "http://localhost/Online_Bike_Rental_System/renter";
require_once '../admin/db.php';
require_once '../admin/functions.php';
$title = 'Rent a Bike';
$url = "http://localhost/Online_Bike_Rental_System/uploads/";
require_once 'header.php';

$id = request('id');
$_SESSION['bike_id'] = $id;

if (hasError()) {
    if (empty($id)) {
        $id = $_SESSION['bike_id'];
    }
}
if (empty($id)) {
    die('Bike Id is Empty');
}




$bike = find('bikes', $id);
$image = where('bike_images', 'bike_id', '=', $id);
$category = find('categories', $bike['category_id']);
$owner = find('users', $bike['user_id']);
$city=find('cities',$bike['city_id']);
$rsql="SELECT*FROM rent WHERE bike_id=$id ORDER BY from_date DESC";
$rents=query($rsql);




if (empty($owner)) {
    echo " ";
} else {
    $_SESSION['owner_id'] = $owner['id'];
    $_SESSION['ownername'] = $owner['name'];
}

$_SESSION['bike_id'] = $id;
$date = date('Y-m-d');
?>
<?php if (hasError()) { ?>
    <div class="alert alert-danger mx-5"><?php echo getError(); ?></div>
<?php } ?>
<?php if (hasSuccess()) { ?>
    <div class="alert alert-success mx-5"><?php echo getSuccess(); ?></div>
<?php } ?>
<div id="bikename">
    <h1 class="text-center m-4 text-h1"><?php echo $bike['name']; ?></h1>
</div>
<div class="container bg-gray p-4 shadow d-flex justify-content-center">
    <div class="row ">
        <div class="col-4" >
            <img src="<?php echo $url . $image[0]['images'];
                        $_SESSION['bike_image'] = $url . $image[0]['images'];
                        ?>" alt="<?php echo $bike['name']; ?>" style="width: 350px; object-fit: cover; padding: 15px; ">
            <h5 class="text-h4 text-center"><b>Price:</b> <?php echo $bike['price']; ?> per day</h5>
        </div>
        <div class="col-4 d-flex align-items-center">
            <ul class="list-group" style="font-size: large ;">
                <li class="list-group-item">Category: <?php if (!empty($category)) {
                                                            echo $category['name'];
                                                        } else {
                                                            echo 'Normal';
                                                        } ?></li>
                <li class="list-group-item">cc: <?php echo $bike['cc']; ?></li>
                <li class="list-group-item">Number Plate: <?php echo $bike['number_plate']; ?></li>
                <li class="list-group-item">Owner Name: <?php if (!empty($owner)) {
                                                            echo $owner['name'];
                                                        } ?> </li>
            </ul>
        </div>
        <div class="col-4 d-flex align-items-center">
            <ul class="list-group" style="font-size: large ;">
              <li class="list-group-item"><b>Latest Rental Booked dates</b></li>
<?php 
$flag=0;
foreach($rents as $rent){
    $flag++; 
    $fromdate=date('M-d',strtotime($rent['from_date']));
    $todate=date('M-d',strtotime($rent['to_date']));
    ?>
    
    <li class="list-group-item"><?php echo "From ".$fromdate." To ".$todate  ?></li>

    <?php
if($flag==5){
    break;
}
}?>

            </ul>
        </div>
        <h3 class="text-center m-2">Additional Information</h3>
        <form action="store.php" method="post">
            <h4 for="Duration" class="form-label mx-3 mb-2">Duration</h4>
            <div class="form-group" style="display: flex;">
                <br>
                <div class="col mx-3"> <label class="form-label">From</label> <input type="date" name="fromdate" min="<?php echo date('Y-m-d'); ?>" max="<?php $update = date('Y-m-d', strtotime($date . ' + 10 day'));
                                                                                                                                                            echo $update;
                                                                                                                                                            ?>" class="form-control" id="d1"></div>
                <div class="col mx-3"> <label class="form-label">To</label> <input type="date" name="todate" min="<?php echo date('Y-m-d'); ?>" max="<?php echo date('Y-m-d', strtotime($date . ' + 2 months'));; ?>" class="form-control" id="d2"></div>
            </div>
            <h4 class="m-3">Bike Station on <?php echo $city['name'];?></h4>
           
            <input type="submit" class="btn btn-dark btn-lg mt-4 mx-3" value="Next" style="display: block; width:100%">
            <div id="div" style="display: none;">


            </div>
        </form>
    </div>

</div>
<h3 class="m-3 text-center">Reviews</h3>
<?php
require './review.php';
require 'footer.php';
?>
<script>
    var btn = document.getElementById('btninfo');
    var div = document.getElementById('div');
    var viewmore = document.getElementById('viewmore');
    var date = document.getElementById('date');
    var d1 = document.getElementById('d1').value;
    var d2 = document.getElementById('d2').value;

    function moreinfo() {
        if (div.style.display == 'none') {
            div.style.display = 'block';
            viewmore.innerHTML = 'Show Less';


        } else {
            div.style.display = 'none';
            viewmore.innerHTML = 'View more';
        }
    }
</script>