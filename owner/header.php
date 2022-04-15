<?php

check_owner();
$user = find('users', $_SESSION['user_id']);
$fullname = explode(" ", $user['name']);
$fname = $fullname[0];
$owner_id = $_SESSION['user_id'];
$sql = " SELECT*FROM notifications WHERE owner_id=$owner_id AND seen='unseen'";

$countnoti = query($sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="http://localhost/Online_Bike_Rental_System/css/font-awesome/css/font-awesome.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        * {
            font-family: poppins;
        }

        body {
            width: 100%;
        }
        .controlsbike>a{
            margin: 10px;
        }

        :root {
            --first: rgba(23, 22, 22, 0.95);
            --second: rgba(255, 255, 255, 0);
        }

        #bgimage {
            background-position: center, center;
            background-image: linear-gradient(to right, var(--first), var(--second)), url('../images/c3.jpg');
            background-repeat: no-repeat;
            background-size: cover;
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

<body style="overflow-x: hidden;">
    <div class="d-flex" style="flex-direction: column;min-height:100vh">
        <nav class="bg-dark d-flex justify-content-between px-3 py-2">
            <div class="logo"><a href="index.php" style="text-decoration: none;">
                    <h1 style="color: #ffffff;">OBRS</h1>
                </a></div>
            <div class="content d-flex align-items-center">
                <ul class="nav px-4">
                    <li class="nav-item">
                        <a class="nav-link active" style="color: #ffffff;" href="http://localhost/Online_Bike_Rental_System/owner/"> Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" style="color: #ffffff;" href="#"> Rental Procedure</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color: #ffffff;" href="http://localhost/Online_Bike_Rental_System/owner/working_panel">Working Panel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color: #ffffff;" href="http://localhost/Online_Bike_Rental_System/owner/notifications.php"> Notifications<sup class="badge badge-light"><?php echo count($countnoti); ?></sup></a>
                    </li>


                    <li class="nav-item d-flex align-items-center">
                        <div class="container mt-1">
                            <div class="dropdown">
                                <button type="button" class="btn btn-primary dropdown-toggle btn-rounded btn-md" data-bs-toggle="dropdown" style="background-color: #ffffff;color:#000000">
                                    <i class="fa fa-user-circle-o" aria-hidden="true"> </i>
                                    <?php echo $fname; ?>
                                </button>
                                <ul class="dropdown-menu">
                                    <li> <a class="dropdown-item" style="color: #000000;" href="http://localhost/Online_Bike_Rental_System/owner/profile.php" class="px-4"><i class="fa fa-user" aria-hidden="true"></i> Profile</a></li>
                                    <a class="dropdown-item" style="color: #000000;" href="http://localhost/Online_Bike_Rental_System/signout.php" class="px-4"> <i class="fa fa-sign-out"></i> Logout</a>

                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

        <main style="flex: 1">