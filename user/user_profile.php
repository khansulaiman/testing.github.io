<?php
define('PAGE','user_profile');
include('../connection.php');
define('TITLE', 'profile');
session_start();
if($_SESSION['is_login']){
 $uemail=$_SESSION['remail'];
}
else
{
    header("Location:user_login.php");
}
$sql="SELECT user_name,user_email from user_registration Where user_email='{$uemail}'";
$result=mysqli_query($conn,$sql) or die("Query failed");
 if(mysqli_num_rows($result)>0)
{
    $row=mysqli_fetch_assoc($result);
}
if(isset($_POST['updatename']))
{
    if($_POST['uname']=="")
    {
        $passmsg= '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> fill all fields </div>';
    }
    else
    {
        $uname=$_POST['uname'];
        $sql2="UPDATE user_registration SET user_name='{$uname}' Where user_email='{$uemail}'";
        $result2=mysqli_query($conn,$sql2) or die("Second Query failed.");

        if($result2==TRUE)
        {
          $passmsg='<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Updated Successfully</div>';
        }

        else
        {
            $passmsg='<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> unable to updated</div>';
        }
    
    }
}

?>
<?php
include("../header/header.php");
?>
              <!-- Start profile area -->
                <div class="col-sm-6 ">
                    <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST" class="mx-5">
                        <div class="form-group">
                            <label for="uemail"> Email </label> <input type="email" class="form-control" name="uemail"
                                id="uemail" value="<?php echo $row['user_email']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="uname">Name</label> <input type="text" class="form-control" name="uname"
                                id="uname"  value="<?php echo $row['user_name']; ?>">
                        </div>
                        <button type="submit" class="btn btn-danger" name="updatename">Update</button>
                        <?php if(isset($passmsg)){
                            echo $passmsg;
                 
                        }?>
                    </form>
                </div>
                <!-- End profile area -->
           <?php
           include("../footer/footer.php");
           ?>