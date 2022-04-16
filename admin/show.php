<?php require 'db.php';
require_once 'functions.php';
$title = "Show Details";
require 'top.php';
require 'header.php';
$id = request('id');
$renters = find('users', $id);




?>
<div class="m-4 d-flex justify-content-between" >
    <h2>User Details</h2>
    <div class="d-flex">
    <a href="edit.php?id=<?php echo $id; ?>" class="mx-4">Edit</a>
    <a class="mx-4" onclick="userdelete()">Delete</a> 
    </div>
</div>
<div style="display: flex;" class="m-4 p-4">
<div style="width: 50%;">
    <p>Name: <?php echo $renters['name']; ?></p>
    <p>email: <?php echo $renters['email']; ?></p>
    <p>address: <?php echo $renters['address']; ?></p>
    <p>dob: <?php echo $renters['dob']; ?></p>
    <p>License number: <?php echo $renters['license_number']; ?></p>
    <p>Citizenship Number: <?php echo $renters['citizenship_number']; ?></p>
    <p>role: <?php echo $renters['role']; ?></p>
</div>
<div>
    
<img src="../uploads/<?php echo $renters['personal_image']; ?>" alt="" title="Image" height="300px">

</div>
</div>
<?php  setSuccess('User is Successfully removed');?>
<script>
    function userdelete(){
        if(confirm('Are you sure to delete this User?')){
          window.location.replace(' index.php?id=<?php echo $id; ?>')

        }
    }
</script>


<?php require 'footer.php'; ?>