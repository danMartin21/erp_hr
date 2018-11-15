<div id="edit<?php echo $id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-body">
        <div class="alert alert-info" style="background-color: rgb(15, 15, 87);"><strong>Edit Categories</strong></div>
        <form class="form-horizontal" method="post">
            <div class="control-group">
                <label class="control-label" for="inputEmail">Service Offer</label>
                <div class="controls">
                    <input type="hidden" id="inputEmail" name="id" value="<?php echo $row_subcat['id']; ?>" readonly>
                    <input type="text" id="inputEmail" value="<?php echo $row_subcat['cat']; ?>" readonly>
                    <input type="text" id="inputEmail" name="subcat_tit" value="<?php echo $row_subcat['subcat']; ?>" required>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <button name="editsub" type="submit" class="btn btn-success"><i class="fa fa-edit"></i>&nbsp;Update</button>
                </div>
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Close</button>
    </div>
</div>

<?php
$conn=mysqli_connect("localhost","root","","e-benta")or die(mysql_error());
if (isset($_POST['editsub'])) {

    $subcat_id = $_POST['id'];
    $subcat_tit = $_POST['subcat_tit'];

    mysqli_query($conn,"update sub_categories set subcat='$subcat_tit' where id='$subcat_id'")or die(mysqli_error($conn));
    ?>
    <script>
        window.location = "subcat.php";
    </script>
    <?php
}
?>