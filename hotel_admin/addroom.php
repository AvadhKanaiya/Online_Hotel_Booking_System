<?php
    include('conn.php');
    session_start();
    if(!isset($_SESSION['admin_username']))
     {
        header("Location:./login/login.php");
    }
    include('header.php');
?>
<div class="container">
<div class="row col-md-12 mt-3">
                <div class="col-xl">
                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Add Room Category</h5>
                    </div>
                    <div class="card-body">
                      <form action="addroombackend.php" method="POST"  enctype="multipart/form-data">
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Room Name</label>
                          <input type="text" name="room_name" class="form-control text-uppercase" id="basic-default-fullname" placeholder="Enter Room's Name" required/>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Number of Adults</label>
                          <input type="number" name="no_adult" class="form-control text-uppercase" id="basic-default-fullname" placeholder="Select number of adults" required min="1" max="6"/>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Number of Children</label>
                          <input type="number" name="no_children" class="form-control text-uppercase" id="basic-default-fullname" placeholder="Select number of children" required min="1" max="6"/>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-company">Select Room Type</label>
                          <select name="room_type" class="form-control">
                           <?php
                                $query="select * from `tbl_category`";
                                $select_cat=mysqli_query($con,$query);
                                while($row=mysqli_fetch_array($select_cat))
                                {
                                    ?>
                                    <option value="<?php echo $row['category_id'];?>"><?php echo $row['category_name'];?></option>
                                    <?php
                                }
                           ?>
                          </select>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-company">Room's Image</label>
                          <input type="file" name="room_img" class="form-control" id="basic-default-company" required >
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Room's Price</label>
                          <input type="text" name="price" class="form-control text-uppercase" id="basic-default-fullname" placeholder="Enter Price of the Room" required/>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Room Description</label>
                          <textarea name="room_desc" cols="30" rows="10" class="form-control" placeholder="Enter Room Description"></textarea>
                        </div>
                        <input type="submit" class="btn btn-primary" value="ADD" name="add_room">
                      </form>
                    </div>
                  </div>
                </div>
                </div>

<?php
    include('footer.php');
?>