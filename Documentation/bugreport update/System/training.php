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
                <strong><i class="fa fa-thumbs-up"></i>&nbsp;Training Table</strong>
            </div>
            <?php include('add_train.php');  ?>
            <table cellpadding="0" cellspacing="0" border="0" class="table  table-bordered" id="example">

                <thead>
                    <tr>

                        <th><center>Employee ID</center></th>
                        <th><center>Location for Training</center></th>
                        <th><center>Start Date</center></th>
                        <th><center>End Date</center></th>
                        <th><center>Time</center></th>
                        <th><center>Worked Day</center></th>                            
                        <th><center>Action</center></th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $train_query = mysqli_query($conn,"select * from training")or die(mysql_error());
                    while ($row_train = mysqli_fetch_array($train_query)) {
                        $id = $row_train['train_id'];
                        $emp = $row_train['employee_id'];

                        $date1=date_create($row_train['start_date']);
                        $date2=date_create($row_train['end_date']);
                        $diff=date_diff($date1,$date2);

                        $emp_query = mysqli_query($conn,"select * from attendance where employee_id = '$emp' ")or die(mysql_error());
                        $row_emp = mysqli_fetch_array($emp_query);
                        $date1=date_create($row_emp['date']);
                        $diff=date_diff($date1,$date2);
                        
                        ?>
                        <tr class="del<?php echo $id ?>">
                            <td><?php echo $row_train['employee_id']; ?></td>
                            <td><?php echo $row_train['training_location']; ?></td>
                            <td><?php echo $row_train['start_date']; ?></td>
                            <td><?php echo $row_train['end_date']; ?></td>
                            <td><?php echo $row_train['start_time']."-".$row_train['end_time']; ?></td>
                            <td><?php echo $diff->format("%a")." "."out of"." ".$diff->format("%a"); ?></td>
                            <td><?php echo $row_train['status'];?></td>
                            <td width="200">
                                <a rel="tooltip"  title="Delete" id="<?php echo $id; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                <a rel="tooltip"  title="Edit" id="e<?php echo $id; ?>" href="#edit<?php echo $id; ?>" data-toggle="modal" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                <a rel="tooltip" type="button" name="accept" title="Accept" id="e<?php echo $id; ?>" class="btn btn-info"><i class="fa fa-check"></i></a>
                                <a rel="tooltip" type="button" name="denied" title="Denied" id="e<?php echo $id; ?>" class="btn btn-warning">X<i class="fa fa-incorrect"></i></a>
                            <?php include('edit_training.php'); ?>
                            </td>
                        </tr>
                        <?php
                        if (isset($_POST['accept'])) {
                        
                        }elseif (isset($_POST['denied'])) {
                            # code...
                        }
                        ?>
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
                                url: "delete_train.php",
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