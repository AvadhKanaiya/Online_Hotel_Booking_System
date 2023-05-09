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
                      <h5 class="mb-0">Add Facility</h5>
                    </div>
                    <div class="card-body">
                      <form action="addfacility.php" method="POST"  enctype="multipart/form-data">
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Facility Name</label>
                          <input type="text" name="facility_name" class="form-control text-uppercase" id="basic-default-fullname" placeholder="Enter Facility's Name" required/>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-company">Facility Image</label>
                          <input type="file" name="facility_img" class="form-control" id="basic-default-company" required >
                        </div>
                        <input type="submit" class="btn btn-primary" value="ADD" name="add_facility">
                      </form>
                    </div>
                    <div class="card mt-4">
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead class="table-dark">
                      <tr>
                        <th class="text-white">Facility's Name</th>
                        <th class="text-white">Facility's Image</th>
                        <th class="text-white">Action</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                       <?php
                          $query="SELECT * from `tbl_facility`";
                          $select_facility=mysqli_query($con,$query);
                          while($row=mysqli_fetch_array($select_facility))
                          {
                            ?>
                              <tr>
                                <td><h4 class="text-uppercase"><?php echo $row['facility_name'];?></h4></td>
                                <td>
                                  <img src="upload_img/<?php echo $row['facility_img'];?>" alt="" width="200">
                                </td>
                                <td>
                                <a href="updatefacility.php?fac_id=<?php echo $row['fac_id'];?>" class="btn btn-primary ">Update</a>
                                <a href="deletefacility.php?fac_id=<?php echo $row['fac_id'];?>" class="btn btn-danger " onclick="return confirm('Are you sure? You want to delete this record?')">Delete</a>
                                </td>
                              </tr>    
                            <?php
                          }
                       ?>
                        
                    </tbody>
                  </table>
                </div>
              </div>
                  </div>
                </div>
                </div>
<?php
    include('footer.php');
?>