<?php
require_once '../../admin/db.php';
require_once '../../admin/functions.php';
$title = 'Working Panel';

$rent_id=request('renteredbike');

if(!empty($_POST)){
    $from_date=request('from_date');
    $to_date=request('to_date');
    update('rent',$rent_id,compact('from_date','to_date'));
    setSuccess('Details Successfully edited!');
    redirect('renterdbike.php');
  
}


$rent=find('rent',$rent_id);
$categories = all('categories');
$cities = all('cities');
$owner_id = $_SESSION['user_id'];
$bike=find('bikes',$rent['bike_id']);




require_once '../header.php';
?>
<div class="d-flex justify-content-end m-4"><a href="http://localhost/Online_Bike_Rental_System/owner/working_panel/renterdbike.php" class="mx-4 ">Go back</a></div>
<div class="m-3 d-flex justify-content-center align-items-center mt-4 p-3" height="7vh">
    <form action="editbikerent.php?renteredbike=<?php echo $rent_id;?>" class="form border p-2 mt-4" method="POST">
        <legend class="bg-dark text-light w-100 d-block p-4 border rounded ">Rent Bike Details</legend>

<div>
<p class="mx-3">Renter Name: <?php echo $bike['name'];?> </p>
<div class="row mx-3">
<div class="form-group col">
    <label for="fromdate" class="form_date">From date</label>
    <input type="date" name="from_date" class="form-control" id="fromdate" value="<?php echo $rent['from_date'];?>">
</div>
<div class="form-group col">
    <label for="fromdate" class="form_date">To date</label>
    <input type="date" name="to_date" class="form-control" id="todate" min="<?php echo $rent['from_date'];?>" value="<?php echo $rent['to_date'];?>">
</div>
</div>

<input type="submit" value="Save" class="btn btn-dark btn-lg mt-4" style="width: 100%;">

</div>


    </form>
</div>

