<?php
session_start();
define('TITLE', 'Success');
include('admin_header.php');
include('../connection.php');

if(isset ($_SESSION['admin_login']))
{
    $aEmail=$_SESSION['a_email'];
} else
{
    echo"<script> location.href='login.php' </script>";
}

$sql= "SELECT * FROM customer WHERE cus_id={$_SESSION['myid']}";
$result = $conn->query($sql);
if($result==TRUE)
{
    $row= $result->fetch_assoc();
    echo "<div class='ml-5 mt-5'> <h3 class='text-center'> Customer Bill </h3>";

       echo' <table class="table">';
            echo"<tbody>";

                echo"<tr>";
                    echo"<th> Customer ID </th>";
                   echo" <td> ".$row['cus_id']." </td>";
                echo"</tr>";

                echo"<tr>";
                    echo"<th> Customer Name </th>";
                    echo"<td> ".$row['cus_name']." </td>";
                echo"</tr>";

                echo"<tr>";
                   echo"<th> Address </th>";
                    echo"<td> ".$row['cus_addr']." </td>";
               echo"</tr>";

                echo"<tr>";
                    echo"<th> Product </th>";
                    echo"<td> ".$row['cus_pname']." </td>";
                echo"</tr>";

                echo"<tr>";
                    echo"<th> Quantity </th>";
                    echo"<td> ".$row['cus_pquantity']." </td>";
                echo"</tr>";

                echo"<tr>";
                    echo"<th> Price Each   </th>";
                    echo"<td> ".$row['cus_peach']." </td>";
                echo"</tr>";

                echo"<tr>";
                    echo"<th> Total Cost </th>";
                   echo"<td> ".$row['cus_ptotal']." </td>";
                echo"</tr>";

                echo"<tr>";
                   echo"<th> Date </th>";
                    echo"<td> ".$row['cus_date']." </td>";
                echo"</tr>";

                echo"<tr>";
                    echo"<td> <form class='d-print-none'> <input class='btn btn-danger' type='submit' value='print' onClick='window.print()'></form></td>";
                    echo"<td> <a href='assets.php' class='btn btn-secondary d-print-none'>Close </a> </td>";
                 echo"</tr>";

                echo" </tbody>";
                 echo"</table>";
                echo "</div>";  
                }
                else
                {
                    echo "Failed";
                }
?>


<?php include('admin_footer.php');   ?>