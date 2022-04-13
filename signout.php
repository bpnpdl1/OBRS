<?php
$guesturl="http://localhost/Online_Bike_Rental_System/index.php";


require "db.php";

unset($_SESSION['user_id']);

// Back to login
header("Location: $guesturl");
?>