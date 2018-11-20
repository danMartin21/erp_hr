<?php
include('dbcon.php');
$id = $_POST['id'];
mysqli_query($conn,"DELETE from ads where ads_id = '$id' ")or die(mysql_error());
header('location:cat.php');
?>