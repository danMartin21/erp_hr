<?php
include('dbcon.php');
$id=$_POST['id'];
mysqli_query($conn,"delete from employees where id='$id' ") or die(mysql_error());
?>