<!-- Button to trigger modal -->
<a href="#add_cat" role="button" class="btn btn-info" data-toggle="modal"><i class="fa fa-plus"></i>&nbsp;Add Delegation</a>
<br>
<br>
<!-- Modal -->
<div id="add_cat" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <div class="alert alert-info" style="background-color: rgb(15, 15, 87);">Add Delegation</div>
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
                <label class="control-label" for="inputEmail">Type</label>
                <div class="controls">
                    <input type="radio" id="show" name="type" value="Temporary" style="margin-bottom: 5px;">Temporary <input id="hide" style="margin-bottom: 5px;" type="radio" name="type" value="Permanent">Permanent
                </div>
            </div>

            <div id="date" hidden>
            <div class="control-group" >
                <label class="control-label" for="inputEmail">Start Date</label>
                <div class="controls">
                    <input type="date" name="sdate" id="inputEmail">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputEmail">End Date</label>
                <div class="controls">
                    <input type="date" name="edate" id="inputEmail">
                </div>
            </div>
            </div>

            <div class="control-group">
                <div class="controls">
                    <button type="submit" name="dele" class="btn btn-info">Save</button>
                </div>
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    </div>
</div>

<?php
if (isset($_POST['dele'])) {
    $emp_id = $_POST['emp_id'];
    $type=$_POST['type'];
    $sdate=$_POST['sdate'];
    $edate=$_POST['edate'];

    $q = "SELECT * FROM employees WHERE employee_id='$emp_id' ";
    $res = mysqli_query($conn,$q)or die(mysql_error());
    $num_row = mysqli_num_rows($res);
    $row = mysqli_fetch_array($res);

    if( $num_row > 0 ) {    
    ?>
    <script>alert('Your delegation is successfully save!!'); window.location='delegation.php'</script>;
    <?php
    mysqli_query($conn,"UPDATE employees set status='$type' , start_date='$sdate' , end_date='$edate' where employee_id = '$emp_id' ")or die(mysqli_error($conn)); 
    }
    else{ ?>
    <script>alert('Employee ID Does Not Exist!!'); window.location='delegation.php'</script>;
    <?php 
    }

}
?>

<script>
$(document).ready(function(){
    $("#hide").click(function(){
        $("#date").hide();
    });
    $("#show").click(function(){
        $("#date").show();
    });
});
</script>