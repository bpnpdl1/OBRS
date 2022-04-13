<?php require 'db.php';
$title = "Show Details";
require 'top.php';
require 'header.php';
$id = request('id');
$renters = find('users', $id);



?>
<img src="../uploads/<?php echo $renters['personal_image']; ?>" alt="" title="Image" height="100px">
<p>Name: <?php echo $renters['name']; ?></p>
<p>email: <?php echo $renters['email']; ?></p>
<p>address: <?php echo $renters['address']; ?></p>
<p>dob: <?php echo $renters['dob']; ?></p>
<p>License number: <?php echo $renters['license_number']; ?></p>
<p>Citizenship Number: <?php echo $renters['citizenship_number']; ?></p>
<p>role: <?php echo $renters['role']; ?></p>


<?php require 'footer.php'; ?>