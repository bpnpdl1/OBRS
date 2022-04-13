 <!-- Page Wrapper -->
 <div id="wrapper">

     <!-- Sidebar -->
     <ul class="navbar-nav sidebar sidebar-dark accordion" style="background-color: black;
color: #fff" id="accordionSidebar">

         <!-- Sidebar - Brand -->
         <a class="sidebar-brand d-flex align-items-center justify-content-center" href="http://localhost/Online_Bike_Rental_System/admin/index.php">

             <div class="sidebar-brand-text mx-3">
                 <h1>OBRS</h1>
             </div>
         </a>

         <!-- Divider -->
         <hr class="sidebar-divider my-0">

         <!-- Nav Item - Dashboard -->
         <li class="nav-item">
             <a class="nav-link" href="http://localhost/Online_Bike_Rental_System/admin/index.php">
                 <i class="fas fa-fw fa-tachometer-alt"></i>
                 <span>Dashboard</span></a>
         </li>

         <!-- Divider -->
         <hr class="sidebar-divider">
         <!-- Nav Item - Dashboard -->
         <li class="nav-item">
             <a class="nav-link" href="http://localhost/Online_Bike_Rental_System/admin/categories/index.php">
                 <i class="fas fa-list-alt"></i>
                 <span>Categories</span></a>
         </li>

         <!-- Divider -->
         <hr class="sidebar-divider d-none d-md-block">

         <!-- Nav Item - Dashboard -->
         <li class="nav-item">
             <a class="nav-link" href="http://localhost/Online_Bike_Rental_System/admin/bikes/index.php">
                 <i class="fas fa-motorcycle"></i>
                 <span>Bikes</span></a>
         </li>

         <!-- Divider -->
         <hr class="sidebar-divider d-none d-md-block">

         <!-- Nav Item - Dashboard -->
         <li class="nav-item">
             <a class="nav-link" href="http://localhost/Online_Bike_Rental_System/admin/cities">
                 <i class="fas fa-city"></i>
                 <span>Cities</span></a>
         </li>
         <!-- Divider -->
         <hr class="sidebar-divider d-none d-md-block">
         <li class="nav-item">
             <a class="nav-link" href="http://localhost/Online_Bike_Rental_System/admin/rent">
                 <i class="fab fa-r-project"></i>
                 <span>Rent</span></a>
         </li>

         <!-- Nav Item - Dashboard -->
         <!--  <li class="nav-item">
        <a class="nav-link" href="http://localhost/Online_Bike_Rental_System/admin/bikes/index.php">
        
        <i class="fa fa-question-circle" aria-hidden="true"></i>
            <span>Rent Requests</span></a>
    </li>
 -->
         <!-- Sidebar Toggler (Sidebar) -->
         <div class="text-center d-none d-md-inline">
             <button class="rounded-circle border-0" id="sidebarToggle"></button>
         </div>

     </ul>
     <!-- End of Sidebar -->

     <!-- Content Wrapper -->
     <div id="content-wrapper" class="d-flex flex-column">

         <!-- Main Content -->
         <div id="content">

             <!-- Topbar -->
             <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                 <!-- Sidebar Toggle (Topbar) -->
                 <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                     <i class="fa fa-bars"></i>
                 </button>

                 <!-- Topbar Navbar -->
                 <ul class="navbar-nav ml-auto">


                     <div class="topbar-divider d-none d-sm-block"></div>

                     <!-- Nav Item - User Information -->
                     <li class="nav-item dropdown no-arrow">
                         <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                             <i class="fas fa-fw fa-user d-flex align-items-center"></i>
                             <h1 class="mr-2 d-none h1 d-lg-inline text-gray-600 small">Admin</h1>

                         </a>
                         <!-- Dropdown - User Information -->
                         <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                             <div class="dropdown-divider"></div>
                             <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                 <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                 Logout
                             </a>
                             <a class="dropdown-item" role="button" href="http://localhost/Online_Bike_Rental_System/admin/addadmin.php">
                                 <!-- <i class="fas fa-plus-alt fa-sm fa-fw mr-2 text-gray-400"></i> -->
                                 <i class="fa fa-plus text-gray-400" aria-hidden="true"></i>
                                 Add admin
                             </a>
                         </div>
                     </li>

                 </ul>

             </nav>
             <!-- End of Topbar -->