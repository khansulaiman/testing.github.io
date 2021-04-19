<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/custom.css">
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
    <nav class="navbar navbar-dark fixed-top bg-primary flex-md-nowrap p-0 shadow" class="hidden">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="../index.php"> OHAS </a>
    </nav>
    <!-- End navbar -->
    <!-- Start of container -->
    <div class="container-fluid" style="margin-top: 40px;">

        <div class="row" >
             <!-- Sidebar -->
            <nav class="col-sm-2 sidebar py-5  shadow p-3 mb-5 bg-light rounded ">
                <div class="sidebar-sticky " id="receipt">
                    <ul class="nav flex-column" >
                        <li class="nav-item" > <a  class="nav-link" href="../user/user_profile.php"><i
                                    class="fas fa-user text-dark" class="mr-2"></i>Profile</a></li>
                        <li class="nav-item active"> <a class="nav-link" href="../user/user_submit_request.php"><i class="fab fa-accessible-icon text-dark"></i>Submit
                                request </a> </li>
                        <li class="nav-item"> <a class="nav-link" href="../user/serviceStatus.php"><i class="fas fa-align-center text-dark"></i>Servie
                                status </a> </li>
                        <li class="nav-item"> <a class="nav-link" href="../user/Changepass.php"><img src="../image/password-reset.svg" style="width:20px; height:20px">Change password
                            </a> </li>
                            <li class="nav-item"> <a class="nav-link" href="../user/userfeedback.php"><i class="fas fa-sign-out-alt text-dark"></i>User Feedback
                            </a> </li>
                        <li class="nav-item"> <a class="nav-link" href="../logout.php"><i class="fas fa-sign-out-alt text-dark"></i> Logout
                            </a> </li>
                            
                    </ul>
                </div>
            </nav>