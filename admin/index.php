<?php
require 'db.php';
require_once './functions.php';
$title = "Admin panel";
require 'top.php';

$id = request('id');
if (!empty($_GET)) {
   setSuccess('User is Successfully removed');
    delete('users', $id);
    redirect('index.php');
}

$data = all('users');

if(!empty($_POST)){
    $txtsearch=request('txtsearch');
    $data=query("SELECT*FROM users WHERE name LIKE '%$txtsearch%' OR role LIKE'%$txtsearch%'");
    $arr=str_split($txtsearch);
    if(count($arr)<3){
    $data=array();
    }
}

require 'header.php';




$renters = where('users', 'role', '=', 'renter');
$renterno = count($renters);

$owner = where('users', 'role', '=', 'owner');
$owner = count($owner);

$bikes = all('bikes');
$bikes = count($bikes);


?>

<div class="row m-4">

    <div class="col border rounded mx-4 ">
        <h3 class="rounded p-3" style="background:#000000;text-align:center;color:aliceblue;">Bike renters</h3>
        <p style="font-size: 44px;text-align:center;"><?php echo $renterno; ?></p>
    </div>
    <div class="col  border rounded ">
        <h3 class="rounded p-3" style="background:#000000;text-align:center;color:aliceblue;">Bike owners</h3>
        <p style="font-size: 44px;text-align:center;"><?php echo $owner; ?></p>
    </div>
    <div class="col border rounded mx-4 ">
        <h3 class="rounded p-3" style="background:#000000;text-align:center;color:aliceblue;">Bikes</h3>
        <p style="font-size:44px;text-align:center;"><?php echo $bikes; ?></p>
    </div>

</div>
<?php $count = 1; ?>
<?php if (hasSuccess()) { ?>
    <div class="alert alert-success">
        <?php echo getSuccess(); ?>
    </div>
<?php } ?>
<div >
    <div class="d-flex justify-content-between mx-4">
        <div>
            <h2>Clients</h2>
        </div>

        <div>
           <form action="index.php" method="POST" class="d-flex align-items-center">
           <input type="text" class="form-control" placeholder="Search Name or Role" name="txtsearch">
            <input type="submit" value="Search" class="btn btn-dark" >
           </form>
        </div>
    </div>

    <table class="table border rounded table-stribed table-hover m-4" id="usertable">
        <thead style="background-color: #000000; ">
            <tr style="color: #ffffff;">
                <th scope="col">S\N</th>
                <th scope="col">Name</th>
                <th scope="col">Role</th>
                <th scope="col">Action</th>
            </tr>

        </thead>








        <tbody class="tbody">
            <?php
            foreach ($data as $users) {

            ?>
                <tr>
                    <td><?php echo $count++ ?></td>
                    <td><?php echo $users['name']; ?></td>
                    <td><?php echo $users['role']; ?></td>
                    <td><a href="show.php?id=<?php echo $users['id']; ?>" class="btn btn-dark btn-sm ">See details</a>
                    </td>


                </tr>
                <?php if (hasError()) { ?>
                    <tr><?php getError(); ?></tr>
                <?php
                } ?>
            <?php } ?>


        </tbody>


    </table>


</div>

<!-- End of Main Content -->
<?php require 'footer.php'; ?>