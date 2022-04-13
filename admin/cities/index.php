<?php
$title = "Cities";
require_once '../db.php';
require_once '../functions.php';

require '../top.php';
require '../header.php';


?>


<div class="row d-flex justify-content-between m-5">
    <h3>Cities</h3>
    <a href="add.php">Add</a>
</div>
<?php if (hasSuccess()) { ?>
    <div class="alert alert-success mx-5 text-center"><?php echo getSuccess(); ?></div>
<?php } ?>
<table class="table center">
    <thead class="thead" style="background-color: #000000;color:aliceblue;">
        <tr>
            <th scope="col">S\N</th>
            <th scope="col">Name</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $data = all('cities');
        foreach ($data as $users) {
        ?>
            <tr>
                <td><?php echo $users["id"]; ?></td>
                <td><?php echo $users["name"]; ?></td>
                <td>
                    <a href="show.php?id=<?php echo $users['id']; ?>">See Details</a>
                </td>
            </tr>

        <?php }; ?>

    </tbody>
</table>


<?php require '../footer.php';
