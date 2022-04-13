<?php
require_once 'db.php';

$rents=where('rent','bike_id','=',55);


?>

<script>

let rent = JSON.parse('<?php echo json_encode($rents); ?>');

var from_date=rent[0].from_date;
// now you can access

console.log(from_date);

for(i=0;i<=rent.length;i++){
    console.log(rent[i].from_date);
    console.log(rent[i].to_date);
}

/* var dt=new Date(bike[0].tax_expiry_date);
console.log(dt.getFullYear()); */

</script>

