<!-- Button to trigger modal -->
<a href="#add_cat" role="button" class="btn btn-info" data-toggle="modal"><i class="fa fa-plus"></i>&nbsp;Add Trainings</a>
<br>
<br>
<!-- Modal -->
<div id="add_cat" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <div class="alert alert-info" style="background-color: rgb(15, 15, 87);">Add Training</div>
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
                <label class="control-label" for="inputEmail">Location</label>
                <div class="controls">
                    <input type="text" name="lo" id="inputEmail" placeholder="Location..." required>
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
                <label class="control-label" for="inputEmail">Start Time</label>
                <div class="controls">
                    <input type="time" name="sti" id="inputEmail" placeholder="Categories..." required>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputEmail">End Time</label>
                <div class="controls">
                    <input type="time" name="eti" id="inputEmail" placeholder="Categories..." required>
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
    $emp_id = $_POST['emp_id'];
    $lo = $_POST['lo'];
    $sd = $_POST['sd'];
    $ed = $_POST['ed'];
    $sti = $_POST['sti'];
    $eti = $_POST['eti'];

    mysqli_query($conn,"insert into training (employee_id,training_location,start_date,end_date,start_time,end_time) values('$emp_id','$lo','$sd','$ed','$sti','$eti')")or die(mysqli_error($conn));
    ?>
    <script>
        window.location = "training.php";
    </script>
    <?php
}
?> 