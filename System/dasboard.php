<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php include('navbar_dasboard.php') ?>

	<div class="row">	

						<div class="span2">
						<?php include('sidebar.php'); ?>
						</div>

						<div class="span2">
						<div class="col-sm-2">
						
						<a type='button' href="members.php" style="margin-top: 20px; height: 150px; width: 150px; margin-left: 100px;" class='btn btn-basic'>
						<?php
						$quser = mysqli_query($conn,"SELECT * from employees")or die(mysql_error());
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
						
						<div class="span2">
						<div class="col-sm-2">
						
						<a type='button' href="members.php" style="margin-top: 20px; height: 150px; width: 150px; margin-left: 100px;" class='btn btn-info'>
						<?php
						$quser = mysqli_query($conn,"SELECT * from employees where employee_id=' ' ")or die(mysql_error());
  						$user=mysqli_num_rows($quser);
  						if($user == 0){
				          	echo "<h2 style='margin-top: 30px;'>0</h2>";
				        }else{
				          echo "<h2 style='margin-top: 30px;'>$user</h2>";
				        }
						?>
						<i class='fa fa-users fa-3x'></i><br>APPLICANT</a>
						</div>
						</div>

						<div class="span2">
						<div class="col-sm-2">
						
						<a type='button' href="members.php" style="margin-top: 20px; height: 150px; width: 150px; margin-left: 100px;" class='btn btn-warning'>
						<?php
						$quser = mysqli_query($conn,"SELECT * from leaves where employee_id=' ' ")or die(mysql_error());
  						$user=mysqli_num_rows($quser);
  						if($user == 0){
				          	echo "<h2 style='margin-top: 30px;'>0</h2>";
				        }else{
				          echo "<h2 style='margin-top: 30px;'>$user</h2>";
				        }
						?>
						<i class='fa fa-users fa-3x'></i><br>ON LEAVE</a>
						</div>
						</div>
					
		
    </div>
<!-- <?php include('footer.php') ?> -->