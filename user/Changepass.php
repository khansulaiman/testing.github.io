<?php
define('TITLE','Change password');
include("../header/header.php");
include("../connection.php");
session_start();
if($_SESSION['is_login']){
 $uemail=$_SESSION['remail'];
}
else
{
    header("Location:user_login.php");
}
if(isset($_POST['updatepass'])){
    if($_POST['userpass']==""){
        $msg='<div class="alert alert-warning">Enter new password</div>';
    }
    else{
        $password=$_POST['userpass'];
        $sql="UPDATE user_registration set user_password='{$password}' where user_email='{$uemail}'";
        $result=mysqli_query($conn,$sql) or die("Query faild.");
        if($result==TRUE){
            $msg='<div class="alert alert-success">your password is updated</div>';
         }
        
    }
}
?>
   <div class="col-sm-6 col-md-6">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="mt-5 mx-5">
      <div class="form-group">
       <label for="inputemail">Email</label>
       <input type="email" name="useremail" id="inputemail" class="form-control" value="<?php echo $uemail;?>" readonly>
     </div>
     <div class="form-group">
      <label for="inputpass">New password</label>
      <input type="password" name="userpass" id="inputpass" class="form-control" placeholder="New password">
    </div>
    <button type="submit" name="updatepass" class="btn btn-danger mr-4 mt-4"> Update</button>
    <button type="reset" class="btn btn-secondary mt-4">Reset</button>
    <div class="form-group">
    <?php   if(isset($msg)){
        echo $msg;
    }    ?>
    </div>
    </form>
    </div>

<?php
include("../footer/footer.php");
?>