<div id="approv<?php echo $id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-body">
        <form class="form-horizontal" method="post">
            
                <center><p>Are you sure you want to approve the leave of <?php echo $row_lev['employee_id'];?></p></center>
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
if (isset($_POST['edit'])) {

    $emp_id=$_POST['id'];

    mysqli_query($conn,"update leaves set hr_status='Approved' where id='$emp_id'")or die(mysqli_error($conn));
    ?>
    <script>
        window.location = "leaves.php";
    </script>
    <?php
}
?>