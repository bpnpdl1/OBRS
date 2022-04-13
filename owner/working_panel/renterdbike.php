<?php
require_once '../../admin/db.php';
require_once '../../admin/functions.php';
$title = 'Working Panel';

$owner_id = $_SESSION['user_id'];

$Sql = 'SELECT * FROM `rent` WHERE `owner_id`=' . $owner_id . ' AND `status`=2';
$rents = query($Sql);
require_once '../header.php';

?>


<?php if (hasSuccess()) { ?>
    <div class="alert alert-success mx-4 my-1"><?php echo getSuccess(); ?></div>
<?php } ?>
<?php if (empty($rents)) { ?>
    <h5 class="text-center">No Bikes on rent</h5>
<?php
    die;
} ?>



<h3 class="text-center m-4">Rentered Bikes</h3>

<?php foreach ($rents as $rent) {

    $renter = find('users', $rent['renter_id']);
    $diff = dateDiffInDays($rent['to_date'], $rent['from_date']);



    $bike = find('bikes', $rent['bike_id']);
    $bikeimage = where('bike_images', 'bike_id', '=', $bike['id'], false);

    $price = $bike['price'] * $diff;
?>

    <div class="card mb- d-flex justify-content-center my-2 mx-4" style="max-width: 1140px;">
        <div class="row g-0 m-4">
            <div class="col-md-4">
                <img src="../../uploads/<?php echo $bikeimage['images']; ?>" class="img-fluid rounded-start" style="object-fit: contain; height:300px;width:600px;" alt="...">
            </div>
            <div class="col-md-8 px-4 mt-4">
                <div class="card-body">
                    <h4 class="card-title">Bike Name: <?php echo $bike['name']; ?></h4>
                    <div class="row">
                        <div class="col">
                            <p class="card-text">Renter Name: <?php echo $renter['name']; ?></p>
                            <p class="card-text">Renter Email: <?php echo $renter['email']; ?></p>
                            <p class="card-text">From Date: <?php echo $rent['from_date']; ?></p>
                            <p class="card-text">Days: <?php echo $diff; ?></p>
                            <p class="card-text">Ticket Code: <?php echo $rent['ticket']; ?></p>
                        </div>
                        <div class="col">
                            <p class="card-text">Renter Address: <?php echo $renter['address']; ?></p>
                            <p class="card-text">To Date: <?php echo $rent['to_date'];
                            $_SESSION['to_date']=$rent['to_date'];
                            ?></p>
                            <p class="card-text">Rental Price per day: <?php echo $bike['price']; ?></p>
                            <p class="card-text">Total price: <?php echo $price; ?></p>
                        </div>
                    </div>

                </div>
                <div>
                    <a href="action.php?rentreceived_id=<?php echo $rent['id']; ?>" class="btn btn-dark btn-lg">Bike Receive</a>
                    <a href="editbikerent.php?renteredbike=<?php echo $rent['id']; ?>" class="btn btn-dark btn-lg">Edit Details</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>