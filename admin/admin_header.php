<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/custom1.css">
    <link rel="stylesheet" href="../css/all.min.css">
    <title><?php echo TITLE ;?></title>
    <style>
        ul li a:hover{
            border:1px solid black;
            background-color:#007bff;
            color:white;
        }
    </style>
</head>

<body>
<!-- navbar -->
    <nav class="navbar navbar-dark fixed-top bg-danger flex-md-nowrap p-0 shadow" class="hidden">
        <a class="navbar-brand col-md-12 mr-0 bg-primary" href="../index.php"> OHAS </a>
    </nav>
    <!-- End navbar -->
    <!-- Start of container -->
    <div class="container-fluid" style="margin-top: 40px;">

        <div class="row" >
             <!-- Sidebar -->
            <nav class="col-sm-2 sidebar py-5  shadow p-3 mb-5 bg-light rounded borderless" >
                <div class="sidebar-sticky" id="receipt">
                    <ul class="nav flex-column display-5">
                        <li class="nav-item" > <a  class="nav-link" href="dashboard.php"><i
                                    class="fas fa-user" class="mr-2"></i>Dashboard</a></li>
                        <li class="nav-item active"> <a class="nav-link" href="workOrder.php"><i class="fab fa-accessible-icon"></i>
                                Work Order</a> </li>
                        <li class="nav-item"> <a class="nav-link" href="request.php"><i class="fas fa-align-center"></i>Requests
                               </a> </li>
                               <li class="nav-item active"> <a class="nav-link" href="assets.php"><i class="fab fa-accessible-icon"></i>
                                Asset</a> </li>
                        <li class="nav-item"> <a class="nav-link" href="technicion.php"><img src="../image/supervisor.svg" style="width:20px; height:20px">Technician
                            </a> </li>
                            <li class="nav-item"> <a class="nav-link" href="requester.php"><img src="../image/requester.svg" style="width:20px; height:20px">Requesters
                            </a> </li>
                            <li class="nav-item"> <a class="nav-link" href="sellReport.php"><img src="../image/generate-report.svg" style="width:20px; height:20px"></i>Sell Report
                            </a> </li>
                            <li class="nav-item"> <a class="nav-link" href="workOrder.php"><img src="../image/rules.svg" style="width:20px; height:20px">Work Order
                            </a> </li>
                            <li class="nav-item"> <a class="nav-link" href="changepassword.php"><img src="../image/password-reset.svg" style="width:20px; height:20px">Change Password
                            </a> </li>
                        <li class="nav-item"> <a class="nav-link" href="../logout.php"><i class="fas fa-sign-out-alt"></i> Logout
                            </a> </li>
                    </ul>
                </div>
            </nav>