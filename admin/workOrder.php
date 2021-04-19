<?php
define('TITLE','Work Order');
include("admin_header.php");
include("../connection.php");
session_start();
if(isset($_SESSION['admin_login']))
{
    $aEmail=$_SESSION['a_email'];
} else
{
   header("Location:login.php");
}
?>
<div class="col-sm-9 col-md-10 mt-5">
    <?php   
    $sql= "SELECT * FROM assignwork";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)> 0)
    {
        echo '<table class="table">';
        echo '<thead class="bg-primary">';
        echo '<tr>';
        echo '<th scope="col"> Req ID </th>';
        echo '<th scope="col"> Req Info </th>';
        echo '<th scope="col"> Name </th>';
        echo '<th scope="col"> Address </th>';
        echo '<th scope="col"> City </th>';
        echo '<th scope="col"> Mobile </th>';
        echo '<th scope="col"> technician </th>';
        echo '<th scope="col"> Assigned Date </th>';
        echo '<th scope="col"> Action </th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
            while ($row=mysqli_fetch_assoc($result))
            {
                echo '<tr>';
                    echo '<td>' .$row['reqs_id'].'</td>';
                    echo '<td>' .$row['reqs_info']. '</td>';
                    echo '<td>' .$row['reqs_name']. '</td>';
                    echo '<td>' .$row['reqs_address'].'</td>';
                    echo '<td>' .$row['reqs_city']. '</td>';
                    echo '<td>' .$row['reqs_phone']. '</td>';
                    echo '<td>' .$row['assign_tech']. '</td>';
                    echo '<td>' .$row['assign_date']. '</td>';
                    echo '<td>';
                        echo '<form action="viewassignwork.php" method="POST" class="d-inline mr-2">';
                            echo '<input type="hidden" name="id" value='.$row['reqs_id'].'><button class="btn btn-warning" name="view" value="view" type="submit">
                                <i class="fa fa-eye"> </i> </button>';
                                echo '</form>';

                                echo '<form action="" method="POST" class="d-inline">';
                                    echo '<input type="hidden" name="id" value='.$row['reqs_id'].'><button class="btn btn-secondary" name="delete" value="delete" type="submit">
                                        <i class="fa fa-trash-alt"> </i> </button>';
        
                        
                                echo '</form>';
                                echo '</td>';
                    echo '</tr>';
            }
            echo '</tbody>';
        echo '</table>';
    } else
    {
        echo '0 result';
    }

    if(isset($_REQUEST['delete']))
    {
         echo $sql= "DELETE FROM assignwork WHERE reqs_id ={$_REQUEST['id']}";
         
        if(mysqli_query($conn,$sql) == True)
        {
            echo '<meta http-equiv="refresh" content="0;URL=?deleted"/>';
        }else
        {
            echo "Unable to delete Date";
        }
    }

    ?>

    <?php include("admin_footer.php") ?>









<?php

include("admin_footer.php");

?>