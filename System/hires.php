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
                <strong><i class="icon-user icon-large"></i>&nbsp;Users Table</strong>
            </div>

            <table cellpadding="0" cellspacing="0" border="0" class="table  table-bordered" id="example">

                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Position</th>                                 
                        <th>Email</th>                                 
                        <th>Contact</th> 
                        <th>Address</th>                                
                        <th>Birthday</th>                                 
                        <th>Gender</th>                                 
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $conn=mysqli_connect("localhost","root","","hrm_erp")or die(mysql_error());
                    $user_query = mysqli_query($conn,"select * from employees where employee_id=' ' ")or die(mysql_error());
                    while ($row = mysqli_fetch_array($user_query)) {
                        $id=$row['id'];
                        ?>
                        <tr class="del<?php echo $id ?>">
                            <td><?php echo $row['firstname']." ".$row['lastname'];; ?></td>
                            <td><?php echo $row['position_id'];?></td> 
                            <td><?php echo $row['email']; ?></td> 
                            <td><?php echo $row['contact_info']; ?></td>
                            <td><?php echo $row['address']; ?></td> 
                            <td><?php echo $row['birthdate']; ?></td> 
                            <td><?php echo $row['gender']; ?></td> 
                            <td width="150">
                            <a rel="tooltip"  title="Delete" id="<?php echo $id; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                            <a rel="tooltip"  title="Approve" id="e<?php echo $id; ?>" href="#app<?php echo $id; ?>" data-toggle="modal" class="btn btn-info"><i class="fa fa-check"></i></a>
                            <?php include('approve_hires.php'); ?>
                            <a rel="tooltip"  title="Edit" id="e<?php echo $id; ?>" href="#edit<?php echo $id; ?>" data-toggle="modal" class="btn btn-success"><i class="fa fa-wrench"></i></a>
                            <?php include('edit_hires.php'); ?>
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
                        if (confirm("Are you sure you want to delete this employee?")) {
                            $.ajax({
                                type: "POST",
                                url: "delete_new.php",
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
<!-- <?php include('footer.php') ?> -->s