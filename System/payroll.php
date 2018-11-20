<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php include('navbar_dasboard.php') ?>

    <div class="row">	
        <div class="span2">
            <?php include('sidebar.php'); ?>
        </div>
        <div class="span10"><br>
            
            <div class="alert alert-info" style="background-color: skyblue; color: white;">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong><i class="icon-user icon-large"></i>&nbsp;Categories Table</strong>
            </div>
            
            <table cellpadding="0" cellspacing="0" border="0" class="table  table-bordered" id="example">

                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Per-Day Salary</th>
                        <th>Monthly Salary</th>                            
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $conn=mysqli_connect("localhost","root","","hrm_erp")or die(mysql_error());
                    $pay_query = mysqli_query($conn,"select * from payroll")or die(mysql_error());
                    while ($row_pay = mysqli_fetch_array($pay_query)) {
                        $id = $row_pay['pay_id'];
                        ?>
                        <tr class="del<?php echo $id ?>">
                            <td><?php echo $row_pay['cat']; ?></td>
                            <td><?php echo $row_pay['subcat']; ?></td>
                            <td width="100">
                                <a rel="tooltip"  title="Delete" id="<?php echo $id; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                <a rel="tooltip"  title="Edit" id="e<?php echo $id; ?>" href="#edit<?php echo $id; ?>" data-toggle="modal" class="btn btn-success"><i class="fa fa-wrench"></i></a>
                            <?php include('edit_subcat.php'); ?>
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
                                url: "delete_subcat.php",
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