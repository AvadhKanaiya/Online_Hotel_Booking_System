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
<div class="row mt-3">
                <div class="col-xl">

                    <div class="card mt-4">
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead class="table-dark">
                      <tr>
                        <th class="text-white">Room's Name</th>
                        <th class="text-white">Room's Category</th>
                        <th class="text-white">Room's Image</th>
                        <th class="text-white">Action</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                       <?php
                          $query="SELECT tbl_room.room_id,tbl_room.room_name,tbl_category.category_name ,tbl_room.room_img from `tbl_room` JOIN `tbl_category` ON tbl_category.category_id=tbl_room.category_id ORDER BY tbl_room.category_id";
                          $select_room=mysqli_query($con,$query);
                          while($row=mysqli_fetch_array($select_room))
                          {
                            ?>
                              <tr>
                                <td><h4 class="text-uppercase"><?php echo $row['room_name'];?></h4></td>
                                <td><h4 class="text-uppercase"><?php echo $row['category_name'];?></h4></td>
                                <td>
                                  <img src="upload_img/<?php echo $row['room_img'];?>" alt="" width="200">
                                </td>
                                <td>
                                <a href="viewroom.php?room_id=<?php echo $row['room_id'];?>" class="btn btn-secondary"> View</a>
                                <a href="updateroom.php?room_id=<?php echo $row['room_id'];?>" class="btn btn-primary" > Update</a>
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

<?php
    include('footer.php');
?>