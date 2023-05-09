<?php
    include('conn.php');
    session_start();
    if(!isset($_SESSION['admin_username']))
    {
      header("Location:./login/login.php");
    }
    include('header.php');
    $room_id=$_REQUEST['room_id'];
    $select_query="SELECT * from tbl_room JOIN tbl_category ON tbl_category.category_id=tbl_room.category_id WHERE room_id='$room_id'";
    $select_details=mysqli_query($con,$select_query);
    while($row=mysqli_fetch_array($select_details))
    {
        $room_name=$row['room_name'];
        $no_adults=$row['no_of_adults'];
        $no_children=$row['no_of_children'];
        $category=$row['category_name'];
        $room_price=$row['room_price'];
        $room_img=$row['room_img'];
        $room_desc=$row['room_desc'];
    }
    if(isset($_POST['update_room']))
    {
        $update_name=$_POST['room_name'];
        $update_adult=$_POST['no_adult'];
        $update_children=$_POST['no_children'];
        $old_img=$_POST['room_old_img'];
        $new_img=$_FILES['room_img']['name'];
        $update_price=$_POST['price'];
        $update_desc=$_POST['room_desc'];
        if($new_img != '')
        {
            $update_room_img=$_FILES['room_img']['name'];
        }
        else
        {
            $update_room_img=$old_img;
        }
        $update_query="UPDATE tbl_room SET room_name='$update_name',no_of_adults='$update_adult',no_of_children='$update_children',room_price='$update_price',room_img='$update_room_img',room_desc='$update_desc' where room_id='$room_id'";
        $update_room=mysqli_query($con,$update_query);
        if($update_room)
        {
          if($new_img != '')
          {
              move_uploaded_file($_FILES['room_img']['tmp_name'],"upload_img/".$update_room_img);
              // unlink("upload_img/".$old_img);
              ?>
              <script>
                alert("Congrats! Category has been updated");
                window.location="manageroom.php";
              </script>
              <?php
          }
          ?>
          <script>
            alert("Congrats! Category has been updated");
                window.location="manageroom.php";
          </script>
          <?php
        }
        else
        {
          ?>
            <script>
              alert('Sorry!Something went wrong.Please try again.');
              window.location="manageroom.php";
            </script>
          <?php
        }
    }
?>
<div class="container">
<div class="row col-md-12 mt-3">
                <div class="col-xl">
                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h3 class="mb-0">Update Room</h5>
                    </div>
                    <div class="card-body">
                      <form action="#" method="POST"  enctype="multipart/form-data">
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Room Name</label>
                          <input type="text" name="room_name" class="form-control text-uppercase" id="basic-default-fullname" value="<?php echo $room_name;?>" required/>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Number of Adults</label>
                          <input type="number" name="no_adult" class="form-control text-uppercase" id="basic-default-fullname" value="<?php echo $no_adults;?>" required min="1" max="6"/>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Number of Children</label>
                          <input type="number" name="no_children" class="form-control text-uppercase" id="basic-default-fullname" value="<?php echo $no_children;?>" required min="1" max="6"/>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-company">Room's Image</label><br>
                          <img src="upload_img/<?php echo $room_img;?>" width="200" class="mb-3">
                          <input type="file" name="room_img" class="form-control" id="basic-default-company" >
                          <input type="hidden" name="room_old_img" value="<?php echo $room_img;?>">
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Room's Price</label>
                          <input type="text" name="price" class="form-control text-uppercase" id="basic-default-fullname" value="<?php echo $room_price;?>" required/>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Room Description</label>
                          <textarea name="room_desc" cols="30" rows="10" class="form-control"><?php echo $room_desc;?></textarea>
                        </div>
                        <input type="submit" class="btn btn-primary" value="UPDATE" name="update_room">
                        <a href="manageroom.php" class="btn btn-secondary">Back</a>
                      </form>
                    </div>
                  </div>
                </div>
                </div>
<?php
    include('footer.php');
?>