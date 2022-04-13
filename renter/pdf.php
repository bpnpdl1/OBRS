<?php
require_once '../db.php';
require_once '../admin/functions.php';
require_once '../fpdf/fpdf.php';
is_renter();

if(empty($_POST)){
    die('Something went wrong');
}

if (!empty($_POST)) {
    $renter_id = $_POST['renter_id'];
    $owner_id = $_POST['owner_id'];
    $bike_id = $_POST['bike_id'];
    $from_date = $_POST['from_date'];
    $to_date = $_POST['to_date'];
    $diff = $_POST['diff'];

    $renter = find('users', $renter_id);
    $bike = find('bikes', $bike_id);
    $category=find('categories',$bike['category_id']);
    $owner = find('users', $owner_id);
    if (empty($owner)) {
        $owner['name'] = 'admin';
        $owner['address'] = 'Ratnanagar-1,Chitwan';
        $owner['email'] = 'admin@obrs.com';
    }
    $bike_image = where('bike_images', 'bike_id', '=', $bike_id);
    $rent_id = query('SELECT MAX(id) AS maxid
FROM rent');
    $rent_id = $rent_id[0]["maxid"];
    $rent = find('rent', $rent_id);
    $ticket=$rent['ticket'];


    $image = $bike_image[0]["images"];
    


    $pdf = new FPDF();

    $pdf->AddPage();




    $pdf->SetFont('times', 'B', 20);

    $pdf->Cell(0, 10, 'OBRS', 1, 1, 'C');
    $pdf->SetFont('times', 'I', 12);
    $pdf->Cell(0, 12, 'Bike Rental Ticket', 0, 1, 'C');
    $pdf->SetFont('times', 'B', 16);
    $pdf->Cell(70, 12, 'Ticket Code: '.$ticket, 0, 1, 'L');
    $pdf->Image('../uploads/' . $image, 90, 30 ,100,80);
    $pdf->SetFont('times', 'I', 12);
    $pdf->Cell(70, 10, 'Renter Name: ' . $renter['name'], 0, 1, 'L');
    $pdf->Cell(63, 10, 'Bike Name: ' . $bike['name'], 0, 1, 'L');
    $pdf->Cell(55, 10, 'Number Plate: ' . $bike['number_plate'], 0, 1, 'L');
    $pdf->Cell(55, 10, 'Bike Category: ' . $category['name'], 0, 1, 'L');
    


    $pdf->SetFont('times', 'I', 12);
    $pdf->Cell(50, 10, 'Owner Name :' . $owner['name'], 0, 1, 'L');
    $pdf->Cell(85, 10, 'Owner address :' . $owner['address'], 0,1, 'L');
    $pdf->Cell(70, 10, 'Owner email :' . $owner['email'], 0,1, 'L');
    $pdf->SetFont('times', 'I', 10);

    $pdf->Cell(0, 10, 'Note : Please Bring this ticket While renting a Bike.', 1, 1, 'C');


    $pdf->Output($renter['name'].'_'.$bike['name'].date('Y-m-d').'.pdf', 'I');
}
