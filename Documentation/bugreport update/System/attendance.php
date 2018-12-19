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
                <strong><i class="icon-user icon-large"></i>&nbsp;Item Table</strong>
            </div>
            
            <table cellpadding="0" cellspacing="0" border="0" class="table  table-bordered" id="example">

                <thead>
                    <tr>
                        <th>Employee ID</th>
                        <th>Time_In</th>
                        <th>Time_Out</th>                                                                 
                        <th>Date</th>
                        <th>Work Duration</th>
                        <th>Action</th>                                 
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $user_query = mysqli_query($conn,"select * from attendance")or die(mysql_error());
                    while ($row = mysqli_fetch_array($user_query)) {
                        $id = $row['id'];
                        $member_id = $row['employee_id'];
                        $time_in = $row['time_in'];
                        $time_out=$row['time_out'];
                        $date=$row['date'];
                        /* member query  */
                        ?>

                        <tr class="del<?php echo $id ?>">
                            <td><?php echo $row['employee_id']; ?></td>
                            <td><?php echo $time_in ?></td>
                            <td><?php echo $time_out?></td> 
                            <td><?php echo $date ?></td>
                            <td><?php echo $row['num_hr']?></td>   
                            <td width="100">

                                <?php
                                ?>
                                <a rel="tooltip"  title="Delete" id="<?php echo $id; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                <?php include('delete_attendance.php'); ?> 
                            </td>
                        <?php include('toolttip_edit_delete.php'); ?>
                        </tr>
                    <?php } ?>

                </tbody>
            </table>

            <script type="text/javascript">
                $(document).ready(function() {
                    $('.btn-danger').click(function() {
                        var id = $(this).attr("id");
                        if (confirm("Are you sure you want to delete this attendance?")) {
                            $.ajax({
                                type: "POST",
                                url: "delete_att.php",
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