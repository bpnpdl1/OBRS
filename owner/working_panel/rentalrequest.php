<?php
require_once '../../admin/db.php';
require_once '../../admin/functions.php';
$title = 'Working Panel';


$categories = all('categories');
$cities = all('cities');
$owner_id = $_SESSION['user_id'];
$sn = 1;
$Sql = 'SELECT * FROM `rent` WHERE `owner_id`=' . $owner_id . ' AND `status`=1';
$rents = query($Sql);




require_once '../header.php';

?>
<section class="m-4">

    <div class="mx-3 d-flex justify-content-between">
        <h3>Rent Request</h3>
        <div class="form-group d-flex justify-content-end w-9">
            <input type="text" name="ticket" placeholder="Search Ticket" class="form-control">

        </div>
        <a href="http://localhost/Online_Bike_Rental_System/owner/working_panel">Go back</a>

    </div>


    <?php
    if (hasSuccess()) { ?>
        <div class="alert alert-success mx-4 text-center"><?php echo getSuccess(); ?></div>

    <?php }


    if (empty($rents)) { ?>

        <h5 class="text-center">No rent requests</h5>

    <?php } ?>


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
                                <p class="card-text">To Date: <?php echo $rent['to_date']; ?></p>
                                <p class="card-text">Rental Price per day: <?php echo $bike['price']; ?></p>
                                <p class="card-text">Total price: <?php echo $rent['total_price']; ?></p>
                            </div>
                        </div>

                    </div>
                    <div>
                        <a href="action.php?arent_id=<?php echo $rent['id']; ?>" class="btn btn-dark btn-lg">Approve</a>
                        <a href="action.php?rrent_id=<?php echo $rent['id']; ?>" class="btn btn-dark btn-lg">Reject</a>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

</section>