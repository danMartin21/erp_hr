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
                <strong><i class="fa fa-wrench"></i>&nbsp;Request Tools & Equipment Table</strong>
            </div>
            <?php include('add_request.php');  ?>
            <table cellpadding="0" cellspacing="0" border="0" class="table  table-bordered" id="example">

                <thead>
                    <tr>

                        <th><center>Item</center></th>
                        <th><center>Quantity</center></th>
                        <th><center>Description</center></th>
                        <th><center>Price</center></th>
                        <th><center>Head Status</center></th>
                        <th><center>Supply Chain Status</center></th>
                        <th><center>Accounting & Finance Status</center></th>                         
                        <th><center>Action</center></th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $req_query = mysqli_query($conn,"select * from request")or die(mysql_error());
                    while ($row_req = mysqli_fetch_array($req_query)) {
                        $id = $row_req['req_id'];
                        ?>
                        <tr class="del<?php echo $id ?>">
                            <td><?php echo $row_req['name']; ?></td>
                            <td><?php echo $row_req['quantity']; ?></td>
                            <td><?php echo $row_req['description']; ?></td>
                            <td><?php echo $row_req['price']; ?></td>
                            <td><?php echo $row_req['status']; ?></td>
                            <td><?php echo $row_req['status_sc'];?></td>
                            <td><?php echo $row_req['status_af'];?></td>
                            <td width="200">
                                <a rel="tooltip"  title="Delete" id="<?php echo $id; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                <a rel="tooltip"  title="Edit" id="e<?php echo $id; ?>" href="#edit<?php echo $id; ?>" data-toggle="modal" class="btn btn-success"><i class="fa fa-edit"></i></a>
                            <?php include('edit_request.php'); ?>
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