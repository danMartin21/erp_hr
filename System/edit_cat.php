<div id="edit<?php echo $id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-body">
        <div class="alert alert-info" style="background-color: rgb(15, 15, 87);"><strong>Edit Categories</strong></div>
        <form class="form-horizontal" method="post">
            <div class="control-group">
                <label class="control-label" for="inputEmail">Service Offer</label>
                <div class="controls">
                    <input type="hidden" id="inputEmail" name="id" value="<?php echo $row_cat['cat_id']; ?>" required>
                    <input type="text" id="inputEmail" name="cat_tit" value="<?php echo $row_cat['cat_title']; ?>" required>
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
$conn=mysqli_connect("localhost","root","","e-benta")or die(mysql_error());
if (isset($_POST['edit'])) {

    $cate_id = $_POST['id'];
    $cat_tit = $_POST['cat_tit'];

    mysqli_query($conn,"update categories set cat_title='$cat_tit' where cat_id='$cate_id'")or die(mysqli_error($conn));
    ?>
    <script>
        window.location = "cat.php";
    </script>
    <?php
}
?>