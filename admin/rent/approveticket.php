<?php 
$ticket=$_GET['ticket'];
require_once '../db.php';
require_once '../functions.php';

echo $ticket;
$rent=where('rent','ticket','=',$ticket,false);
$status=1;
update('rent',$rent['id'],compact('status'));
setSuccess('Successfully Apprroved');
redirect('ticketsearch.php?ticket='.$ticket);
