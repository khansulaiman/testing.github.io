<?php
define('TITLE','Requester');
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

<div class="col-sm-8 col-md-10 mt-5  text-center">
    <img src="../image/requester.svg" alt="requester pic" style="width:100px; height:100px">
    <p class="bg-dark col-sm-12 text-white p-2"><b>List of Requesters</b></p>
    <?php
    $sql= "SELECT * FROM user_registration";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) > 0)
    {
        echo '<table class="table">';
            echo '<thead>';
                echo '<tr>';
                    echo '<th scope="col"> Requester id </th>';
                    echo '<th scope="col"> Name</th>';
                    echo '<th scope="col"> Email </th>';
                    echo '<th scope="col"> Action </th>';
                echo '</tr>';
            echo '</thead>';
        echo '</tbody>';
    
    while($row=mysqli_fetch_assoc($result))
    {
        echo '<tr>';
            echo '<td>' .$row["user_id"]. '</td>';
            echo '<td>' .$row["user_name"]. '</td>';
            echo '<td>' .$row["user_email"]. '</td>';

            echo '<td>';
                echo '<form action="editreqs.php" class="d-inline" method="POST">';
                    echo '<input type="hidden" name="id" value='.$row["user_id"].'>
                    <button type="submit" class="btn btn-dark mr-3" name="edit" value="Edit"> <i class="far fa-edit"></i></button>';
                echo '</form>';

                echo '<form action="" class="d-inline" method="POST">';
                    echo '<input type="hidden" name="id" value='.$row["user_id"].'>
                    <button type="submit" class="btn btn-dark mr-3" name="delete" value="delete"><i class="fas fa-trash-alt"></i></button>';
                echo '</form>';

            echo '</td>';
        echo '</tr>';
    }
        echo '</tbody>';
        echo '</table>';
   } 
   else
   {
       echo '0 result';
   }
   ?>
</div>

<!-- delete operation -->
<?php

if(isset($_REQUEST['delete'])){
    $d_id=$_REQUEST['id'];
    $sql2="DELETE from user_registration where user_id={$d_id}";
    $result2=mysqli_query($conn,$sql2);
    if($result2==TRUE){
        echo '<meta http-equiv="refresh" content="0;URL=?deleted"/>';
        
    }
    else{
        echo "Unable to Delete.";
    }
    
}
?>
<?php
include("admin_footer.php");
?>