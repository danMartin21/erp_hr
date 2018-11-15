<?php
include('dbcon.php');
$get_id = $_GET['id'];
mysqli_query($conn,"delete from attendance where att_id = '$get_id' ")or die(mysql_error());
header('location:schedule.php');
?>