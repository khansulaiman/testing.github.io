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
if(isset($_POST['send'])){
    if($_POST['feedback']==""){
        $msg="<div class='alert alert-warning'>Fill the feild.</div>";
    }
    else{
    $sql="SELECT user_name From user_registration where user_email='{$uemail}'" or die("during the writing.");
        $result=mysqli_query($conn,$sql) or die("Query faild.");
            if(mysqli_num_rows($result)>=1){
            while($row=mysqli_fetch_assoc($result)){
                $name=$row['user_name'];
            }
        } 
        $feedack=$_POST['feedback'];
        $sql2="INSERT into feedback_tb(f_name,feedback_stat)value('$name','$feedack')";
        $result2=mysqli_query($conn,$sql2) or die("feedback query faild.");
        $msg="<div class='alert alert-success'>Thanks for the feedback.</div>";

    }
}
    else{
        $sql="SELECT user_name From user_registration where user_email='{$uemail}'" or die("during the writing.");
        $result=mysqli_query($conn,$sql) or die("Query faild.");
            if(mysqli_num_rows($result)>=1){
            while($row=mysqli_fetch_assoc($result)){
                $name=$row['user_name'];
            }
        }        
    }
    
?>
   <div class="col-sm-6 col-md-6">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="mt-5 mx-5">
      <div class="form-group">
       <label for="yourname">Name</label>
       <input type="text" name="username" id="yourname" class="form-control" value="<?php echo $name ?>" readonly>
     </div>
     <div class="form-group">
      <label for="inputfeedback">Enter your Feedback</label><br>
      <textarea name="feedback" id="inputfeedback" cols="70" rows="3"></textarea>
    </div>
    <button type="submit" name="send" class="btn btn-danger mr-4 mt-4">Send</button>
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