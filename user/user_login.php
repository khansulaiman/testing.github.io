<?php 
define('TITLE','Login');
include('../connection.php');
session_start();
if(!isset($_SESSION['is_login']))
{
if(isset($_POST['u_login'])) 
{
    $user_email=mysqli_real_escape_string($conn, trim($_POST['remail']));
    $user_password=mysqli_real_escape_string($conn, trim($_POST['rpassword']));
     $sql="SELECT user_email,user_password from user_registration Where user_email='$user_email' And user_password=
    '$user_password' limit 1";
    $result=mysqli_query($conn,$sql)or die("sql query faild.");
    if(mysqli_num_rows($result)==1)
    {
        $_SESSION['is_login']= true;
        $_SESSION['remail']=$user_email;
        header("Location:user_profile.php");
        exit;
    }
    else
    {
        $msg='<div class="alert alert-warning mt-2"> Enter valid email and password </div>';
    }
}
}  else
{
    header("Location:user_profile.php");
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
        Requestor Aria </p>

    <div class="container-fluid">
        <div class="row justify-content-center custom-margin">
            <div class="col-sm-6 col-md-4">
                <form action="<?php  $_SERVER['PHP_SELF'];?>"  class="shadow-lg p-3" method="POST">
                    <div class="form-group">
                        <i class="fas fa-user"></i> <label for="email" class="font-weight-bold pl-2">
                            Email </label> <input type="email" class="form-control" placeholder="email" name="remail" required>
                        <small class="form-text">Well never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <i class="fas fa-key"> </i> <label for="email" class="font-weight-bold pl-2">
                            Email </label> <input type="password" class="form-control" placeholder="password"
                            name="rpassword" required>
                    </div>
                    <button type="submit" class="btn btn-outline-danger mt-3 font-weight-bold btn-block shadow-sm" name="u_login"> Login </button>
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