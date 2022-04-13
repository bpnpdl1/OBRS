<?php
require_once '../admin/db.php';
require_once '../admin/functions.php';
$title = 'Bike Owner';

require_once 'header.php';


?>
<div id="bgimage" style="height: 400px;padding-left: 10%;display: flex;align-items:center">
    <div>
        <h2 class="text-light">Let Your Bike earn for you</h2>
        <a href="Bike_registration" class="btn btn-lg" style="background-color: #000000;color: #ffffff;" role="button">Register Bike As Rent</a>
    </div>
</div>

<section>
    <h2 class="text-center m-4">Procedure to give Bike <b>Rent</b></h2>


    <div class="row px-4 mx-4">
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Step 1</h5>
                    <p class="card-text">Register Bike registration form.</p>

                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Step 2</h5>
                    <p class="card-text">Send Bike registration Request to Internal team</p>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Step 3</h5>
                    <p class="card-text">After Approval Your Bike will be aviailable on rent</p>
                </div>
            </div>
        </div>



</section>

<section>


</section>

<?php
require_once 'footer.php';
?>