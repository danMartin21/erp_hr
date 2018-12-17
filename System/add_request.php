<!-- Button to trigger modal -->
<a href="#add_req" role="button" class="btn btn-info" data-toggle="modal"><i class="fa fa-plus"></i>&nbsp;Add Request</a>
<br>
<br>
<!-- Modal -->
<div id="add_req" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <div class="alert alert-info" style="background-color: rgb(15, 15, 87);">Add Equipment & Tools</div>
    </div>
    <div class="modal-body">
        <form class="form-horizontal" method="POST">
            <div class="control-group">
                <label class="control-label" for="inputEmail">Item</label>
                <div class="controls">
                    <input type="text" name="item" placeholder="Item..." required>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputEmail">Quantity</label>
                <div class="controls">
                    <input type="text" name="quan"  placeholder="Quantity..." required>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputEmail">Description</label>
                <div class="controls">
                    <textarea type="text" name="des" style="resize:none;height: 100px;" placeholder="Description..." required></textarea>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputEmail">Price</label>
                <div class="controls">
                    <input type="number" name="price"  placeholder="Price..." required>
                </div>
            </div>s
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
    $item = $_POST['item'];
    $quan = $_POST['quan'];
    $des = $_POST['des'];
    $price = $_POST['price'];

    mysqli_query($conn,"insert into request (name,description,quantity,price) values('$item','$des','$quan','$price')")or die(mysqli_error($conn));
    ?>
    <script>
        window.location = "request.php";
    </script>
    <?php
}
?> 
