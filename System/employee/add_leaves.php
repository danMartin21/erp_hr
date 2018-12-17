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
                    <?php
                    $emp_q = mysqli_query($conn,"select * from employee where id='$session_id' ")or die(mysql_error());
                    $qrow = mysqli_fetch_array($emp_q);
                    $emp=$qrow['employee_id'];

                    ?>
                    <input type="text" name="emp_id" id="inputEmail" value="<?php echo $emp?>" readonly required>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputEmail">Start Date</label>
                <div class="controls">
                    <input type="date" name="sd" id="sDate" required>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputEmail">End Date</label>
                <div class="controls">
                    <input type="date" name="ed" id="eDate"  required>
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
if (isset($_POST['ad'])) {
    $emp_id=$_POST['emp_id'];
    $emp_query = mysqli_query($conn,"select * from employee where employee_id='$emp_id' ")or die(mysql_error());
    $query_row = mysqli_fetch_array($emp_query);
    $dep = $query_row['department'];
    $sd=$_POST['sd'];
    $ed=$_POST['ed'];
    $des=$_POST['des'];


    $q = "SELECT * FROM employee WHERE employee_id='$emp_id' ";
    $res = mysqli_query($conn,$q)or die(mysql_error());
    $num_row = mysqli_num_rows($res);
    $row = mysqli_fetch_array($res);

    if( $num_row > 0 ) {    
    ?>
    <script>alert('Leave successfully save!!'); window.location='leaves.php'</script>;
    <?php
    mysqli_query($conn,"insert into leaves (employee_id,date_start,date_end,reason,department) values('$emp_id','$sd','$ed','$des','$dep')")or die(mysqli_error($conn));
    }
    else{ ?>
    <script>alert('Employee ID Does Not Exist!!'); window.location='leaves.php'</script>;
    <?php 
    }

}
?>

<script type="text/javascript">
        
        $(function(){
    var dtToday = new Date();
    
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
    
    var minDate= year + '-' + month + '-' + day;
    
    $('#eDate').attr('min', minDate);
    $('#sDate').attr('min', minDate);
});
    </script>