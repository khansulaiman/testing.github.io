<?php
define('TITLE', 'Update Product');
include('admin_header.php');
include('../connection.php');
session_start();
if(isset ($_SESSION['admin_login']))
{
    $aEmail=$_SESSION['a_email'];
} else
{
    echo"<script> location.href='login.php' </script>";
}
if(isset($_REQUEST['pupdate']))
    {
        if($_REQUEST['pname'] ==""||$_REQUEST['pdop']==""||$_REQUEST['pava']== ""||$_REQUEST['ptotal']==""  
        ||$_REQUEST['poriginalcost']==""||$_REQUEST['psellingcost']== "")
        {
            $msg= '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fields </div>';
        }
        else
        {
            $pid = $_REQUEST['pid'];
            $pname = $_REQUEST['pname'];
            $pdop = $_REQUEST['pdop'];
            $pava = $_REQUEST['pava'];
            $ptotal = $_REQUEST['ptotal'];
            $poriginalcost = $_REQUEST['poriginalcost'];
            $psellingcost = $_REQUEST['psellingcost'];

            $sql = "UPDATE assets SET pname ='$pname', pdop= '$pdop', pava = '$pava', ptotal= '$ptotal',
            poriginalcost='$poriginalcost', psellingcost= '$psellingcost' WHERE pid='$pid'";
            if($conn->query($sql)== True) 
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
    <h3 class="text-center"> Update Product details </h3>
    <?php
    if(isset($_REQUEST['edit']))
    {
        $sql2= "SELECT * FROM assets WHERE pid={$_REQUEST['id']}";
        $result2=$conn->query($sql2)or die("2nd query failed.");
        $row=$result2->fetch_assoc();
    }
    ?>

    <form action="" method="POST">
        <div class="form-group">
            <label for="pid"> Product ID </label>
            <input type="text" class="form-control" name="pid" id="pid"
                value="<?php if(isset($row['pid'])) {echo $row['pid']; }?>" readonly>
        </div>

        <div class="form-group">
            <label for="pname"> Date of Purchase </label>
            <input type="text" class="form-control" name="pname" id="pname"
                value="<?php if(isset($row['pname'])) {echo $row['pname'];}?>">
        </div>

        <div class="form-group">
            <label for="pdate"> Date of Purchase </label>
            <input type="date" class="form-control" name="pdop" id="pdate"
                value="<?php if(isset($row['pdop'])) {echo $row['pdop'];}?>">
        </div>

        <div class="form-group">
            <label for="pava"> Available </label>
            <input type="text" class="form-control" name="pava" id="pava" onkeypress="Isinputnumber(event)"
                value="<?php if(isset($row['pava'])) {echo $row['pava']; }?>">
        </div>

        <div class="form-group">
            <label for="ptotal"> Total </label>
            <input type="text" class="form-control" name="ptotal" id="ptotal" onkeypress="Isinputnumber(event)"
                value="<?php if(isset($row['ptotal'])) {echo $row['ptotal'];} ?>">
        </div>

        <div class="form-group">
            <label for="poriginalcost"> Original Cost Each </label>
            <input type="text" class="form-control" name="poriginalcost" id="poriginalcost"
                onkeypress="Isinputnumber(event)"
                value="<?php if(isset($row['poriginalcost'])) {echo $row['poriginalcost'];} ?>">
        </div>

        <div class="form-group">
            <label for="psellingcost"> Selling Cost Each </label>
            <input type="text" class="form-control" name="psellingcost" id="psellingcost"
                value="<?php if(isset($row['psellingcost'])) {echo $row['psellingcost']; }?>">
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-danger" id="pupdate" name="pupdate"> Update </button>
            <a href="assets.php" class="btn btn-secondary">close</a>
        </div>

        <?php if(isset($msg)){ echo $msg;} ?>
    </form>
</div>
<?php include('admin_footer.php');?>