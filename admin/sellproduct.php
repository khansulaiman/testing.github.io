<?php
define('TITLE', 'Sell  Product');
include('admin_header.php');
include('../connection.php');

session_start();
if(isset ($_SESSION['admin_login']))
{
    $aEmail=$_SESSION['a_email'];
} else
{
    header('Location:login.php');
}

if(isset($_REQUEST['psubmit']))
    {
        if($_REQUEST['cname']==""||$_REQUEST['cadd']==""||$_REQUEST['pname']==""||$_REQUEST['pquantity']==""
        ||$_REQUEST['psellingcost']==""||$_REQUEST['totalcost']==""||$_REQUEST['selldate']=="")
        {
            $msg='<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fields </div>';
        }
        else
        {
            $pid=$_REQUEST['pid'];
            $pava=$_REQUEST['pava'] -$_REQUEST['pquantity'];
            $custname=$_REQUEST['cname'];
            $cusadd=$_REQUEST['cadd'];
            $cpname = $_REQUEST['pname'];
            $cpquantity = $_REQUEST['pquantity'];
            $cpeach = $_REQUEST['psellingcost'];
            $cptotal = $_REQUEST['totalcost'];
            $cpdate = $_REQUEST['selldate'];

            $sql="INSERT INTO customer(cus_name, cus_addr, cus_pname, cus_pquantity, cus_peach, cus_ptotal, cus_date) VALUES 
            ('$custname','$cusadd', '$cpname',$cpquantity,$cpeach,$cptotal,'$cpdate')";
            if($conn->query($sql)== True) 
            {
                echo $genid= mysqli_insert_id($conn);
                $_SESSION['myid']= $genid;
        
                echo "<script> location.href = 'productsellsuccess.php';</script>";
            }
            
             $sqlup= "UPDATE assets SET pava = '$pava' WHERE pid = '$pid'";
             $conn->query($sqlup);
                
            }
        }
?>

<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center"> Customer Bill </h3>
    <?php
    if(isset($_REQUEST['issue']))
    {
        $sql= "SELECT * FROM assets WHERE pid = {$_REQUEST['id']}";
        $result=$conn->query($sql);
        $row=$result->fetch_assoc();
    }
    ?>

    <form action="" method="POST">
        <div class="form-group">
            <label for="pid"> Product ID </label>
            <input type="text" class="form-control" name="pid" id="pid"
                value="<?php if(isset($row['pid'])) {echo $row['pid'];} ?>" readonly>
        </div>

        <div class="form-group">
            <label for="cname"> Customer Name </label>
            <input type="text" class="form-control" name="cname" id="cname">
        </div>

        <div class="form-group">
            <label for="cadd"> Customer Address </label>
            <input type="text" class="form-control" name="cadd" id="cadd">
        </div>

        <div class="form-group">
            <label for="pname"> Product Name </label>
            <input type="text" class="form-control" name="pname" id="pname" onkeypress="Isinputnumber(event)"
                value="<?php if(isset($row['pname'])) {echo $row['pname'];} ?>">
        </div>

        <div class="form-group">
            <label for="pava"> Available </label>
            <input type="text" class="form-control" name="pava" id="pava" onkeypress="Isinputnumber(event)"
                value="<?php if(isset($row['pava'])) {echo $row['pava'];} ?>" readonly>
        </div>

        <div class="form-group">
            <label for="pquantity"> Quantity </label>
            <input type="text" class="form-control" name="pquantity" id="pquantity" onkeypress="Isinputnumber(event)">
        </div>
        
        <div class="form-group">
            <label for="psellingcost"> Price Each </label>
            <input type="text" class="form-control" name="psellingcost" id="psellingcost"
                onkeypress="Isinputnumber(event)" value="<?php if(isset($row['psellingcost'])) {echo $row['psellingcost'];} ?>">
        </div>

        <div class="form-group">
            <label for="totalcost"> Total Price </label>

            <!-- HERE is problem we jason here -->
            <input type="text" class="form-control" name="totalcost" id="totalcost"  onkeypress="Isinputnumber(event);">
        </div>

        <div class="form-group col-md-4">
            <label for="inputdate"> Date </label>
            <input type="date" class="form-control" name="selldate" id="inputdate">
        </div>



        <div class="text-center">
            <button type="submit" class="btn btn-danger" id="psubmit" name="psubmit"> Submit </button>
            <a href="assets.php" class="btn btn-secondary"> close </a>
        </div>

        <?php if(isset($msg)) { echo $msg;}  ?>

    </form>
</div>

<script>
    function isInputNumber(evt){
        var ch = string.fromCharCode(evt.which);
        if(!(/[0-9]/.test(ch))) {
            evt.preventDefault();
        }
    }
</script>

<?php include('admin_footer.php'); ?>