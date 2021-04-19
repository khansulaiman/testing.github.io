<?php
define('TITLE','Service Status');
include("../header/header.php");
include("../connection.php");
session_start();
if($_SESSION['is_login'])
{
    $rEmail=$_SESSION['remail'];
} else
{
   header("Location:user_login.php");
}
?>

<div class="col-sm-6 mt-5 mx-3">
    <form action="" method="POST" class="form-inline">
        <div class="form-group mr-3">
            <label for="checkid"> Enter request id: </label>
            <input type="text" class="form-control" name="checkid" id="checkid" onkeypress="isinputnumber(event)">
        </div>
        <button type="submit" class="btn btn-danger"> Search </button>
    </form>

    <?php
            if(isset($_REQUEST['checkid']))
            { 
                if($_REQUEST['checkid']=="")
                {
                    $msg= '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> fill all fields </div>';
                }else
                {
                    $sql= "SELECT * FROM assignwork WHERE reqs_id= {$_REQUEST['checkid']}";
                    $result=mysqli_query($conn,$sql)or die("Query faild.");
                    $row=mysqli_fetch_assoc($result);
                   if(!empty($row['reqs_id'])){
                ?>
    <h3 class="text-center mt-5"> Assigned Work details </h3>
    <table class="table table-bordered">
        <tbody>
            <tr>
                <td> Request Id </td>
                <td>
                    <?php if(isset($row['reqs_id'])) {echo $row['reqs_id'];} ?>
                </td>
            </tr>

            <tr>
                <td> Request Info </td>
                <td>
                    <?php if(isset($row['reqs_info'])){
                    echo $row['reqs_info'];
                    } ?>
                </td>
            </tr>

            <tr>
                <td> Request Description </td>
                <td>
                    <?php if(isset($row['reqs_desc'])){ echo $row['reqs_desc'];} ?>
                </td>
            </tr>

            <tr>
                <td> name </td>
                <td>
                    <?php if(isset($row['reqs_name'])){echo $row['reqs_name'];} ?>
                </td>
            </tr>

            <tr>
                <td> Adress line 1 </td>
                <td>
                    <?php if(isset($row['reqs_address'])) {echo $row['reqs_address'];} ?>
                </td>
            </tr>

            <tr>
                <td> city </td>
                <td>
                    <?php if(isset($row['reqs_city'])) {echo $row['reqs_city'];} ?>
                </td>
            </tr>

            <tr>
                <td> Zip </td>
                <td>
                    <?php if(isset($row['reqs_zip'])) {echo $row['reqs_zip'];} ?>
                </td>
            </tr>

            <tr>
                <td> Email </td>
                <td>
                    <?php if(isset($row['reqs_email'])) {echo $row['reqs_email'];} ?>
                </td>
            </tr>

            <tr>
                <td> Mobile </td>
                <td>
                    <?php if(isset($row['reqs_phone'])) {echo $row['reqs_phone'];} ?>
                </td>
            </tr>

            <tr>
                <td> Assigned date </td>
                <td>
                    <?php if(isset($row['assign_date'])) {echo $row['assign_date'];} ?>
                </td>
            </tr>

            <tr>
                <td> technician name </td>
                <td>
                    <?php if(isset($row['assign_tech'])) {echo $row['assign_tech'];} ?>
                </td>
            </tr>

            <tr>
                <td> Customer Sign </td>
                <td> </td>
            </tr>

            <tr>
                <td> technician Sign </td>
                <td> </td>
            </tr>


        </tbody>
    </table>

    <div class="text-center">
        <form action="" class="mb-3 d-print-none">
            <input class="btn btn-danger" type="submit" value="print" onclick="window.print()">
            <input class="btn btn-secondary" type="submit" value="close">
        </form>
    </div>
    <?php 
    }else{
        echo '<div class="alert alert-info mt-4"> your request is still pending </div>'; 
    }
}
}  
    ?>

    <?php if(isset($msg)){ echo $msg;} ?>
</div>

<script>
    function isinputnumber(evt) {
        var ch = String.fromCharCode(evt.which);
        if (!(/[0-9]/.test(ch))) {
            evt.preventDefault();
        }
    }
</script>
<?php
include("../footer/footer.php");
?>