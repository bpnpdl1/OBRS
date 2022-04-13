<?php
require_once '../../admin/db.php';
require_once '../../admin/functions.php';

$arent_id=request('arent_id');
$rrent_id=request('rrent_id');
$rentreceived_id=request('rentreceived_id');
if(!empty($rrent_id)){
  $rent=find('rent',$rrent_id);
  $renter=find('users',$rent['renter_id']);
  $renter_id=$renter['id'];
  $owner=find('users',$rent['owner_id']);
  $sql="DELETE FROM rent WHERE id=$rrent_id";
 query($sql);


 $header = "From: admin@obrs.com\nContent-Type: text/html";
 $body = 'Dear ' . $renter['name'] . "<br>"  . ' Your Bike Request is Rejected by '.$owner['name'] . '<br>' . 'Admin Obrs';
 mail($renter['email'], 'Bike Registration ', $body, $header);

 $text = ' Your Bike Request is Rejected .  ';
 $date=date('Y-m-d');
  $seen = 0;// unseen is 0 and seen is 1
 create('notifications', compact('renter_id', 'text','seen','date'));

 setSuccess(' Bike Rejected Successfully');
 
   redirect('rentalrequest.php');

}

if(!empty($arent_id)){
    $rent=find('rent',$arent_id);
    $renter=find('users',$rent['renter_id']);
    $renter_id=$renter['id'];
    $owner=find('users',$rent['owner_id']);
    $sql='UPDATE rent SET status=2 WHERE id='.$arent_id;
   query($sql);


   $header = "From: admin@obrs.com\nContent-Type: text/html";
   $body = 'Dear ' . $renter['name'] . "<br>"  . ' Your Bike Request is Approved by '.$owner['name'].' Please come respective location to take bike' . '<br>' . 'Admin Obrs';
   mail($renter['email'], 'Bike Registration ', $body, $header);

   $text = ' Your Bike Request is Approved .  ';
   $date=date('Y-m-d');
    $seen = 0;// unseen is 0 and seen is 1
   create('notifications', compact('renter_id', 'text','seen','date'));

   setSuccess('Approved Bike Request');
   
     redirect('rentalrequest.php');
}


if(!empty($rentreceived_id)){
  $rent=find('rent',$rentreceived_id);
  $renter=find('users',$rent['renter_id']);
  $renter_id=$renter['id'];
  $owner=find('users',$rent['owner_id']);
  $sql='UPDATE rent SET status=0 WHERE id='.$rentreceived_id;
 query($sql);

 $header = "From: admin@obrs.com\nContent-Type: text/html";
 $body = 'Dear ' . $renter['name'] . "<br>"  . ' Your Rented Bike Received by Bike owner '.$owner['name'].' Thank you Remember us for next time' . '<br>' . 'Admin Obrs';
 mail($renter['email'], 'Bike Registration ', $body, $header);

 $text = ' Your rented Bike recived By Bike owner .  ';
 $date=date('Y-m-d');
  $seen = 0;// unseen is 0 and seen is 1
 create('notifications', compact('renter_id', 'text','seen','date'));

 setSuccess('Bike Received');
 
   redirect('rentalrequest.php');
}