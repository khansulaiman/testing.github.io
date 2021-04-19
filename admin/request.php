<?php
define('TITLE','Request');
include("../connection.php");
include("admin_header.php");
session_start();
if(isset ($_SESSION['admin_login'])){
    $aEmail=$_SESSION['a_email'];
}
else{
    header("login.php");
}
?>
<!-- Sidebar -->
<div class="col-sm-4" mb-5>
<?php
$sql= "SELECT reqs_id, reqs_info, reqs_desc, reqs_date from submit_reqst";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
 while($row=mysqli_fetch_assoc($result))
{
    echo '<div class="card mt-5 mx-5">';
        echo '<div class="card-header">';
            echo 'Request ID:' . $row ['reqs_id'];
            echo '</div>';
            echo '<div class="card-body">';
                echo '<h5 class="card-title"> Request info:' .$row ['reqs_info'];
                    echo '</h5>';
                    echo '<p class="card-text">' .$row['reqs_desc'];
                        echo '</p>';
                        echo '<p class="card-text"> Request Date: '.$row ['reqs_date'];
                            echo '</p>';
                            echo '<div class="float-right">';
                                echo '<form action="'.$_SERVER['PHP_SELF'].'" method="POST">';
                                    echo '<input type="hidden" name="id" value='.$row["reqs_id"].'>';
                                echo '<input type="submit" class="btn btn-danger" value="view" name="view" >';
                                echo '<input type="submit" class="btn btn-secondary mx-2" value="close" name="close">';
                                echo '</form>';
                        echo '</div>'; 
                        echo '</div>';
                        echo '</div>';
}}
else{
    echo '<div class="col-sm-6 mt-5 alert alert-primary">No request Submit now</div>';
}
?>
</div>
<!-- End Sidebar     -->
<!-- WorkAssignForm -->

<?php
include("../connection.php");
if(isset($_POST['view']))
{
$sql="SELECT * FROM submit_reqst WHERE reqs_id={$_POST['id']}";
$result=mysqli_query($conn,$sql) or die("Query faild.");
$row=mysqli_fetch_assoc($result);
}
// Close btn
if(isset($_POST['close'])){
    echo $sql2="DELETE FROM submit_reqst WHERE reqs_id={$_POST['id']}";
    $result2=mysqli_query($conn,$sql2)or die("Delete query faild.");
    if($result2==True){
        echo '<meta http-equiv="refresh" content="0;url=?closed" />';   
     }
}
// Assignwork btn
if(isset($_POST['assign'])){
if($_POST['requester_info']==""||$_POST['requester_desc']==""||$_POST['requester_name']==""||
$_POST['requester_address']==""||$_POST['requester_city']==""||$_POST['requester_zip']==""||
$_POST['requester_email']==""||$_POST['requester_info']==""||$_POST['requester_phone']==""||
$_POST['assign_tech']==""||$_POST['assign_date']==""){
    $msg='<div class="alert alert-warning col-sm-12">All Field are required.</div>';
}
else{
$sql3="INSERT INTO assignwork(reqs_id,reqs_info,reqs_desc,reqs_name,reqs_address,reqs_city,reqs_zip,reqs_email,reqs_phone,assign_tech,assign_date)
values({$_POST['requester_id']},'{$_POST['requester_info']}','{$_POST['requester_desc']}','{$_POST['requester_name']}','{$_POST['requester_address']}','{$_POST['requester_city']}',{$_POST['requester_zip']},'{$_POST['requester_email']}',{$_POST['requester_phone']},'{$_POST['assign_tech']}','{$_POST['assign_date']}')";
$result3=mysqli_query($conn,$sql3) or die("Assign_work query field");
if($result3==TRUE){
    $msg='<div class="alert alert-success col-sm-12">Work assigned successfully./div>';
}
else{
    $msg='<div class="alert alert-danger col-sm-12">Unable to assigned./div>';

}
}}
?>
<div class="col-sm-5 mt-5 jumbotron">
    <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
        <h5 class="text-center"> Assign Work Order Request </h5>
        <div class="form-group">
            <label for="request_id"> Request ID </label>
            <input type="text" class="form-control" id="request_id" name="requester_id" value="<?php if(isset($_POST['id'])){
              echo $_POST['id'];
            }
              ?>"
            readonly>
        </div>
        <div class="form-group">
            <label for="request_info"> request Info </label>
            <input type="text" class="form-control" id="request_info" name="requester_info" value="<?php if(isset($row['reqs_info']))
                echo $row['reqs_info'];?>">
        </div>
        <div class="form-group">
            <label for="requestdesc"> Description </label>
            <input type="text" class="form-control" id="requestdesc" name="requester_desc" value="<?php if(isset($row['reqs_desc']))
                    echo $row['reqs_desc'];?>">
        </div>

        <div class="form-group">
            <label for="requestername"> NAME </label>
            <input type="text" class="form-control" id="requestername" name="requester_name" value="<?php if(isset($row['reqs_name']))
                        echo $row['reqs_name'];?>">
        </div>

            <div class="form-group">
                <label for="address1"> Address</label>
                <input type="text" class="form-control" id="address1" name="requester_address" value="<?php if(isset($row['reqs_address']))
                                echo $row['reqs_address'];?>">
            </div>
            

        <div class="form-row">
            <div class="form-group col-md-8">
                <label for="requestercity">City</label>
                <input type="text" class="form-control" id="requestercity" name="requester_city" value="<?php if(isset($row['reqs_city']))
                                                        echo $row['reqs_city'];?>">
            </div>

            <div class="form-group col-md-4">
                <label for="requesterzip">Zip code</label>
                <input type="text" class="form-control" id="requesterzip" name="requester_zip" value="<?php if(isset($row['reqs_zip']))
                                                            echo $row['reqs_zip'];?>"
                    onkeypress="isinputnumber(event)">
            </div>
           </div> 

            <div class="form-row">
            <div class="form-group col-md-6">
                <label for="requesteremail">Email</label>
                <input type="text" class="form-control" id="requesteremail" name="requester_email" value="<?php if(isset($row['reqs_email']))
                                            echo $row['reqs_email'];?>">
            </div>
            <div class="form-group col-md-6">
                <label for="requesterphone">Phone</label>
                <input type="text" class="form-control" id="requesterphone" name="requester_phone" value="<?php if(isset($row['reqs_phone']))
                                        echo $row['reqs_phone'];?>">
            </div>
        </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="assignteach"> assign to technician </label>
                    <input type="text" class="form-control" id="assignteach" name="assign_tech">
                </div>

                <div class="form-group col-md-6">
                    <label for="inputdate"> Date </label>
                    <input type="date" class="form-control" id="inputdate" name="assign_date">
                </div>
            </div>

            <div class="float-right">
                <button type="submit" class="btn btn-success" name="assign"> Assign </button>
                <button type="reset" class="btn btn-secondary"> reset </button>
                
            </div>
            <?php if(isset($msg)){ echo $msg;} ?>
    </form>
</div>

<!-- End WorkAssignForm -->
<?php

include("admin_footer.php");

?>