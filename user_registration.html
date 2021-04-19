<?php
$conn=mysqli_connect("localhost","root","","foha") or die("connection failed!");
// cheak if signup button is click or not
if(isset($_POST['rsignup'])){
  // Cheak empty field
  if($_POST['rname']==""||$_POST['remail']==""||$_POST['rpassword']=="")
  {
   $msg='<div class=" alert alert-warning mt-2" role="alert">All feilds are required.</div>';
  }
  else{
     $user_name=$_POST['rname'];
     $user_email=$_POST['remail'];
     $user_password=$_POST['rpassword'];
    //  Compair email id with current feild
     $sql1="SELECT user_email from user_registration where user_email='$user_email'";
     $result1=mysqli_query($conn,$sql1)or die("Compairing query failed");
     if(mysqli_num_rows($result1)>0){
      $msg='<div class=" alert alert-warning mt-2" role="alert">All ready Registered this user</div>';
     }
     else{
      $sql2="INSERT INTO user_registration(user_name,user_email,user_password)values('$user_name','$user_email','$user_password')";
      $result2=mysqli_query($conn,$sql2)or die("result query failed.");
      if($result2==true){
        $msg='<div class=" alert alert-success mt-2" role="alert">your data successfully inserted.</div>';
      }
     }
    
  }
}

?>
<div class="container pt-5" id="registration">
    <h2 class="text-center"> Create an Account</h2>
    <hr style="width:270px; border-top:groove 3px rgb(85, 83, 83);">
    <div class="row mt-4 mb-4">
      <div class="col-md-6 offset-md-3" >
        <form action="<?php $_SERVER['PHP_SELF']; ?>" class="shadow-lg p-4" method="POST">
          <div class="form-group">
            <i class="fas fa-user"> </i> <label for="email" class="font-weight-bold pl-2">
              Name</label> <input type="text" class="form-control" placeholder="Name" name="rname" required>
          </div>
          <div class="form-group">
            <i class="fas fa-envelope"> </i> <label for="email" class="font-weight-bold pl-2">
              Email</label> <input type="email" class="form-control" placeholder="email" name="remail" required>
            <small class="form-text"> Well never share your email with anyone else </small>
          </div>
          <div class="form-group">
            <i class="fas fa-unlock-alt"> </i> <label for="pass" class="font-weight-bold pl-2">
              New password</label> <input type="password" class="form-control" placeholder="password" name="rpassword" required>
          </div>
          <button type="submit" class="btn btn-danger mt-5 btn-block shadow-sm font-weight-bold" name="rsignup"> SignUp
          </button>
          <em style="font-size:10px;"> Note by clicking signup, you agree to our teram, data policy and cokiee
            policy </em>
            <?php
               if(!empty($msg)){
                 echo $msg;
               }
            ?>
        </form>
      </div>
    </div>
  </div>
