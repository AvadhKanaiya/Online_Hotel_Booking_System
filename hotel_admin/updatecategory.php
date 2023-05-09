<?php
    include('conn.php');
    session_start();
    if(!isset($_SESSION['admin_username']))
    {
      header("Location:./login/login.php");
    }
    include('header.php');
    $cat_id=$_REQUEST['cat_id'];
    $select_query="SELECT * FROM `tbl_category` WHERE `category_id`='$cat_id'";
    $select_category=mysqli_query($con,$select_query);
    while($row=mysqli_fetch_array($select_category))
    {
        $cat_name=$row['category_name'];
        $cat_img=$row['category_img'];
    }
    if(isset($_POST['update_category']))
    {
      $cat_name=$_POST['category_name'];
      $old_img=$_POST['cat_old_img'];
      $newimage=$_FILES['category_img'] ['name'];
      if($newimage != '')
      {
          $update_img=$_FILES['category_img'] ['name'];
      }
      else
      {
        $update_img=$old_img;
      }
      $update_query="UPDATE tbl_category SET category_name='$cat_name',category_img='$update_img' WHERE category_id='$cat_id'";
      $update_category=mysqli_query($con,$update_query);
      if($update_category)
      {
        if($_FILES['category_img'] ['name'] != '')
        {
            move_uploaded_file($_FILES['category_img']['tmp_name'],"upload_img/".$_FILES['category_img'] ['name']);
            // unlink("upload_img/".$old_img);
            ?>
            <script>
              alert("Congrats! Category has been updated");
              window.location="managecategory.php";
            </script>
            <?php
        }
        ?>
        <script>
          alert("Congrats! Category has been updated");
              window.location="managecategory.php";
        </script>
        <?php
      }
      else
      {
        ?>
          <script>
            alert('Sorry!Something went wrong.Please try again.');
            window.location="managecategory.php";
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
                      <h5 class="mb-0">Update Room Category</h5>
                    </div>
                    <div class="card-body">
                      <form action="#" method="POST"  enctype="multipart/form-data">
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Category Name</label>
                          <input type="text" name="category_name" class="form-control text-uppercase" id="basic-default-fullname" placeholder="Enter Room Category's Name" required value="<?php echo $cat_name;?>"/>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-company">Room Category's Image</label><br>
                          <img src="upload_img/<?php echo $cat_img;?>" alt="" width="200">
                          <input type="file" name="category_img" class="form-control mt-3" id="basic-default-company" >
                          <input type="hidden" value="<?php echo $cat_img;?>" name="cat_old_img">
                        </div>
                        <input type="submit" class="btn btn-primary" value="Update" name="update_category">
                        <a href="managecategory.php" class="btn btn-secondary">Back</a>
                      </form>
                    </div>
                  </div>
                </div>
                </div>
<?php
    include('footer.php');
?>