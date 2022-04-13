<?php
$title = "Rented";
require_once '../admin/db.php';
require_once '../admin/functions.php';

require_once './header.php';
if(empty($_POST)){
    echo 'Something gone wrong';
    die;
}

if(!empty($_POST)){
$renter_id = $_POST['renter_id'];
$owner_id = $_POST['owner_id'];
$ticket = $_POST['ticket'];

$rents = where('rent', 'ticket', '=', $ticket, false);


$bike = find('bikes', $_POST['bike_id']);
$bike_id = $_POST['bike_id'];

$from_date = $_POST['from_date'];
$to_date = $_POST['to_date'];
$diff = $_POST['diff'];
$total_price = $diff * $bike['price'];
$status = 1;


    
create('rent', compact('renter_id', 'owner_id', 'bike_id', 'from_date', 'to_date', 'total_price', 'status', 'ticket'));
$rntsql="SELECT MAX(id) AS maxid
FROM rent";
$rentid=query($rntsql,false);
$rentid=$rentid['maxid'];

}



$owner = find('users', $owner_id);

if (!empty($owner)) {


    $header = "From: admin@obrs.com\nContent-Type: text/html";
    $body = 'Dear ' . $owner['name'] . "<br>" . $user["name"] . ' had requested your bike for  ' . $diff . ' From ' . '<br>' . 'From ' . $from_date . ' to ' . $to_date . '<br>' . 'Admin Obrs';
    mail($owner['email'], 'Rent Bike Request ', $body, $header);

    $text = 'Dear ' . $owner['name'] . " , " . $user["name"] . ' had requested your bike for  ' . $diff . ' Days ' . ' From  '  . $from_date . ' to ' . $to_date;
    
    create('notifications', compact('owner_id', 'text'));
}


?>

<div class="mx-5 my-3">
    <h2 class="text-center">Rental Details</h2>

</div>
<form action="pdf.php" method="POST">
    <div style="display: flex; justify-content:center">

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
                                <li class="text-black">Ticket Code: <?php echo $ticket; ?></li>
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
                                <p class="float-end"><?php echo $_POST['diff']; ?>
                                    <input type="hidden" name="diff" value="<?php echo $diff; ?>">

                                </p>
                            </div>
                            <hr>
                        </div>
                        <div class="row text-black">

                            <div class="col-xl-12">
                                <p class="float-end fw-bold">Total : <?php echo $_POST['total'] . '/-'; ?>
                                </p>
                            </div>
                            <hr style="border: 2px solid black;">
                            <small style="width: 300px;">Note: Bring Cash and other neccassary documents in bike Station to take a bike</small>
                            <div></div>
                        </div>


                    </div>
                </div>
            </div>
        </div>



        <div><input type="submit" class="btn btn-md btn-dark rounded" value="Download Ticket Pdf" target="_blank">

            <a href="cancelrentbike.php?id=<?php echo $rentid;?> " class="btn btn-md btn-dark">Cancel Rental Booking</a>
            <br>
            <div class=""><img src="<?php echo $_SESSION['bike_image']; ?>" alt="" width="400px" style="display: block; object-fit: contain; margin-top: 10vh;">
            </div>

        </div>

</form>


<?php require_once './footer.php'; ?>