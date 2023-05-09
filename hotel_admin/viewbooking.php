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
                        <th class="text-white">User Name</th>
                        <th class="text-white">Phone</th>
                        <th class="text-white">Room's Name</th>
                        <th class="text-white">View Details</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                       <?php
                          $query="SELECT * from tbl_book_room JOIN tbl_room ON tbl_room.room_id=tbl_book_room.room_id";
                          $select_booking=mysqli_query($con,$query);
                          while($row=mysqli_fetch_array($select_booking))
                          {
                            ?>
                              <tr>
                                <td><h4 class="text-uppercase"><?php echo $row['user_name'];?></h4></td>
                                <td><h4 class="text-uppercase"><?php echo $row['phone'];?></h4></td>
                                <td><h4 class="text-uppercase"><?php echo $row['room_name'];?></h4></td>
                                <td>
                                <a href="details.php?booking_id=<?php echo $row['booking_id'];?>" class="btn btn-primary"> View</a>
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