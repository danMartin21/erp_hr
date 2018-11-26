<!DOCTYPE html>
<html>
<head>
  <title>STAFF</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <center><link rel="icon" type="icon" href="img/e-benta.png"></center>
  <?php include('header.php'); ?>

  <div id="frm">
  <form method = "POST">
    <center><img src="img/e-benta.png"></center>
      <h2 style="text-align:center;">Employee Attendance</h2>
      <center>
      <p>
        </i><input style="text-align:center;" type="password" name="id" autofocus placeholder="Enter Employee ID...">
      </p>
      <p>
        <input style="text-align:center;" readonly type="text" id="txt" name="time"/>
      </p>
      <p>
        <input style="text-align:center;" type="text" name="date" readonly value=<?php echo date("Y/m/d");?>>
      </p>
      <p>
        <button type="submit" name="timein"><i style="color:black" class="fa fa-sign-in"></i> Time In</button>
        <button type="submit" name="timeout"><i style="color:black" class="fa fa-sign-out"></i> Time Out</button>
      </p>
      </center>
    </form>
    </div>
</body>
<script>
function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('txt').value =
    h + ":" + m + ":" + s;
    var t = setTimeout(startTime, 500);
}
function checkTime(i) {
    if (i < 10) {i = "0" + i};
    return i;
}
</script>
</html>

<?php
$connection = mysqli_connect("localhost", "root", ""); 
$db = mysqli_select_db($connection,"hrm_erp");  

if(isset($_POST['timein'])){ 
    $id = $_POST['id'];
    $time = $_POST['time'];
    $date = $_POST['date'];

    $add_staff_query_timein = mysqli_query($connection,"SELECT timein From members where member_id='$id'");
    $add_staff_query_timein_value = mysqli_fetch_object($add_staff_query_timein);
    $expected_timein = $add_staff_query_timein_value->timein;
    if (mysqli_num_rows($add_staff_query_timein) == 0) {
        alert("Staff ID does NOT exist!");
    } else {
        $staff_tb_query = mysqli_query($connection,"SELECT * From attedance where member_id='$id' and date='$date'");
        if (mysqli_num_rows($staff_tb_query) == 0) {
            $queryin = mysqli_query($connection,"INSERT INTO attedance (member_id,time_in,date) VALUES ('$id','$time', '$date')");
            $queryin = mysqli_query($connection,"UPDATE attedance set  status_in='Present' where member_id = '$id' And date='$date'");
            if (strtotime($time) <= strtotime($expected_timein)) {
                alert("Time In Successful");
            } else {
            $queryin = mysqli_query($connection,"UPDATE attedance set  status_in='Late' where member_id = '$id' And date='$date'");
                alert("You are late");
            }
        } else {
            alert("User already Time In");
        }
    }
}



// if (isset($_POST['timeout'])) { // ayusin mo mga tabs
//   $id = $_POST['id'];
//   $time = $_POST['time'];
//   $date = $_POST['date'];

//   $add_staff_query = mysqli_query($connection, "SELECT timeout From members where member_id='$id'");
//   $add_staff_row= mysqli_fetch_object($add_staff_query);
//   if (mysqli_num_rows($add_staff_query) == 0) {
//       alert("Staff ID does NOT exist!");
//   } else {
//     $add_staff_query_timeout = mysqli_query($connection,"SELECT timeou From members where member_id='$id'");
//     $timeout_query = mysqli_query($connection, "SELECT * From attedance where member_id ='$id' and date='$date'");
//     $timeout_row = mysqli_fetch_array($timeout_query);
//     $expected_timeout=$timeout_row['time_out'];

//     if (mysqli_num_rows($timeout_query) == 0) {
//      $queryin = mysqli_query($connection,"UPDATE attedance set  time_out='$time' where member_id = '$id' And date='$date'");
//      alert("Time Out Successful");
//       //alert("You need to time in first! ");
//     } elseif (strtotime($time) = strtotime('00:00:00')) {
//       alert("User already Time Out");
//     } elseif (strtotime($time) < strtotime($expected_timeout)) {
//       alert("Your Time is not over");
//     } elseif (strtotime($time) > strtotime($expected_timeout)) {
//      $queryin = mysqli_query($connection,"UPDATE attedance set  time_out='$time' where member_id = '$id' And date='$date'");
//      alert("Time Out Successful");
//     }
//   }
// }


if (isset($_POST['timeout'])) { // ayusin mo mga tabs
   $id = $_POST['id'];
   $time = $_POST['time'];
   $date = $_POST['date'];

$query_out=mysqli_query($connection,"SELECT * From attedance where member_id='$id' AND date = '$date' ");
$timeout_row = mysqli_fetch_array($query_out);
$empout=$timeout_row['time_in'];

if (strtotime($empout) == strtotime('00:00:00') ) {
  alert("You need to time in first! ");
}else{
  $qtime_out=mysqli_query($connection,"SELECT * from members where member_id='$id' ");
  $qout_row = mysqli_fetch_array($qtime_out);
  $emplout=$qout_row['timeout'];
  $queryout=mysqli_query($connection,"UPDATE attedance set  time_out='$time' where member_id = '$id' And date='$date' ");
  
  if (strtotime($time) > strtotime($emplout)) {
    $queryout=mysqli_query($connection,"UPDATE attedance set  status_out='Overtime' where member_id = '$id' And date='$date' ");
    alert("Time Out Successful");
  }else{
    $queryout=mysqli_query($connection,"UPDATE attedance set  status_out='Undertime' where member_id = '$id' And date='$date' ");
    alert("Time Out Successful");
  }
}
    
}
function alert($message) {
    echo "<script>alert('$message'); window.location='index.php'</script>";
}
mysqli_close($connection);
?>