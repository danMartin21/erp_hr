<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php include('navbar_dasboard.php') ?>

	<div class="row">	

						<div class="span2">
						<?php include('sidebar.php'); ?>
						</div>

						<!-- <div class="span2">
						<div class="col-sm-2">
						
						<a type='button' href="members.php" style="margin-top: 120px; height: 150px; width: 150px; margin-left: 100px;" class='btn btn-defualt'>
						<?php
						$quser = mysqli_query($conn,"SELECT * from members")or die(mysql_error());
  						$user=mysqli_num_rows($quser);
  						if($user == 0){
				          	echo " ";
				        }else{
				          echo "<h2 style='margin-top: 30px;'>$user</h2>";
				        }
						?>
						<i class='fa fa-user fa-3x'></i><br>USER</a>
						</div>
						</div> -->

						<!-- <div class="span2">
						<div class="col-sm-2">
						<?php

						?>
						<a type='button' href="items.php" style="margin-top: 120px; height: 150px; width: 150px; margin-left: 100px;" class='btn btn-warning'>
						<?php
						$qprod = mysqli_query($conn,"SELECT * from product")or die(mysql_error());
  						$product=mysqli_num_rows($qprod);
  						if($product == 0){
				          	echo " ";
				        }else{
				          echo "<h2 style='margin-top: 30px;'>$product</h2>";
				        }
						?>
						<i class='fa fa-shopping-cart fa-3x'></i><br>ITEMS</a>
						</div>
						</div>

						<div class="span2">
						<div class="col-sm-2">
						<?php

						?>
						<a type='button' style="margin-top: 120px; height: 150px; width: 150px; margin-left: 100px;" class='btn btn-info'>
						<?php
						$qmsg = mysqli_query($conn,"SELECT * from messages")or die(mysql_error());
  						$msgnum=mysqli_num_rows($qmsg);
  						if($msgnum == 0){
				          	echo " ";
				        }else{
				          echo "<h2 style='margin-top: 30px;'>$msgnum</h2>";
				        }
						?>
						<i class='fa fa-envelope fa-3x'></i><br>CHAT</a>
						</div>
						</div>

						<div class="span2">
						<div class="col-sm-2">
						<?php

						?>
						<a type='button' style="margin-top: 120px; height: 150px; width: 150px; margin-left: 100px;" class='btn btn-primary	'>
						<?php
						$qcomments = mysqli_query($conn,"SELECT * from comments")or die(mysql_error());
  						$comments=mysqli_num_rows($qcomments);
  						if($comments == 0){
				          	echo " ";
				        }else{
				          echo "<h2 style='margin-top: 30px;'>$comments</h2>";
				        }
						?>
						<i class='fa fa-comment fa-3x'></i><br>COMMENTS</a>
						</div>
						</div> -->
						
    </div>
<!-- <?php include('footer.php') ?> -->