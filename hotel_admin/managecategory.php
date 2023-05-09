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
                      <form action="addcategory.php" method="POST"  enctype="multipart/form-data">
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Category Name</label>
                          <input type="text" name="category_name" class="form-control text-uppercase" id="basic-default-fullname" placeholder="Enter Room Category's Name" required/>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-company">Room Category's Image</label>
                          <input type="file" name="category_img" class="form-control" id="basic-default-company" required >
                        </div>
                        <input type="submit" class="btn btn-primary" value="ADD" name="add_category">
                      </form>
                    </div>
                    <div class="card mt-4">
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead class="table-dark">
                      <tr>
                        <th class="text-white">Category's Name</th>
                        <th class="text-white">Category's Image</th>
                        <th class="text-white">Action</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                       <?php
                          $query="SELECT * from `tbl_category`";
                          $select_category=mysqli_query($con,$query);
                          while($row=mysqli_fetch_array($select_category))
                          {
                            ?>
                              <tr>
                                <td><h4 class="text-uppercase"><?php echo $row['category_name'];?></h4></td>
                                <td>
                                  <img src="upload_img/<?php echo $row['category_img'];?>" alt="" width="200">
                                </td>
                                <td>
                                  <a href="updatecategory.php?cat_id=<?php echo $row['category_id'];?>" class="btn btn-primary ">Update</a>
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