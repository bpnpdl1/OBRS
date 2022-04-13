<?php
$title = "Book Bike";
require_once '../admin/db.php';
require_once '../admin/functions.php';

if (!empty($_POST)) {
    $from_date = request('fromdate');
    $to_date = request('todate');
}
$user = find('users', $_SESSION['user_id']);
$bike = find('bikes', $_SESSION['bike_id']);

if (!empty($_SESSION['owner_id'])) {
    $owner = find('users', $_SESSION['owner_id']);
}

$bikeid = $_SESSION["bike_id"];

if ($from_date >= $to_date) {

    setError('Your From Date should be less than To Date');
    redirect('book.php?id=' . $bikeid);
}


$d1 = strtotime($from_date);
$d2 = strtotime($to_date);
$diff = ($d2 - $d1) / 60 / 60 / 24;
$diff = (int)$diff;

$dsql = "SELECT from_date,to_date FROM rent WHERE bike_id=$bikeid";
$dates=query($dsql);
foreach ($dates as $date) {
  
    for ($i = $from_date; $i <= $to_date; $i = date('Y-m-d', strtotime($i . ' + 1 days'))) {

        if ($i == $date['from_date']) {
            setError('This bike is already rented from ' . date('M-d',strtotime($date['from_date'])).' To '.date('M-d',strtotime($date['to_date'])));
            redirect('book.php?id=' . $bikeid);   
        }
        if ($i == $date['to_date']) {
            echo  $i.'='.$date['to_date'];
            setError('This bike is rented to  ' . $date['to_date']);
            redirect('book.php?id=' . $bikeid);
        }
    }
}


$today = date('Y-m-d');

$rate = ($bike['price'] * $diff);
$total = $rate;
if ($from_date < $today) {
    setError('Your From Date is Less than today');
    redirect('./book.php?id=' . $bikeid);
}

$rent = where('rent', 'to_date', '=', $to_date);
/* if (!empty($rent)) {
        $header = "From: mail@bike.com\nContent-Type: text/html";
        $body = 'Dear ' . $_SESSION['ownername'] . '<br>' . 'Your Bike is rented' . '<br>' . 'From' . '<br>' . 'Admin Obrs';
        mail('test@user.com', 'Test Mail', $body, $header);

        echo "mail sent";
    } */

require './header.php';
?>
<div class="d-flex justify-content-end align-items-center mr-4 px-5 ">
    <a href="<?php echo "book.php?id=" . $_SESSION['bike_id']; ?>" style="margin-bottom: -5%;color:#000000"><i class="fa fa-arrow-left" aria-hidden="true"></i> Go Back</a>
</div>

<div style="display: flex; justify-content: center;" class="mt-5">

    <form action="rented.php" method="POST">
        <div class="mx-5">
            <div class="card ml-5" style="width: 65%;">
                <div class="card-body mx-4">
                    <div class="container">
                        <p class="my-3 mx-5" style="font-size: 20px;margin-top:-10%;"><?php echo $bike['name']; ?></p>
                        <div class="row">
                            <ul class="list-unstyled">
                                <li class="text-black"><b>Renter : </b><?php echo $user['name']; ?></li>
                                <input type="hidden" name="renter_id" value="<?php echo $user['id']; ?>">
                                <li class="text-muted ">Owner: <?php if (!empty($owner['name'])) {
                                                                    echo $owner['name'];
                                                                } ?></li>
                                <input type="hidden" name="owner_id" value="<?php if (!empty($owner)) {
                                                                                echo $owner['id'];
                                                                            }
                                                                            ?>">

                                <li class="text-black"><sub>Date of Rent Registration <?php echo date('Y-M-d'); ?></sub></li>
                            </ul>
                            <hr>
                            <div class="col-xl-10">
                                <p>Bike Rental Price per day</p>
                            </div>
                            <div class="col-xl-2">
                                <p class="float-end"><?php echo $bike['price']; ?>/-
                                </p>
                            </div>
                            <hr>
                        </div>
                        <input type="hidden" name="bike_id" value="<?php echo $bike['id']; ?>">
                        <input type="hidden" name="from_date" value="<?php echo $from_date; ?>">
                        <input type="hidden" name="to_date" value="<?php echo $to_date; ?>">
                        <div class="row">
                            <div class="col-xl-10">
                                <p>Rental Days</p>
                            </div>
                            <div class="col-xl-2">
                                <p class="float-end"><?php echo $diff; ?>
                                    <input type="hidden" name="diff" value="<?php echo $diff; ?>">
                                </p>
                            </div>
                            <hr>
                        </div>

                        <div class="row text-black">

                            <div class="col-xl-12">
                                <p class="float-end fw-bold">Total : <?php echo $total . '/-'; ?>
                                    <input type="hidden" name="total" value="<?php echo $total; ?>">
                                    <input type="hidden" name="ticket" value="<?php echo uniqid(); ?>">
                                </p>
                            </div>
                            <hr style="border: 2px solid black;">
                            <div><input type="submit" class="btn btn-lg btn-dark rounded" value="Rent" style="display: block;width:100%"></div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="image d-flex align-items-center">

        <div class=""><img src="<?php echo $_SESSION['bike_image']; ?>" alt="" width="350px" style="display: block; object-fit: contain;">
        </div>
    </div>


</div>



<?php require './footer.php'; ?>