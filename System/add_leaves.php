<!-- Button to trigger modal -->
<a href="#add_cat" role="button" class="btn btn-info" data-toggle="modal"><i class="fa fa-plus"></i>&nbsp;Add Leaves</a>
<br>
<br>
<!-- Modal -->
<div id="add_cat" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <div class="alert alert-info" style="background-color: skyblue;">Add Leaves</div>
    </div>
    <div class="modal-body">
        <form class="form-horizontal" method="POST">
             <div class="control-group">
                <label class="control-label" for="inputEmail">Employee ID</label>
                <div class="controls">
                    <input type="text" name="emp_id" id="inputEmail" placeholder="Employee..." required>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputEmail">Start Date</label>
                <div class="controls">
                    <input type="date" name="sd" id="inputEmail" required>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputEmail">End Date</label>
                <div class="controls">
                    <input type="date" name="ed" id="inputEmail"  required>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputEmail">Reason</label>
                <div class="controls">
                    <textarea style="resize:none;" name="des" placeholder="Reason of leave....."></textarea>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <button type="submit" name="ad" class="btn btn-info">Add</button>
                </div>
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    </div>
</div>

<?php
$conn=mysqli_connect("localhost","root","","hrm_erp")or die(mysql_error());
if (isset($_POST['ad'])) {
    $emp_id=$_POST['emp_id'];
    $sd=$_POST['sd'];
    $ed=$_POST['ed'];
    $des=$_POST['des'];

    $q = "SELECT * FROM employees WHERE employee_id='$emp_id' ";
    $res = mysqli_query($conn,$q)or die(mysql_error());
    $num_row = mysqli_num_rows($res);
    $row = mysqli_fetch_array($res);

    if( $num_row > 0 ) {    
    ?>
    <script>alert('Leave successfully save!!'); window.location='leaves.php'</script>;
    <?php
    mysqli_query($conn,"insert into leaves (employee_id,date_start,date_end,reason) values('$emp_id','$sd','$ed','$des')")or die(mysqli_error($conn));
    }
    else{ ?>
    <script>alert('Employee ID Does Not Exist!!'); window.location='leaves.php'</script>;
    <?php 
    }

}
?>