<?php
    include('conn.php');
    session_start();
    if(!isset($_SESSION['admin_username']))
    {
      header("Location:./login/login.php");
    }
    include('header.php');
    $fac_id=$_REQUEST['fac_id'];
    $select_query="SELECT * FROM `tbl_facility` where `fac_id`='$fac_id'";
    $select_facility=mysqli_query($con,$select_query);
    while($row=mysqli_fetch_array($select_facility))
    {
        $facility_name=$row['facility_name'];
        $facility_img=$row['facility_img'];
    }
    if(isset($_POST['update_facility']))
    {
        $update_fac_name=$_POST['facility_name'];
        $old_fac_img=$_POST['fac_old_img'];
        $new_fac_image=$_FILES['facility_img'] ['name'];
        if($new_fac_image != '')
        {
          $update_fac_img=$_FILES['facility_img'] ['name'];
        }
        else
        {
            $update_fac_img=$old_fac_img;
        }
        $update_query="UPDATE `tbl_facility` SET facility_name='$update_fac_name',facility_img='$update_fac_img' WHERE fac_id='$fac_id'";
        $update_fac=mysqli_query($con,$update_query);
        if($update_fac)
      {
        if($new_fac_image != '')
        {
            move_uploaded_file($_FILES['facility_img']['tmp_name'],"upload_img/".$update_fac_img);
            // unlink("upload_img/".$old_img);
            ?>
            <script>
              alert("Congrats! Category has been updated");
              window.location="managefacilities.php";
            </script>
            <?php
        }
        ?>
        <script>
          alert("Congrats! Category has been updated");
              window.location="managefacilities.php";
        </script>
        <?php
      }
      else
      {
        ?>
          <script>
            alert('Sorry!Something went wrong.Please try again.');
            window.location="managefacilities.php";
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
                      <h5 class="mb-0">Update Facility</h5>
                    </div>
                    <div class="card-body">
                      <form action="#" method="POST"  enctype="multipart/form-data">
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Facility Name</label>
                          <input type="text" name="facility_name" class="form-control text-uppercase" id="basic-default-fullname" value="<?php echo $facility_name;?>" required/>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-company">Facility Image</label><br>
                          <img src="upload_img/<?php echo $facility_img;?>" alt="" width="200">
                          <input type="file" name="facility_img" class="form-control mt-3" id="basic-default-company" >
                          <input type="hidden" name="fac_old_img" value="<?php echo $facility_img;?>">
                        </div>
                        <input type="submit" class="btn btn-primary" value="Update" name="update_facility">
                        <a href="managefacilities.php" class="btn btn-secondary">Back</a>
                      </form>
                    </div>
                  </div>
                </div>
                </div>
<?php
    include('footer.php');
?>