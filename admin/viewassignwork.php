<?php
define('TITLE', 'Work Order');
Include('admin_header.php');
Include('../connection.php');

session_start();
if(isset($_SESSION['admin_login']))
{
    $aEmail=$_SESSION['a_email'];
} else
{
    header("Location:login.php");
}
?>

<div class="col-sm-6 mt-5 mx-3">
    <h3 class="text-center"> Assigned Work details </h3>
    <?php
    if(isset($_REQUEST['view']))
    {
         $sql= "SELECT * from assignwork WHERE reqs_id ={$_REQUEST['id']}";
        $result =mysqli_query($conn,$sql);
        $row= mysqli_fetch_assoc($result);
         ?>

    <table class="table table-bordered">
        <tbody>
            <tr>
                <td> Request Id </td>
                <td>
                    <?php if(isset($row['reqs_id'])) echo $row['reqs_id'];} ?>
                </td>
            </tr>

            <tr>
                <td> Request Info </td>
                <td>
                    <?php if(isset($row['reqs_info'])) {echo $row['reqs_info'];} ?>
                </td>
            </tr>

            <tr>
                <td> Request Description </td>
                <td>
                    <?php if(isset($row['reqs_desc'])) {echo $row['reqs_desc'];} ?>
                </td>
            </tr>

            <tr>
                <td> name </td>
                <td>
                    <?php if(isset($row['reqs_name'])) {echo $row['reqs_name'];} ?>
                </td>
            </tr>

            <tr>
                <td> Adress line 1 </td>
                <td>
                    <?php if(isset($row['reqs_address'])) {echo $row['reqs_address'];} ?>
                </td>
            </tr>

            <tr>
                <td> city </td>
                <td>
                    <?php if(isset($row['reqs_city'])) {echo $row['reqs_city'];} ?>
                </td>
            </tr>

            <tr>
                <td> pin code </td>
                <td>
                    <?php if(isset($row['reqs_zip'])) {echo $row['reqs_zip'];} ?>
                </td>
            </tr>

            <tr>
                <td> Email </td>
                <td>
                    <?php if(isset($row['reqs_email'])) {echo $row['reqs_email'];} ?>
                </td>
            </tr>

            <tr>
                <td>Phone</td>
                <td>
                    <?php if(isset($row['reqs_phone'])) {echo $row['reqs_phone'];} ?>
                </td>
            </tr>

            <tr>
                <td> Assigned date </td>
                <td>
                    <?php if(isset($row['assign_date'])) {echo $row['assign_date'];} ?>
                </td>
            </tr>

            <tr>
                <td> technician name </td>
                <td>
                    <?php if(isset($row['assign_tech'])) {echo $row['assign_tech'];} ?>
                </td>
            </tr>

            <tr>
                <td> Customer Sign </td>
                <td> </td>
            </tr>

            <tr>
                <td> technician Sign </td>
                <td> </td>
            </tr>


        </tbody>
    </table>

    <div class="text-center">
        <form action="" class="mb-3 d-print-none d-inline">
            <input class="btn btn-danger" type="submit" value="print" onclick="window.print()">
        </form>
        <form action="workOrder.php" class="mb-3 d-print-none d-inline"> <input class="btn btn-secondary" type="submit"
                value="close">
        </form>
    </div>
     
</div>




<?php include ('admin_footer.php')   ?>