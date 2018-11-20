<!-- Button to trigger modal -->
<a href="#add_subcat" role="button" class="btn btn-success" data-toggle="modal"><i class="fa fa-plus"></i>&nbsp;Add Sub-categories</a>
<br>
<br>
<!-- Modal -->
<div id="add_subcat" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <div class="alert alert-info" style="background-color: rgb(15, 15, 87);">Add Sub-categories</div>
    </div>
    <div class="modal-body">
        <form class="form-horizontal" method="POST">
            <div class="control-group">
                <label class="control-label" for="inputEmail">Categories</label>
                <div class="controls">
                    <select required name="cat">
                        <option></option>
                    <?php
                    $conn=mysqli_connect("localhost","root","","e-benta")or die(mysql_error());
                    $cat_query = mysqli_query($conn,"select * from categories")or die(mysql_error());
                    while ($row_cat = mysqli_fetch_array($cat_query)) {
                        $id = $row_cat['cat_id'];
                        ?>
                        <option><?php echo $row_cat['cat_title'];?></option>
                    <?php }?>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputEmail">Sub-Categories</label>
                <div class="controls">
                    <input type="text" name="subcat" id="inputEmail" placeholder="Categories..." required>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <button type="submit" name="adsub" class="btn btn-info">Add</button>
                </div>
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    </div>
</div>

<?php
$conn=mysqli_connect("localhost","root","","e-benta")or die(mysql_error());
if (isset($_POST['adsub'])) {

    $cat = $_POST['cat'];
    $subcat = $_POST['subcat'];
    mysqli_query($conn,"insert into sub_categories (cat,subcat) values('$cat','$subcat')")or die(mysqli_error($conn));
    ?>
    <script>
        window.location = "subcat.php";
    </script>
    <?php
}
?>