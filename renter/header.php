<?php

check_renter();
$user = find('users', $_SESSION['user_id']);
$fullname = explode(" ", $user['name']);
$fname = $fullname[0];
$user_id=$user['id'];
$sql = " SELECT*FROM notifications WHERE renter_id=$user_id AND seen='unseen'";

$countnoti = query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="../css/font-awesome/css/font-awesome.min.css">

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        * {
            font-family: poppins;
        }

        body {
            width: 100%;
        }

        .day,
        .pday,
        .rday,
        .tday,
        .week>div {
            width: 14.28571%;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            border-collapse: collapse;
            align-items: center;
            height: 40px;
            border: groove 1px #000000;
        }

        #bgimagerenter {
            background-image: url('http://localhost/Online_Bike_Rental_System/images/c3.jpg');
            background-repeat: no-repeat;
        }

        .tday {
            background-color: rgba(36, 34, 35, 0.06);
            border: groove 0.005px #000000;
        }

        .rday {
            background-color: rgba(46, 24, 55, 0.06);
            border: groove 0.005px #000000;
        }

        .week>div,
        .day {
            border: groove 1px;

        }

        .pday {
            background-color: rgb(51, 51, 51, 0.1);
            color: azure;
            border: 1px;
        }



        .dropdown-toggle::after {
            display: none;
            margin-left: 0.255em;
            vertical-align: 0.255em;
            content: "";
            border-top: 0.3em solid;
            border-right: 0.3em solid transparent;
            border-bottom: 0;
            border-left: 0.3em solid transparent;
        }
    </style>



</head>

<body style="overflow-x: hidden;" onload="renderdate()">
    <div class="d-flex" style="flex-direction: column;min-height:100vh">
        <nav class="bg-dark d-flex justify-content-between px-3 py-2">
            <div class="logo"><a href="index.php" style="text-decoration: none;">
                    <h1 style="color: #ffffff;">OBRS</h1>
                </a></div>
            <div class="content d-flex align-items-center">
                <ul class="nav px-4">
                    <li class="nav-item">
                        <a class="nav-link active" style="color: #ffffff;" href="index.php"> Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" style="color: #ffffff;" href="#"> Rental Procedure</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color: #ffffff;" href="http://localhost/Online_Bike_Rental_System/renter/notifications.php"> Notifications<sup class="badge badge-light"><?php echo count($countnoti); ?></sup></a>
                    </li>
                    <li class="nav-item d-flex align-items-center">
                        <div class="container mt-1">
                            <div>
                                <button type="button" class="btn " style="background-color: #ffffff;color:#000000" onclick="showdropdown()">
                                    <i class="fa fa-user-circle-o" aria-hidden="true"> </i>
                                    <?php echo $fname; ?>
                                </button>
                                <div style="position: absolute;display:flex;justify-content:center;display:none;right:0px;z-index:+1" id="dropdown">
                                    <ul class="bg-light p-2 px-3" style="list-style: none;">
                                        <li> <a class="dropdown-item" style="color: #000000;" href="http://localhost/Online_Bike_Rental_System/renter/profile.php" class="px-4"><i class="fa fa-user" aria-hidden="true"></i> Profile</a></li>
                                        <li> <a class="dropdown-item" style="color: #000000;" href="http://localhost/Online_Bike_Rental_System/renter/viewrent.php" class="px-4"><i class="fa fa-eye" aria-hidden="true"></i> View Rented Bike</a></li>
                                        <li><a class="dropdown-item" style="color: #000000;" href="http://localhost/Online_Bike_Rental_System/signout.php" class="px-4"> <i class="fa fa-sign-out"></i> Logout</a></li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

        <script>
            var dropdown = document.querySelector('#dropdown');

            function showdropdown() {
                if (dropdown.style.display == 'none') {
                    dropdown.style.display = 'block';
                } else {
                    dropdown.style.display = 'none';
                }
            }
        </script>
        <main style="flex: 1">