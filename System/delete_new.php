<?php
include('dbcon.php');
$id=$_POST['id'];
mysqli_query($conn,"delete from members where member_id='$id' AND status=' ' ") or die(mysql_error());
?>