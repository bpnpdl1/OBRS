<?php
$title = "Categories";
require_once '../db.php';
require_once '../functions.php';
require "../top.php";
require "../header.php";
?>
<?php if (hasError()) { ?>
    <div class="alert alert-danger mx-3 border rounded"><?php echo getError(); ?></div>
<?php }
if (hasSuccess()) { ?>
    <div class="alert-success mx-3 border rounded"><?php echo getSuccess(); ?></div>
<?php } ?>

<div class="row d-flex justify-content-between m-5">
<h3>Bike Types</h3>

<a href="add.php">Add</a>
</div>

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
        $categories=all('categories');
        foreach ($categories as $category) {
        ?>
            <tr>
                <td><?php echo $category["id"]; ?></td>
                <td><?php echo $category["name"]; ?></td>
                <td>
        <a href="show.php?id=<?php echo $category['id'] ;?>">See Details</a>
                   </td>
            </tr>

        <?php }; ?>

    </tbody>
</table>


<?php
require "../footer.php";
?>
