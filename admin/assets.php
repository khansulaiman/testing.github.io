<?php
define ('TITLE', 'Assets');
Include ('admin_header.php');
Include ('../connection.php');
session_start();
if(isset ($_SESSION['admin_login']))
{
    $aEmail=$_SESSION['a_email'];
} else
{
    header("Location: login.php");
}
?>

<div class="col-sm-9 col-sm-10 mt-5 text-center">
    <p class="bg-dark text-white p2"> Products/Part details </p>
    <?php
    $sql= "SELECT * FROM assets";
    $result=mysqli_query($conn,$sql)or die("1st query failed");
    if(mysqli_num_rows($result)>0)
    {
        echo '<table class="table">';
            echo '<thead>';
                echo '<tr>';
                    echo '<th scope="col"> Product ID </th>';
                    echo '<th scope="col"> Name</th>';
                    echo '<th scope="col"> Dop </th>';
                    echo '<th scope="col"> Available </th>';
                    echo '<th scope="col"> Total </th>';
                    echo '<th scope="col"> Original Cost Each </th>';
                    echo '<th scope="col"> Selling Cost Each </th>';
                    echo '<th scope="col"> Action </th>';
                echo '</tr>';
            echo '</thead>';
        echo '<tbody>';

    while($row= $result->fetch_assoc())
    {
        echo '<tr>';
            echo '<td>' .$row["pid"]. '</td>';
            echo '<td>' .$row["pname"]. '</td>';
            echo '<td>' .$row["pdop"]. '</td>';
            echo '<td>' .$row["pava"]. '</td>';
            echo '<td>' .$row["ptotal"]. '</td>';
            echo '<td>' .$row["poriginalcost"]. '</td>';
            echo '<td>' .$row["psellingcost"]. '</td>';

            echo '<td>';
                echo '<form action="editproduct.php" class="d-inline" method="POST">';
                    echo '<input type="hidden" name="id" value='.$row["pid"].'>
                    <button type="submit" class="btn btn-info mr-3" name="edit" value="Edit"> <i class="fas fa-pen"> </i> </button>';
                echo '</form>';

                echo '<form action="" class="d-inline" method="POST">';
                    echo '<input type="hidden" name="id" value='.$row["pid"].'>
                    <button type="submit" class="btn btn-warning mr-3" name="delete" value="delete"> <i class="fas fa-trash"> </i> </button>';
                echo '</form>';

                echo '<form action="sellproduct.php" class="d-inline" method="POST">';
                    echo '<input type="hidden" name="id" value='.$row["pid"].'>
                    <button type="submit" class="btn btn-warning mr-3" name="issue" value="issue"> <i class="fas fa-handshake"> </i> </button>';
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
    <div class="text-center mt-5">
        <a href="addproduct.php" class="btn btn-secondary"><i class="fas fa-plus fa-1x"> </i> </a>
    </div>
</div>
</div>

<?php
   if(isset($_REQUEST['delete'])) 
   {
       $sql= "DELETE FROM assets WHERE pid = {$_REQUEST['id']}";
       if($conn->query($sql) == True)
       {
           echo '<meta http-equiv="refresh" content="0; URL=?deleted"/>';
       }
       else
       {
           echo 'Unable to DELETE';
       }
   }
   
   ?>



<?php include('admin_footer.php') ?>