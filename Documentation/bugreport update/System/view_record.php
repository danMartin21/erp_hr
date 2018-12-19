<div id="view_att" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <div class="alert alert-info" style="background-color: skyblue;">Record of Attendance</div>
    </div>
    <div class="modal-body">
        <thead>
                    <tr>
                        <th>Date</th>
                        <th>Status</th>                                 
                        <th>Worked Hour</th>                                 
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $user_query = mysqli_query($conn,"select * from employees where NOT employee_id=' ' ")or die(mysql_error());
                    while ($row = mysqli_fetch_array($user_query)) {
                        $id = $row['id'];
                        ?>
                        <tr class="del<?php echo $id ?>">

                        </tr>
                        <?php } ?>

                </tbody>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    </div>
</div>
