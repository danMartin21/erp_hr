<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php include('navbar_dasboard.php') ?>

    <div class="row">	
        <div class="span2">
            <?php include('sidebar.php'); ?>
        </div>
        <div class="span11"><br>
            
            <div class="alert alert-info" style="background-color: skyblue; color: white;">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong><i class="fa fa-book"></i>&nbsp;Leaves Table</strong>
            </div>
            <table cellpadding="0" cellspacing="0" border="0" class="table  table-bordered" id="example">

                <thead>
                    <tr>
                        <th>Employee ID</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Reason</th>
                        <th>HR Supervisor Approval</th>
                        <th>Head HR Approval</th>                            
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $lev_query = mysqli_query($conn,"select * from leaves where dep_status='Approved' ")or die(mysql_error());
                    while ($row_lev = mysqli_fetch_array($lev_query)) {
                        $id = $row_lev['id'];
                        $emp_id = $row_lev['employee_id'];

                        $member_query = mysqli_query($conn,"select * from employee where employee_id = '$emp_id'")or die(mysql_error());
                        $member_row = mysqli_fetch_array($member_query);
                        ?>
                        <tr class="del<?php echo $id ?>">
                            <td><?php echo $row_lev['employee_id']; ?></td>
                            <td><?php echo $row_lev['date_start']; ?></td>
                            <td><?php echo $row_lev['date_end']; ?></td>
                            <td><?php echo $row_lev['reason']; ?></td>
                            <td><?php echo $row_lev['hr_status'];?></td>
                            <td><?php echo $row_lev['headhr_status']?></td>
                            <td width="100">
                                <a rel="tooltip"  title="Delete" id="<?php echo $id; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                <a rel="tooltip"  title="Approve" id="e<?php echo $id; ?>" href="#approv<?php echo $id; ?>" data-toggle="modal" class="btn btn-info"><i class="fa fa-check"></i></a>
                            <?php include('approve_leave.php'); ?>
                            </td>
                        </tr>
<?php } ?>

                </tbody>
            </table>

            <script type="text/javascript">
                $(document).ready(function() {
                    $('.btn-danger').click(function() {
                        var id = $(this).attr("id");
                        if (confirm("Are you sure you want to delete this Data?")) {
                            $.ajax({
                                type: "POST",
                                url: "delete_leave.php",
                                data: ({id: id}),
                                cache: false,
                                success: function(html) {
                                    $(".del" + id).fadeOut('slow');
                                }
                            });
                        } else {
                            return false;
                        }
                    });
                });
            </script>

        </div>
    </div>
<!-- <?php include('footer.php') ?> -->