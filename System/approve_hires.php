<div id="app<?php echo $id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-body">
        <form class="form-horizontal" method="post">
            
                <center><p>Are you sure you want to approve this new employees?</p></center>
                <input type="hidden" name="id" value="<?php echo $id?>">
            <div class="control-group">
                <div class="controls">
                    
                </div>
            </div>
        
    </div>
    <div class="modal-footer">
        <button name="edit" type="submit" class="btn btn-info"><i class="fa fa-check"></i>&nbsp;Yes</button>
        <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Close</button>
    </div>
    </form>
</div>

<?php
$conn=mysqli_connect("localhost","root","","hrm_erp")or die(mysql_error());
if (isset($_POST['edit'])) {

    $id=$_POST['id'];

    mysqli_query($conn,"update employees set Approved='Yes' where id='$id'")or die(mysqli_error($conn));
    ?>
    <script>
        window.location = "hires.php";
    </script>
    <?php
}
?>