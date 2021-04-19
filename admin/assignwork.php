<?php
include("../connection.php");
if(isset($_POST['view']))
{
$sql="SELECT * FORM submit_reqst WHERE reqs_id={$_POST['id']}";
$result=mysqli_query($conn,$sql) or die("Query faild.");
$row=mysqli_fetch_assoc($result);
}


?>
<div class="col-sm-5 mt-5 jumbotron">
    <form action="<?php $_SERVER['PHP_SELF'];" method="post">
        <h5 class="text-center"> Assign Work Order Request </h5>
        <div class="form-group">
            <label for="request_id"> Request ID </label>
            <input type="text" class="form-control" id="request_id" name="request_id" value="<?php if(isset($row['request_id']))
             echo $row['request_id'];?>" readonly>
        </div>
        <div class="form-group">
            <label for="request_info"> request Info </label>
            <input type="text" class="form-control" id="request_info" name="request_info" value="<?php if(isset($row['request_info']))
                echo $row['request_info'];?>">
        </div>
        <div class="form-group">
            <label for="requestdesc"> Description </label>
            <input type="text" class="form-control" id="requestdesc" name="requestdesc" value="<?php if(isset($row['request_desc']))
                    echo $row['request_desc'];?>">
        </div>

        <div class="form-group">
            <label for="requestername"> NAME </label>
            <input type="text" class="form-control" id="requestername" name="requestername" value="<?php if(isset($row['requester_name']))
                        echo $row['requester_name'];?>">
        </div>

            <div class="form-group">
                <label for="address1"> Address</label>
                <input type="text" class="form-control" id="address1" name="address1" value="<?php if(isset($row['requester_add1']))
                                echo $row['requester_add1'];?>">
            </div>
            

        <div class="form-row">
            <div class="form-group col-md-8">
                <label for="requestercity">City</label>
                <input type="text" class="form-control" id="requestercity" name="requestercity" value="<?php if(isset($row['requester_email']))
                                                        echo $row['requester_email'];?>">
            </div>

            <div class="form-group col-md-4">
                <label for="requesterzip">Zip code</label>
                <input type="text" class="form-control" id="requesterzip" name="requesterzip" value="<?php if(isset($row['requester_mobile']))
                                                            echo $row['requester_mobile'];?>"
                    onkeypress="isinputnumber(event)">
            </div>
           </div> 

            <div class="form-row">
            <div class="form-group col-md-6">
                <label for="requesteremail">Email</label>
                <input type="text" class="form-control" id="requesteremail" name="requesteremail" value="<?php if(isset($row['requester_city']))
                                            echo $row['requester_city'];?>">
            </div>
            <div class="form-group col-md-6">
                <label for="requesterphone">Phone</label>
                <input type="text" class="form-control" id="requesterphone" name="requesterphone" value="<?php if(isset($row['requester_city']))
                                        echo $row['requester_city'];?>">
            </div>
        </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="assignteach"> assign to technician </label>
                    <input type="text" class="form-control" id="assignteach" name="assignteach">
                </div>

                <div class="form-group col-md-6">
                    <label for="inputdate"> Date </label>
                    <input type="date" class="form-control" id="inputdate" name="inputdate">
                </div>
            </div>

            <div class="float-right">
                <button type="submit" class="btn btn-success" name="assign"> Assign </button>
                <button type="reset" class="btn btn-secondary"> reset </button>
            </div>
            <?php if(isset($msg)){ echo $msg;} ?>
    </form>
</div>