<?php
require_once '../admin/db.php';
require_once '../admin/functions.php';

$title = 'View Rent';
$renter_id = $_SESSION['user_id'];

$rents = query("SELECT*FROM rent WHERE renter_id=$renter_id AND status!=0 ORDER BY id DESC");

require_once 'header.php';
?>
<div class="m-4 d-flex justify-content-between">
    <div>
        <h2 class="mx-4">View Rent</h2>
    </div>
</div>
<div class="m-4 p-4">
    <ul class="list-group">
        <?php foreach ($rents as $rent) {
            $daydiff = dateDiffInDays($rent['to_date'], $rent['from_date']);
            $bike_images = where('bike_images', 'bike_id', '=', $rent['bike_id'], false);
            $bike = find('bikes', $rent['bike_id']);
            if ($rent['status'] == 1) {
                $status = 'Rent Request Pending';
            }
            if ($rent['status'] == 2) {
                $status = 'Rent Request Approved';
            }
            $owner = find('users', $rent['owner_id']);
        ?>
            <li class="list-group-item">
                <div class="d-flex justify-content-between row ">
                    <div class="col-4"><img src="../uploads/<?php echo $bike_images['images'] ?>" alt="" style="height:130px;width: 200px;  object-fit: cover;"></div>
                    <div class="col-4">
                        From Date: <?php echo date('d-M-Y', strtotime($rent['from_date'])); ?> <br>
                        To Date: <?php echo date('d-M-Y', strtotime($rent['to_date'])); ?> <br>
                        Total Price: Rs <?php echo $bike['price'] * $daydiff; ?> Only/-<br>
                        Status:<?php echo $status ?>

                    </div>
                    <div style="word-wrap: wrap;" class="col-4">

                    bike Name: <?php echo $bike['name'];?>  <br>
                    bike Number Plate: <?php echo $bike['number_plate'];?>  <br>
                        bike Owner Name: <?php echo $owner['name']; ?><br>
                        bike Owner Address: <?php echo $owner['address']; ?><br>
                        Bike Owner Email: <?php echo $owner['email']; ?>

                    </div>
                </div>
            </li>
        <?php } ?>
    </ul>
</div>