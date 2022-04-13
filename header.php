<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $title; ?></title>
  <?php require 'links.php'; ?>
 <style>
   *{
     font-family: poppins;
   }
   body{
       overflow-x: hidden;
   }
 </style>
</head>

<body>
  <div class="d-flex" style="flex-direction: column;min-height:100vh">
  <nav class="bg-dark d-flex justify-content-between px-4 py-2">
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
                        <a class="nav-link" style="color: #ffffff;" href="signin.php"> Sign in</a>
                    </li>
                   
                </ul>
            </div>
        </nav>








    <main style="flex: 1">