<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php include('navbar_dasboard.php') ?>
<div class="container">

    <div class="row">	
        <div class="span3">
            <?php include('sidebar.php'); ?>
        </div>
        <div class="span9">
            
            <div class="alert alert-info" style="background-color: rgb(15, 15, 87);">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong><i class="icon-user icon-large"></i>&nbsp;Advertisement Table</strong>
            </div>
            <?php include('add_ads.php'); ?>
            <table cellpadding="0" cellspacing="0" border="0" class="table  table-bordered" id="example">

                <thead>
                    <tr>
                        <th>Advertisment</th>                              
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $conn=mysqli_connect("localhost","root","","e-benta")or die(mysql_error());
                    $user_query = mysqli_query($conn,"SELECT * from ads order by date Desc")or die(mysql_error());
                    while ($row = mysqli_fetch_array($user_query)) {
                        $id = $row['ads_id'];
                        ?>
                        <tr class="del<?php echo $id ?>">
                            <td><?php echo $row['image']; ?></td>
                            <td><?php echo $row['date']; ?></td>
                            <td width="100">
                            <center>
                            <a rel="tooltip"  title="Delete" id="<?php echo $id; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                            </center>
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
                                url: "delete_ads.php",
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
<?php include('footer.php') ?>