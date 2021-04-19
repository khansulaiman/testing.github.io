<?php
define('TITLE', 'SubmitRequest');
include("../header/header.php");
include("../connection.php");
session_start();
if($_SESSION['is_login']){
    $reqs_email=$_SESSION['remail'];
}
else{
    header("Location:../user_registration.php");
}
if(isset($_POST['submitReqs'])){
    if($_POST['requestinfor']==""||$_POST['requestdesc']==""||$_POST['requestername']==""||
    $_POST['requestaddress']==""||$_POST['requestorcity']==""||$_POST['requestorzip']==""||
    $_POST['requestoremail']==""||$_POST['requestorphone']==""||$_POST['requestdate']==""){
        $msg='<div class="alert alert-warning col-md-12 text-center" role="alert">All feild required</div>';
    }
    else{
        $reqs_info=$_POST['requestinfor'];
        $reqs_desc=$_POST['requestdesc'];
        $reqs_name=$_POST['requestername'];
        $reqs_address=$_POST['requestaddress'];
        $reqs_city=$_POST['requestorcity'];
        $reqs_zip=$_POST['requestorzip'];
        $reqs_email=$_POST['requestoremail'];
        $reqs_phone=$_POST['requestorphone'];
        $reqs_date=$_POST['requestdate'];

        $sql="INSERT into submit_reqst(reqs_info,reqs_desc,reqs_name,reqs_address,reqs_city,reqs_zip,reqs_email,reqs_phone,reqs_date)
        values('{$reqs_info}','{$reqs_desc}','{$reqs_name}','{$reqs_address}','{$reqs_city}',{$reqs_zip},'{$reqs_email}','{$reqs_phone}','{$reqs_date}')";
        $result=mysqli_query($conn,$sql)or die("1st Query faild.");
        if($result==True){
            $msg='<div class="alert alert-success col-md-12 text-center" role="alert">your record inserted succesfuly.</div>';
           $sql2="SELECT * from submit_reqst where reqs_email='{$reqs_email}'";
           $result2=mysqli_query($conn,$sql2) or die("second query failed.");
           if($result2==True)
           {
               while($row=mysqli_fetch_assoc($result2)){
                  $id=$row['reqs_id'];
               }
           }
            header("Location:successReciept.php?id=$id");

        }
    }
}
?>
<div class="col-sm-9 col-md-9 ml-5">
<!-- User requist form     -->
<form action="<?php  echo $_SERVER['PHP_SELF']?>" method="POST">
    <div class="form-group">
        <label for="inputRequestinfo">Request information</label>
        <input type="text" class="form-control" id="inputRequestinfo" placeholder="Request Information" name="requestinfor">
    </div>
    <div class="form-group">
        <label for="inputRequestDescribtion">Describtion</label>
        <input type="text" class="form-control" id="inputRequestDescribtion" placeholder="Describtion" name="requestdesc">
    </div>
    <div class="form-group">
        <label for="inputName">Name</label>
        <input type="text" class="form-control" id="inputName" placeholder="Enter your name" name="requestername">
    </div>
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="inputAddress">Address</label>
            <input type="text" class="form-control" id="inputAddress" placeholder="Enter Address here" name="requestaddress" >
        </div>

    </div>
    <div class="form-row">
        <div class="form-group col-sm-6 col-md-6">
            <label for="inputcity">City</label>
            <input type="text" class="form-control" id="inputcity" placeholder="Enter your city name" name="requestorcity">
        </div>
        <div class="form-group col-sm-6 col-md-6">
            <label for="inputzip">Zip</label>
            <input type="text" class="form-control" placeholder="Enter zip code" name="requestorzip" id="inputzip">
        </div>
        
    </div>
    <div class="form-row">
        <div class="form-group col-sm-6 col-md-6">
            <label for="inputAddress">Email</label>
            <input type="email" class="form-control" id="inputEmail" placeholder="someone@gmail.com" name="requestoremail">
        </div>
        <div class="form-group col-sm-3 col-md-3">
            <label for="inputphone">Phone</label>
            <input type="text" class="form-control" id="inputphone" placeholder="Phone#" name="requestorphone">
        </div>
        <div class="form-group col-sm-3 col-md-3">
            <label for="inputdate">Date</label>
            <input type="date" class="form-control" id="inputdate" placeholder="Date" name="requestdate">
        </div>
        
    </div>
    <div>
    <button type="submit" class="btn btn-primary btn-block" name="submitReqs">Submit</button>
    </div>
    <?php  if(isset($msg)){
        echo $msg;
    } ?>
</form>
</div>
<?php
include("../footer/footer.php");
?>