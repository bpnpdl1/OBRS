<?php
$title = "Ticket Search";
require_once '../db.php';
require_once '../functions.php';

require_once '../top.php';
require_once '../header.php';
$ticket=request('ticket');
if (empty($ticket)) {
    echo 'Ticket code is empty';
    die;
}


$rent = where('rent', 'ticket', '=', $ticket);
if(!empty($rent)){
    $rent = $rent[0];
}
if (empty($rent)) {
    echo 'Rental Request Not Found';
    die;
}
$bike = find('bikes', $rent['bike_id']);
$city = find('cities', $bike['city_id']);
$renter = find('users', $rent['renter_id']);
$images=where('bike_images','bike_id','=',$bike['id']);
$images=$images[0];
$owner = find('users', $rent['owner_id']);




/* 
status=0 is for not approved
status=1 is for approved
*/
if($rent['status']==0){
$status='Not approved ';
}
if($rent['status']==1){
    $status='Approved ';
}


?>

<?php if(hasSuccess()){?>
<div class="alert alert-success mx-4"><?php echo getSuccess();?></div>

    <?php }?>
<div class="container m-3 row">
    <div class="col">
        <h4>Ticket Code : <?php echo $rent['ticket']; ?></h4>
        <p>Bike Name : <?php echo $bike['name']; ?></p>
        <p>Renter Name : <?php echo $renter['name']; ?></p>
        <p>From Date : <?php echo $rent['from_date']; ?></p>
        <p>To Date : <?php echo $rent['to_date']; ?></p>
        <p>Owner Name : <?php echo $owner['name']; ?></p>
        <p>Available At : <?php echo $city['name']; ?></p>
        <p>Status : <?php echo $status; ?></p>
    </div>
    <div class="col">
        <div class="buttons">
            <a href="approveticket.php?ticket=<?php echo $ticket;?>" class="mx-2">Approve</a>
            <a href="Reject" class="mx-2">Reject</a>
            <a href="" class="mx-2">Go Back</a>
        </div>
        <div class="p-5">
            <img src="../../uploads/<?php echo $images['images'];?>"   style="height: 360px;object-fit: cover;"   alt="" >
        </div>
    </div>

</div>