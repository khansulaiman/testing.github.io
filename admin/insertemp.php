<?php
define ('TITLE','Update Technician');
Include ('admin_header.php');
Include ('../connection.php');
session_start();
if(isset ($_SESSION['admin_login']))
{
    $aEmail=$_SESSION['a_email'];
} else
{
    header("Location:login.php");
}
if(isset($_REQUEST['empSubmit']))
{
    if(($_REQUEST['empName']=="")||($_REQUEST['empCity']=="")||($_REQUEST['empMobile']==""))
    {
        $msg= '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fields </div>';
    }
    else
    {
        $ename=$_REQUEST['empName'];
        $eCity=$_REQUEST['empCity'];
        $eMobile=$_REQUEST['empMobile'];
        $eEmail=$_REQUEST['empEmail'];
        $sql="INSERT into technicion(emp_name, emp_email, emp_phone, emp_city) VALUES('$ename', '$eEmail',$eMobile,'$eCity')";
        if(mysqli_query($conn,$sql)== True)
        {
            $msg= '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Added Successfully </div>';
        }
        else
        {
            $msg= '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Add </div>';
        }
    }
}
?>

<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center"> Add new Technician </h3>
    <form action="" method="POST">
       
        <div class="form-group">
            <label for="empName"> Name </label>
            <input type="text" class="form-control" id="empName" name="empName">
        </div>

        <div class="form-group">
            <label for="empCity"> city </label>
            <input type="text" class="form-control" id="empCity" name="empCity">
        </div>

        <div class="form-group">
            <label for="empMobile"> Mobile </label>
            <input type="text" class="form-control" id="empMobile" name="empMobile">
        </div>

        <div class="form-group">
            <label for="empEmail"> Email </label>
            <input type="text" class="form-control" id="empEmail" name="empEmail">
        </div>
        
        <div class="text-center">
            <button type="submit" class="btn btn-danger" id="empSubmit" name="empSubmit"> Submit </button>
            <a href="technicion.php" class="btn btn-secondary">close</a> 
        </div>

        <?php  if(isset($msg)) {echo $msg;} ?>
        </form>
        </div>

<?php include('admin_footer.php')?>