<div id="edit<?php echo $id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-body">
        <div class="alert alert-info" style="background-color: rgb(15, 15, 87);"><strong>Edit Request</strong></div>
        <form class="form-horizontal" method="post">
            <div class="control-group">
                <label class="control-label" for="inputEmail">Item</label>
                <div class="controls">
                    <input type="text" id="inputEmail" name="edit_lo" value="<?php echo $row_req['name']; ?>" required>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputEmail">Quantity</label>
                <div class="controls">
                    <input type="number" id="inputEmail" name="edit_sdate" value="<?php echo $row_req['quantity']; ?>" required>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputEmail">Description</label>
                <div class="controls">
                    <input type="text" id="inputEmail" name="edit_edate" value="<?php echo $row_req['description']; ?>" required>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputEmail">Price</label>
                <div class="controls">
                    <input type="number" id="inputEmail" name="edit_stime" value="<?php echo $row_req['price']; ?>" required>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <button name="edit" type="submit" class="btn btn-success"><i class="fa fa-edit"></i>&nbsp;Update</button>
                </div>
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Close</button>
    </div>
</div>

<?php
if (isset($_POST['edit'])) {

    $edit_lo = $_POST['edit_lo'];
    $edit_sdate = $_POST['edit_sdate'];
    $edit_edate = $_POST['edit_edate'];
    $edit_stime = $_POST['edit_stime'];
    $edit_etime = $_POST['edit_etime'];

    mysqli_query($conn,"update training set training_location='$edit_lo',start_date='$edit_sdate',end_date='$edit_edate',start_time='$edit_stime',end_time='$edit_etime' where train_id='$id'")or die(mysqli_error($conn));
    ?>
    <script>
        window.location = "training.php";
    </script>
    <?php
}
?>