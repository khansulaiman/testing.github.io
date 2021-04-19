<?php 
define('TITLE','Login');
include('../connection.php');
session_start();
if(!isset($_SESSION['admin_login']))
{
if(isset($_POST['a_login'])) 
{
    $admin_email=mysqli_real_escape_string($conn, trim($_POST['a_email']));
    $admin_password=mysqli_real_escape_string($conn, trim($_POST['a_password']));
    $sql="SELECT admin_email,admin_password from admin_login Where admin_email='$admin_email' And admin_password=
    '$admin_password' limit 1";
    $result=mysqli_query($conn,$sql)or die("sql query faild.");
    if(mysqli_num_rows($result)==1)
    {
        $_SESSION['admin_login']= true;
        $_SESSION['a_email']=$admin_email;
        header("Location:dashboard.php");
        exit;
    }
    else
    {
        $msg='<div class="alert alert-warning mt-2"> Enter valid email and password </div>';
    }
}
}  else
{
    header("Location:dashboard.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheer" href="../css/all.min.css">

    <style>
        .customer-margin {
            margin-top: 8vh;
        }
    </style>

    <title><?php echo TITLE ;?></title>
</head>

<body>
    <div class="mt-5 text-center" style="font-size: 30px;">
        <i class="fas fa-stethoscope"> </i>
        <spam> Online Service Management </span>
    </div>

    <p class="text-center" style="font-size: 20px;"><i class="fas fa-user-secret text-danger"> </i>
        Admin Area </p>

    <div class="container-fluid">
        <div class="row justify-content-center custom-margin">
            <div class="col-sm-6 col-md-4">
                <form action="<?php  $_SERVER['PHP_SELF'];?>"  class="shadow-lg p-3" method="POST">
                    <div class="form-group">
                        <i class="fas fa-user"></i> <label for="email" class="font-weight-bold pl-2">
                            Email </label> <input type="email" class="form-control" placeholder="email" name="a_email" required>
                        <small class="form-text">Well never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <i class="fas fa-key"> </i> <label for="email" class="font-weight-bold pl-2">
                            Password </label> <input type="password" class="form-control" placeholder="password"
                            name="a_password" required>
                    </div>
                    <button type="submit" class="btn btn-outline-danger mt-3 font-weight-bold btn-block shadow-sm" name="a_login"> Login </button>
                    <?php if(isset($msg)){
                     echo $msg;
                    }?>
                </form>
                <div class="text-center"> <a href="../index.php" class="btn btn-info mt-3 font-weight-bold shadow-sm">
                        Back to Home </a> </div>
            </div>
        </div>
    </div>
    <script src="../js/jquery.min.js"> </script>
    <script src="../js/propper.min.js"> </script>
    <script src="../js/bootstrap.min.js"> </script>
    <script src="../js/all.min.js"> </script>
</body>

</html>