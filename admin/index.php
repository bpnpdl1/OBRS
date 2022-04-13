<?php
require 'db.php';
require_once './functions.php';
$title = "Admin panel";
require 'top.php';

if (!empty($_POST)) {
    $search = request('search');
    $value = request('value');
    switch ($search) {
        case 'name': {
                $data = where('users', 'name', '=', $value);
                break;
            }
        case 'email': {
                $data = where('users', 'email', '=', $value);
                break;
            }
        case 'citizenship_number': {
                $data = where('users', 'citizenship_number', '=', $value);
                break;
            }
        case 'license_number': {
                $data = where('users', 'license_number', '=', $value);
                break;
            }
        case 'role': {
                $data = where('users', 'role', '=', $value);
                break;
            }
        case 'displayall': {
                $data = all('users');
                break;
            }
        default:
            setError('No data found');
    }
}


require 'header.php';



$id = request('id');
if (!empty($_GET)) {
    delete('users', $id);
}
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
    <div class="col border rounded mx-4 ">
        <h5 class="rounded p-3" style="background:#000000;text-align:center;color:aliceblue;">Users Search By</h5>
        <form action="index.php" method="POST">

            <select name="search" id="search" class="form-control">
                <option value="">Not Choosen</option>
                <option value="email">Email</option>
                <option value="name">Name</option>
                <option value="citizenship_number">Citizenship number</option>
                <option value="license_number">License Number</option>
                <option value="role">Role</option>
                <option value="displayall">Display all</option>
            </select>
            <input type="text" name="value" class="form-control">
            <input type="submit" class="btn btn-dark form-control m-2" value="Search">

        </form>
    </div>
</div>
<?php if (hasSuccess()) { ?>
    <div class="alert alert-success">
        <?php echo getSuccess(); ?>
    </div>
<?php } ?>
<div class="row">
    <h2 class="ml-5">Clients</h2>
    <?php $count = 1; ?>
    <div class="mt-5">

    </div>

    <table class="table border rounded table-stribed table-hover m-4">
        <thead style="background-color: #000000; ">
            <tr style="color: #ffffff;">
                <th scope="col">S\N</th>
                <th scope="col">Name</th>
                <th scope="col">Role</th>
                <th scope="col">Action</th>
            </tr>

        </thead>




        <?php if (!empty($_POST)) { ?>



            <tbody class="tbody">
                <?php
                foreach ($data as $users) {

                ?>
                    <tr>
                        <td><?php echo $count++ ?></td>
                        <td><?php echo $users['name']; ?></td>
                        <td><?php echo $users['role']; ?></td>
                        <td><a href="show.php?id=<?php echo $users['id']; ?>" class="btn btn-success btn-sm ">Show</a>
                            <a href="edit.php?id=<?php echo $users['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                            <a href="index.php?id=<?php echo $users['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                        </td>


                    </tr>
                    <?php if (hasError()) { ?>
                        <tr><?php getError(); ?></tr>
                    <?php
                    } ?>
                <?php } ?>


            </tbody>

        <?php } ?>
    </table>


</div>

<!-- End of Main Content -->
<?php require 'footer.php'; ?>