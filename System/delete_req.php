<?php
include('dbcon.php');
$id = $_POST['id'];
mysqli_query($conn,"DELETE from request where train_id = '$id' ")or die(mysql_error());
header('location:training.php');
?>