<?php
include('dbcon.php');
$id = $_POST['id'];
mysqli_query($conn,"DELETE from training where train_id = '$id' ")or die(mysql_error());
header('location:training.php');
?>