<?php
require_once 'db.php';

$Date = date('Y-m-d');
echo date('Y-m-d', strtotime($Date. ' + 1 days'));
echo date('Y-m-d', strtotime($Date. ' + 2 days'));

die;

?>

<script>

var bike = JSON.parse('<?php echo json_encode($bike); ?>');


// now you can access
console.log(bike[0].tax_expiry_date);

var dt=new Date(bike[0].tax_expiry_date);
console.log(dt.getFullYear());

</script>

