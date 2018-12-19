<?php
include('dbcon.php');
$id=$_POST['id'];
mysqli_query($conn,"delete from admin where id='$id'") or die(mysql_error());
?>