<?php
define('TITLE','Technision');
include("admin_header.php");
include("../connection.php");
session_start();
if(isset ($_SESSION['admin_login']))
{
    $aEmail=$_SESSION['a_email'];
} else
{
    header("Location:login.php");
}
?>
<div class="col-sm-9 col-sm-10 mt-5 text-center">
    <img src="../image/supervisor.svg" alt="not display" style="width:100px; height:100px">
    <p class="bg-dark text-white py-2"> List of Technician </p>
    <?php
    $sql= "SELECT * FROM technicion";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)> 0)
    {
        echo '<table class="table">';
            echo '<thead>';
                echo '<tr>';
                    echo '<th scope="col"> EMP </th>';
                    echo '<th scope="col"> Name</th>';
                    echo '<th scope="col"> Email </th>';
                    echo '<th scope="col"> Phone </th>';
                    echo '<th scope="col"> city </th>';
                    echo '<th scope="col"> Action </th>';
                echo '</tr>';
           echo '</thead>';
        echo '</tbody>';
    
    while($row=mysqli_fetch_assoc($result))
    {
        echo '<tr>';
            echo '<td>' .$row["emp_id"]. '</td>';
            echo '<td>' .$row["emp_name"]. '</td>';
            echo '<td>' .$row["emp_email"]. '</td>';
            echo '<td>' .$row["emp_phone"]. '</td>';
            echo '<td>' .$row["emp_city"]. '</td>';
            echo '<td>';
                echo '<form action="editemp.php" class="d-inline" method="POST">';
                    echo '<input type="hidden" name="id" value='.$row["emp_id"].'>
                    <button type="submit" class="btn btn-info mr-3" name="edit" value="Edit"> <i class="fas fa-pen"> </i> </button>';
                echo '</form>';

                echo '<form action="" class="d-inline" method="POST">';
                    echo '<input type="hidden" name="id" value='.$row["emp_id"].'>
                    <button type="submit" class="btn btn-secondary mr-3" name="delete" value="delete"> <i class="fas fa-trash"> </i> </button>';
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
   <div>
    <div class="text-center">
        <a href="insertemp.php" class="btn btn-secondary"><i class="fas fa-plus fa-1x"> </i> </a>
    </div>
</div>
</div>

<?php
   if(isset($_REQUEST['delete'])) 
   {
       $sql2= "DELETE FROM technicion WHERE emp_id={$_REQUEST['id']}";
       if(mysqli_query($conn,$sql2)== True)
       {
           echo '<meta http-equiv="refresh" content="0; URL=?deleted"/>';
       }
       else
       {
           echo 'Unable to DELETE';
       }
   }
   ?>
   


<?php

include("admin_footer.php");

?>