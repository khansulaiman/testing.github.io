<?php
define ('TITLE','Upadate Requester');
include('admin_header.php');
Include ('../connection.php');
session_start();
if(isset ($_SESSION['admin_login']))
{
    $aEmail=$_SESSION['a_email'];
} else
{
   header("Location:login.php");
}
?>

<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center"> Update Requester details </h3>
    <?php  
    if(isset($_REQUEST['edit']))
    {
        $sql="SELECT * FROM user_registration WHERE user_id={$_REQUEST['id']}";
        $result=mysqli_query($conn,$sql);
        $row1=mysqli_fetch_assoc($result);
       
    }
    if(isset($_REQUEST['requpdate']))
    {
        if($_REQUEST['r_id'] ==""||$_REQUEST['r_name']==""||$_REQUEST['r_email']== "")
        {
            $msg= '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fields </div>';
        }
        else
        {
           $r_id = $_REQUEST['r_id'];
           $r_name = $_REQUEST['r_name'];
           $r_email = $_REQUEST['r_email'];
           $sql2 = "UPDATE user_registration SET user_id= {$r_id}, user_name= '{$r_name}', user_email='{$r_email}' WHERE user_id= '{$r_id}'";
            if(mysqli_query($conn,$sql2)== True) 
            {
                $msg= '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Updated Successfully </div>';
            }
            else
            {
                $msg= '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable To Update </div>';
            }
        }
    }
    ?>
    <form action="" method="POST">
        <div class="form-group">
            <label for="u_id"> Requester ID </label>
            <input type="text" class="form-control" name="r_id" id="u_id" 
            value="<?php if(isset($row1['user_id'])) {echo $row1['user_id']; } ?> " readonly>
        </div>

        <div class="form-group">
            <label for="u_name"> Name </label>
            <input type="text" class="form-control" name="r_name" id="u_name" 
            value="<?php if(isset($row1['user_name'])) {echo $row1['user_name']; } ?> " >
        </div>

        <div class="form-group">
            <label for="u_email"> Email </label>
            <input type="text" class="form-control" name="r_email" id="u_email" 
            value="<?php if(isset($row1['user_email'])) {echo $row1['user_email']; } ?> " >
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-danger" id="Requpdate" name="requpdate"> Update </button>
            <a href="requester.php" class="btn btn-secondary"> close </a>
        </div>

        <?php if(isset($msg)) { echo $msg;}  ?> 

    </form>
</div>


<?php Include ('admin_footer.php')   ?>