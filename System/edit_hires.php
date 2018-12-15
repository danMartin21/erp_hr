<div id="edit<?php echo $id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-body">
        <div class="alert alert-info" style="background-color: rgb(15, 15, 87);"><strong>Employee Info</strong></div>
        <form class="form-horizontal" method="post">
            <div class="control-group">
                <center>
                <?php
                    $conn=mysqli_connect("localhost","root","","hrm_erp")or die(mysql_error());
                    $q = mysqli_query($conn,"SELECT * from employees where id='$id' ")or die(mysql_error());
                    while ($row = mysqli_fetch_assoc($q)){
                        if ($row['photo'] == "") {
                            echo "<img src='img/profile 1.png' alt='Profile Picture' style='width:100px; height:100px; border-radius: 50%'>";
                        } else {
                            echo "<div class='js-tilt'><img src='img/".$row['photo']."' alt='Profile Picture' style='width:100px; height:100px; border-radius: 50%'></div>";
                        }
                    
                    
                    ?>
                </center>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputEmail">Name</label>
                <div class="controls">
                    <input type="text" id="inputEmail" name="sdate" value="<?php echo $row['firstname']." ".$row['lastname']; ?>" required>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputEmail">Email</label>
                <div class="controls">
                    <input type="text" id="inputEmail" name="sdate" value="<?php echo $row['email']; ?>" required>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputEmail">Age</label>
                <div class="controls">
                    <input type="text" id="inputEmail" name="sdate" value="<?php echo $row['age']; ?>" required>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputEmail">Address</label>
                <div class="controls">
                    <input type="text" id="inputEmail" name="sdate" value="<?php echo $row['address']; ?>" required>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputEmail">Gender</label>
                <div class="controls">
                    <input type="text" id="inputEmail" name="sdate" value="<?php echo $row['gender']; ?>" required>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputEmail">Position</label>
                <div class="controls">
                    <input type="text" id="inputEmail" name="sdate" value="<?php echo $row['position_id']; ?>" required>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputEmail">Experiences</label>
                <div class="controls">
                    <input type="text" id="inputEmail" name="sdate" value="<?php echo $row['skills']; ?>" required>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputEmail">Highest Educational Attainment</label>
                <div class="controls">
                    <input type="text" id="inputEmail" name="sdate" value="<?php echo $row['edu_attain']; ?>" required>
                </div>
            </div>
        <?php }?>
        </form>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Close</button>
    </div>
</div>
