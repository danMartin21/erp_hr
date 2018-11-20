<?php
include('dbcon.php');
$id = $_POST['id'];
mysqli_query($conn,"DELETE from sub_categories where id = '$id' ")or die(mysql_error());
header('location:cat.php');
?>