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
                <label class="control-label" for="inputEmail">Description</label>
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

<!-- <?php
$conn=mysqli_connect("localhost","root","","hrm_erp")or die(mysql_error());
if (isset($_POST['ad'])) {
    $cat = $_POST['cat'];

    mysqli_query($conn,"insert into categories (cat_title) values('$cat')")or die(mysqli_error($conn));
    ?>
    <script>
        window.location = "cat.php";
    </script>
    <?php
}
?> -->