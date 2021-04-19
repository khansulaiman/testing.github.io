<?php
define ('TITLE', 'Update Technician');
include('admin_header.php');
include('../connection.php');
session_start();
if(isset($_SESSION['admin_login']))
{
    $aEmail=$_SESSION['a_email'];
} else
{
    header("Location:login.php");
}

    if(isset($_REQUEST['empupdate']))
    {
        if($_REQUEST['empName']==""||$_REQUEST['empCity']==""||$_REQUEST['empMobile']==""||$_REQUEST['empEmail']=="")
        {
            $msg='<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fields </div>';
        }
        else
        {
            $eid = $_REQUEST['empid'];
            $eName = $_REQUEST['empName'];
            $eCity = $_REQUEST['empCity'];
            $eMobile = $_REQUEST['empMobile'];
            $eEmail = $_REQUEST['empEmail'];

            $sql2= "UPDATE technicion SET emp_name='$eName', emp_email= '$eEmail', emp_phone=$eMobile, emp_city= '$eCity' WHERE emp_id=$eid";
            if(mysqli_query($conn,$sql2)==True) 
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


<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center"> Update Technician details </h3>
    <?php  
    if(isset($_REQUEST['edit']))
    {
        $sql="SELECT * FROM technicion WHERE emp_id = {$_REQUEST['id']}";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_assoc($result);
       
    }

    ?>

    <form action="" method="POST">
        <div class="form-group">
            <label for="empid"> Emp ID </label>
            <input type="text" class="form-control" name="empid" id="empid"
                value="<?php if(isset($row['emp_id'])) {echo $row['emp_id']; }?>" readonly>
        </div>

        <div class="form-group">
            <label for="empName"> Name </label>
            <input type="text" class="form-control" name="empName" id="empName"
                value="<?php if(isset($row['emp_name'])) {echo $row['emp_name']; } ?> ">
        </div>

        <div class="form-group">
            <label for="empCity"> City </label>
            <input type="text" class="form-control" name="empCity" id="empCity"
                value="<?php if(isset($row['emp_city'])) {echo $row['emp_city']; } ?> ">
        </div>

        <div class="form-group">
            <label for="empMobile"> Mobile </label>
            <input type="text" class="form-control" name="empMobile" id="empMobile"
                value="<?php if(isset($row['emp_phone'])) {echo $row['emp_phone']; } ?> ">
        </div>

        <div class="form-group">
            <label for="empEmail"> Email </label>
            <input type="text" class="form-control" name="empEmail" id="empEmail"
                value="<?php if(isset($row['emp_email'])) {echo $row['emp_email']; } ?> ">
        </div>



        <div class="text-center">
            <button type="submit" class="btn btn-danger" id="empupdate" name="empupdate"> Update </button>
            <a href="technicion.php" class="btn btn-secondary"> close </a>
        </div>

        <?php if(isset($msg))
             { echo $msg;}  ?>

    </form>
</div>

<script>
    function isInputNumber(evt) {
        var ch = string.fromCharCode(evt.which);
        if (!(/[0-9]/.test(ch))) {
            evt.preventDefault();
        }
    }
</script>

<?php include('admin_footer.php')   ?>