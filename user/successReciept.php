<?php
define('TITLE','Receipt');
$id=$_GET['id'];
include("../connection.php");
include("../header/header.php");
$sql="SELECT * from submit_reqst where reqs_id={$id}";
$result=mysqli_query($conn,$sql)or die("Query faild.");
if($result==TRUE){
    while($row=mysqli_fetch_assoc($result)){
        $reqs_id=$row['reqs_id'];
        $reqs_name=$row['reqs_name'];
        $reqs_email=$row['reqs_email'];
        $reqs_info=$row['reqs_info'];
    }
}
?>
<div class="col-md-6 col-sm-12 mx-5 mt-5">
<table class="table table-striped">
  
    <tr>
      <th>Request ID</th>
      <td><?php echo $reqs_id; ?></td>
    </tr>

    <tr>
    <th>Name</th>
      <td><?php echo $reqs_name; ?></td>
    </tr> 

    <tr>
    <th>Email ID</th>
      <td><?php echo $reqs_email; ?></td>
    </tr>
    
    <tr>
    <th>Request information</th>
      <td><?php echo $reqs_info; ?></td>
    </tr>
</table>
<button type="button" class="btn btn-outline-danger btn-lg" onClick='window.print()' id="print">Print</button></div>
<?php
include("../footer/footer.php");
?>