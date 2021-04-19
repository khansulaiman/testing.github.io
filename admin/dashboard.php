<?php
            define('TITLE','Dashboard');
            include("../connection.php");
            session_start();
            if($_SESSION['admin_login']){
            $uemail=$_SESSION['a_email'];
            }
            else
            {
              header("Location:login.php");
            }
            $sql="SELECT reqs_id,reqs_name,reqs_email from submit_reqst";
             $result1=mysqli_query($conn,$sql) or die("Query faild.");
             if(mysqli_num_rows($result1)>=0){
?>
     <?php include("admin_header.php"); ?>
               <!-- 2nd colomn -->
               <div class="col-sm-9 col-md-10">
    <div class="row mx-5">
        <div class="col-sm-4 mt-5">
            <div class="card text-white border-primary mb-3 text-center" style="max-width: 18rem;">
                <div class="card-header text-primary">Requests Recieved</div>
                <div class="card-body text-primary">
                    <?php
                      $sql2="SELECT max(reqs_id) from submit_reqst";
                      $result2=mysqli_query($conn,$sql2);
                      $row=mysqli_fetch_row($result2);
                      $old=$row[0];
                    ?>
                    <h5 class="card-title"><?php echo $old;?></h5>
                    <p class="card-text">Veiw</p>
                </div>
            </div>
        </div>

        <div class="col-sm-4 mt-5">
            <div class="card text-white bg-info mb-3 text-center" style="max-width: 18rem;">
                <div class="card-header">Assignwork work</div>
                <div class="card-body">
                <?php
                      $sql3="SELECT max(A_id) from assignwork";
                      $result3=mysqli_query($conn,$sql3);
                      $row=mysqli_fetch_row($result3);
                    ?>
                    <h5 class="card-title"><?php  echo $row[0];?></h5>
                    <p class="card-text">Veiw</p>
                </div>
            </div>
        </div>

        <div class="col-sm-4 mt-5">
            <div class="card text-white border-primary mb-3 text-center" style="max-width: 18rem;">
                <div class="card-header text-primary">No of Technician</div>
                <div class="card-body text-primary">
                <?php
                      $sql4="SELECT emp_id from technicion";
                      $result4=mysqli_query($conn,$sql4);
                      $count=mysqli_num_rows($result4);
                    ?>
                    <h5 class="card-title"><?php echo $count;?></h5>
                    <p class="card-text">Veiw</p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Start table -->
    <div class="row mt-4">
    <div class="col-sm-11 col-md-11 mx-5">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th class="text-center" colspan="3">List of Requesters</th>
                </tr>
            </thead>
            <tbody>
                <tr class="text-center">
                    <th>Request ID</th>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
               <?php while($row=mysqli_fetch_assoc($result1)){ 
                 echo'<tr class="text-center">
                    <td>
                    '.$row['reqs_id'].'
                    </td>
                    <td>
                    '.$row['reqs_name'].'
                    </td>
                    <td>
                    '.$row['reqs_email'].'
                    </td>
                </tr>';
                    }
                    }
                ?>
            </tbody>
        </table>
        </div>
    </div>
</div>
            <!-- End 2nd column -->
            <!-- End of row -->
        <?php include("admin_footer.php"); ?>