<?php
require_once '../../admin/db.php';
require_once '../../admin/functions.php';
$title = 'Bike Profile';

$breakbike_id = request('breakbike_id');
if (!empty($breakbike_id)) {
    $status = 1;
    update('bikes', $breakbike_id, compact('status'));
    redirect('bikeprofile.php?id=' . $breakbike_id);
}

$resumebike_id=request('resumebike_id');
if (!empty($resumebike_id)) {
    $status = 0;
    update('bikes', $resumebike_id, compact('status'));
    redirect('bikeprofile.php?id='. $resumebike_id);
}


$id = request('id');

$bike = find('bikes', $id);
$bike_images = where('bike_images', 'bike_id', '=', $id, false);
$category = find('categories', $bike['category_id']);
$city = find('cities', $bike['city_id']);

if ($bike['status'] == 0) {
    $status = 'Avaiable on rent';
}
if ($bike['status'] == 1) {
    $status = 'Unavaible on rent';
}
if ($bike['approve'] == 'approved') {
    $approve = "Approved By Admin";
} else {
    $approve = "Not yet Approved by Admin";
}
require_once '../header.php';
?>
<div class="m-4 p-4">
    <div class="d-flex justify-content-between">
        <h2>Bike Profile</h2>
       <div class="controlsbike">
       <a href="" onclick="removebike()"> Remove Bike</a>
        <?php if ($bike['status'] == 0) { ?>
            <a href="bikeprofile.php?breakbike_id=<?php echo $bike['id']; ?>" role="button"> Take a Break</a>
        <?php }
        if ($bike['status'] == 1) { ?>
            <a href="bikeprofile.php?resumebike_id=<?php echo $bike['id']; ?>" role="button"> Resume on Rent</a>
        <?php } ?>
       </div>
    </div>

    <div class="shadow m-3 p-4 row ">
        <div class="col-5">
            <img src="../../uploads/<?php echo $bike_images['images']; ?>" style="height:300px;object-fit: cover;">
        </div>
        <div class="col-7  d-flex align-items-center">
            <ul style="list-style: none;">
                <li>Bike Name: <?php echo $bike['name']; ?></li>
                <li>Bike Number Plate: <?php echo $bike['number_plate']; ?></li>
                <li>Bike cc: <?php echo $bike['cc']; ?> cc</li>
                <li>Bike Category: <?php echo $category['name']; ?></li>
                <li>Bike Rental Price: <?php echo $bike['price']; ?> per day</li>
                <li>Bike Status: <?php echo $status; ?></li>
                <li>Bike Station on: <?php echo $city['name']; ?></li>
                <li>Bike Tax Expiry Date: <?php echo date('d-M-Y', strtotime($bike['tax_expiry_date'])); ?></li>
                <li>Bill book :<a href="../../uploads/<?php echo $bike['billbook']; ?>" target="_blank"> View Bill Book</a></li>
                <li>Approve Status: <?php echo $approve; ?></li>
            </ul>
            <object data="" type="application/pdf"></object>
        </div>
    </div>



</div>
<script>
    function removebike(){
        if(confirm('Are you sure to remove this bike?')){
            
          
        }
    }
</script>