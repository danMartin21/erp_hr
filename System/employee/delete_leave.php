<?php
include('dbcon.php');
$id = $_POST['id'];
mysqli_query($conn,"DELETE from leaves where id = '$id' ")or die(mysql_error());
header('location:leaves.php');
?>