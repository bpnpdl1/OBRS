<?php

$title = "Rent Details";
require_once '../db.php';
require_once '../functions.php';

$rent=find('rent',request('id'));

print_r($rent);

