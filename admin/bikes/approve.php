<?php $title = "Pending Bike Request";
require_once '../db.php';
require_once '../functions.php';

$id = request('id');
if (!empty($id)) {
    $approved = 'approved';
    $bike = find('bikes', $id);
    $owner=find('users',$bike['user_id']);
    
    if($bike['price']==0){
        setError('Please Set the Rental price of this bike form the edit');
        redirect('show.php?id=' . $id);
    }

    $header = "From: admin@obrs.com\nContent-Type: text/html";
    $body = 'Dear ' . $owner['name'] . "<br>"  . ' Your Bike Request is Approved You will be notify went someone request your bike as rent' . '<br>' . 'Admin Obrs';
    mail($owner['email'], 'Bike Registration ', $body, $header);

    $text = 'Dear ' . $owner['name'] . "<br>"  . ' Your Bike Request is Approved. ';
    $date=date('Y-m-d');
     $seen = 0;// unseen is 0 and seen is 1
    create('notifications', compact('owner_id', 'text','seen','date'));


    $sql = 'UPDATE bikes SET approve="approved" WHERE id=' . $id;
    query($sql);
    setSuccess('Approved Bike Request');
    redirect('show.php?id=' . $id);
}
