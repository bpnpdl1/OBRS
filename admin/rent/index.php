<?php
$title = "Rent";
require_once '../db.php';
require_once '../functions.php';

require_once '../top.php';
require_once '../header.php';
?>

<div class="m-5 d-flex justify-content-between">
    <h2>Rent Request</h2>
    <div><a href="Add.php">Check Pending Requests</a>
<a href="" class="mx-4">Register a Rent</a></div>
</div>
<div class="form mx-5">
    <form action="ticketsearch.php" method="POST">
        <label for="ticketcode" class="form-label">Enter a Ticket code</label>
        <input type="text" name="ticket" class="form-control">
        <input type="submit" class="btn btn-dark form-control m-2" value="Search">

    </form>
</div>
<table class="table center m-3">
    <thead class="thead" style="background-color: #000000;color:aliceblue;">
        <tr>
            <th scope="col">S\N</th>
            <th scope="col">Renter Name</th>
            <th scope="col">Rental Status</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sn = 1;
        $rents = query('SELECT*FROM rent ORDER BY status');


        foreach ($rents as $rent) {

            if($rent['status']==0){
                $status='Not Approved';
            }
            if($rent['status']==1){
                $status='Approved';
            }
            if($rent['status']==2){
                $status='Rent close';
            }
            $renter = find('users', $rent['renter_id']);

            if (!empty($renter)) {
        ?>
                <tr>
                    <td><?php echo $sn++ ?></td>

                    <td><?php echo $renter['name']; ?></td>
                    <td><?php echo $status; ?></td>
                    <td>
                        <a href="ticketsearch.php?ticket=<?php echo $rent['ticket']; ?>">See Details</a>
                    </td>
                </tr>

        <?php
            }
        }; ?>

    </tbody>
</table>
<?php
require_once '../footer.php';
?>