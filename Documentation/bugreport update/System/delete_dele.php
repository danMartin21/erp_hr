<?php
include('dbcon.php');
$id = $_POST['id'];
mysqli_query($conn,"Update employees set status=' ',start_date=' ',end_date=' ' where id = '$id' ")or die(mysql_error());
header('location:delegation.php');
?>