<?php include('dbcon.php'); ?>
<div class="navbar">
    <div class="navbar-inner">
        <div class="pull-right">
            <ul class="nav">
                <li><a href="#"><div class="icon_size"><i class="icon-user icon-large"></i>&nbsp;&nbsp;
                <?php
                  $q = mysqli_query($conn,"SELECT * from admin where id='$session_id'")or die(mysqli_error());
                  while ($row = mysqli_fetch_assoc($q)){
                      // $img="<img class='js-tilt' src='img/".$row['image']."' alt='Profile Picture' style='width:20px; height:20px; border-radius: 50%'>";
                      $hi="Hi";  
                      $usern=$row['username'];
                      echo " " . $hi . " ". $usern;
                    
                  }
                  
                  ?>
                </div></a></li>
                <li class="divider-vertical"></li>
                <li><a href="dasboard.php"><div class="icon_size"><i class="fa fa-home"></i></div></a></li>
                <li class="divider-vertical"></li>
                <li>

                    <div class="btn-group">
                        <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-cogs"></i>
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#myModal" data-toggle="modal"><i class="icon-signout icon-large"></i>&nbsp;Logout</a></li>


                        </ul>
                    </div>
                    </div>
                    </div>

                    <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                            <h3 id="myModalLabel">Logout</h3>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure you want to logout?</p>
                        </div>
                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">No</button>
                            <a href="logout.php" class="btn btn-primary">Yes</a>
                        </div>
                    </div>


                    </div>		