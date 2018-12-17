<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php include('navbar_dasboard.php') ?>

<style type="text/css">
body{
  background-image: url(image/dashboard.jpg);
  background-repeat: no-repeat;
  background-size: 100% 120%;
}
.flip-box {
  background-color: transparent;
  width: 400px;
  height: 300px;
  border: 1px solid #f1f1f1;
  perspective: 1000px;
}

.flip-box-inner {
  position: relative;
  width: 100%;
  height: 100%;
  text-align: center;
  transition: transform 0.8s;
  transform-style: preserve-3d;
}

.flip-box:hover .flip-box-inner {
  transform: rotateY(180deg);
}

.flip-box-front, .flip-box-back {
  position: absolute;
  width: 100%;
  height: 100%;
  backface-visibility: hidden;
}

.flip-box-front {
  background-color: rgb(204, 255, 255);
  color: black;
}

.flip-box-back {
  background-color: rgb(255, 255, 153);
  color: black;
  transform: rotateY(180deg);
}
</style>

	<div class="row">	

						<div class="span2">
						<?php include('sidebar.php'); ?>
						</div>

						<div class="span2">
						<div class="col-sm-2">
						
						<a type='button' href="members.php" style="margin-top: 20px; height: 150px; width: 150px; margin-left: 100px;" class='btn btn-basic'>
						<?php
						$quser = mysqli_query($conn,"SELECT * from employee where NOT del_status = ' ' ")or die(mysql_error());
  						$user=mysqli_num_rows($quser);
  						if($user == 0){
				          	echo "<h2 style='margin-top: 30px;'>0</h2>";
				        }else{
				          echo "<h2 style='margin-top: 30px;'>$user</h2>";
				        }
						?>
						<i class='fa fa-users fa-3x'></i><br>USER</a>
						</div>
						</div>
						
						<div style="">
						<div class="span2">
						<div class="col-sm-2">
						
						<a type='button' href="hires.php" style="margin-top: 20px; height: 150px; width: 150px; margin-left: 120px;" class='btn btn-info'>
						<?php
						$quser = mysqli_query($conn,"SELECT * from employee where employee_id=' ' ")or die(mysql_error());
  						$user=mysqli_num_rows($quser);
  						if($user == 0){
				          	echo "<h2 style='margin-top: 30px;'>0</h2>";
				        }else{
				          echo "<h2 style='margin-top: 30px;'>$user</h2>";
				        }
						?>
						<i class='fa fa-user-plus fa-3x'></i><br>APPLICANT</a>
						</div>
						</div>

						<div class="span2">
						<div class="col-sm-2">
						
						<a type='button' href="leaves.php" style="margin-top: 20px; height: 150px; width: 150px; margin-left: 140px;" class='btn btn-warning'>
						<?php

						$Today = date('y:m:d');
        				$new = date(' Y/m/d', strtotime($Today));

						$quser = mysqli_query($conn,"SELECT * from leaves where date_start <= '$new'  AND date_end > '$new' AND headhr_status='Approved' ")or die(mysql_error());
  						$user=mysqli_num_rows($quser);
  						if($user == 0){
				          	echo "<h2 style='margin-top: 30px;'>0</h2>";
				        }else{
				          echo "<h2 style='margin-top: 30px;'>$user</h2>";
				        }
						?>
						<i class='fa fa-plane fa-3x'></i><br>ON LEAVE</a>
						</div>
						</div>

						<div class="span2">
						<div class="col-sm-2">
						
						<a type='button' href="training.php" style="margin-top: 20px; height: 150px; width: 150px; margin-left: 160px;" class='btn btn-danger'>
						<?php

						$Today = date('y:m:d');
        				$new = date(' Y/m/d', strtotime($Today));

						$quser = mysqli_query($conn,"SELECT * from training where start_date <= '$new'  AND end_date > '$new' ")or die(mysql_error());
  						$user=mysqli_num_rows($quser);
  						if($user == 0){
				          	echo "<h2 style='margin-top: 30px;'>0</h2>";
				        }else{
				          echo "<h2 style='margin-top: 30px;'>$user</h2>";
				        }
						?>
						<i class='fa fa-briefcase fa-3x'></i><br>ON TRAINING</a>
						</div>
						</div><br>

						<div class="span9">
							<div class="flip-box" style="margin-left: 320px; margin-top: 50px;">
							  <div class="flip-box-inner">
							    <div class="flip-box-front">
							    <br>
							      <h1>Birthdays</h1>
							      <i class='fa fa-birthday-cake fa-5x' style="font-size: 200px; color: red"></i>
							    </div>
							    <div class="flip-box-back">
							      <center>
							      	<?php
							      	$bday = mysqli_query($conn,"SELECT * from employee where birthdate = '$new' ")or die(mysql_error());
							      	 while ($row = mysqli_fetch_array($bday)) {

							      	 echo 
							      	 "
							      	 <div style='overflow-y: auto; height:300px;'>
							      	 <h3>".$row['firstname']." ".$row['lastname']."<h3>
							      	 </div>

							      	 ";

							      	 }
							      	?>
							      </center>
							    </div>
							  </div>
							</div>
						</div>
					
		
    </div>
<!-- <?php include('footer.php') ?> -->