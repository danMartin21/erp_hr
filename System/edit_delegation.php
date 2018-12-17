<div id="edit<?php echo $id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-body">
        <div class="alert alert-info" style="background-color: rgb(15, 15, 87);"><strong>Edit Delegation</strong></div>
        <form class="form-horizontal" method="post">
            <div class="control-group">
                <label class="control-label" for="inputEmail">Type</label>
                <div class="controls">
                    <input type="text" id="inputEmail" name="stat" value="<?php echo $row['status']; ?>" required>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputEmail">Start Date</label>
                <div class="controls">
                    <input type="date" id="inputEmail" name="sdate" value="<?php echo $row['start_date']; ?>" required>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputEmail">End Date</label>
                <div class="controls">
                    <input type="date" id="inputEmail" name="edate" value="<?php echo $row['end_date']; ?>" required>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <button name="editdel" type="submit" class="btn btn-success"><i class="fa fa-edit"></i>&nbsp;Update</button>
                </div>
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Close</button>
    </div>
</div>

<?php
if (isset($_POST['editdel'])) {

    $stat=$_POST['stat'];
    $sdate=$_POST['sdate'];
    $edate=$_POST['edate'];

    mysqli_query($conn,"update employees set status='$stat',start_date='$sdate',end_date='$edate' where id='$id'")or die(mysqli_error($conn));
    ?>
    <script>
        window.location = "delegation.php";
    </script>
    <?php
}
?>