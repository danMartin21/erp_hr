<!-- Button to trigger modal -->
<a href="#add_ads" role="button" class="btn btn-info" data-toggle="modal"><i class="fa fa-plus"></i>&nbsp;Add Advertisement</a>
<br>
<br>
<!-- Modal -->
<div id="add_ads" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <div class="alert alert-info" style="background-color: rgb(15, 15, 87);">Add Advertisement</div>
    </div>
    <div class="modal-body">
        <form class="form-horizontal" method="POST" enctype="multipart/form-data">
            <center><img src="" style="display:none" height="150" width="150" id="image"></center>
            <div class="control-group">
                <label class="control-label" for="inputEmail">Addvertisement</label>
                <div class="controls">
                    <input type="file" name="file"  accept="image/*" onchange="showImage.call(this)" required autocomplete="on" ></input>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <button type="submit" name="ad" class="btn btn-info">Add</button>
                </div>
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    </div>
</div>

<script>
    function showImage() 
    {

      if (this.files && this.files[0]) 
      {
        var obj  = new FileReader();
        obj.onload = function(data){
          var image = document.getElementById("image"); 
          image.src = data.target.result;
          image.style.display = "block";
        }
        obj.readAsDataURL(this.files[0]);
      }
    }
</script>

<?php
$conn=mysqli_connect("localhost","root","","e-benta")or die(mysql_error());
if (isset($_POST['ad'])) {
    move_uploaded_file($_FILES['file']['tmp_name'],"../img/".$_FILES['file']['name']);

    $add_img=$_FILES['file']['name'];

    mysqli_query($conn,"insert into ads (image) values('$add_img')")or die(mysqli_error($conn));
    ?>
    <script>
        window.location = "ads.php";
    </script>
    <?php
}
?>