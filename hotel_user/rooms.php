<?php
    include('conn.php');
    session_start();
    if(!isset($_SESSION['username']))
    {
        header("Location: ./login/login.php");
    }
    include('header.php');
?>
<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="upload_img/delux.png" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="upload_img/honeymoon_suites_room.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="upload_img/master_suite_room.jpg" alt="Third slide">
    </div>
  </div>
</div>
<div class="container">
<div class="card mt-5 mb-4">
                <div class="table-responsive">
                  <table class="table">
                    <thead class="table-dark">
                      <tr>
                        <th class="text-white">Room's Name</th>
                        <th class="text-white">Room's Image</th>
                        <th class="text-white">Description</th>
                        <th class="text-white">Booking</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      <?php
                        $query="SELECT * from `tbl_room` JOIN tbl_category ON tbl_category.category_id=tbl_room.category_id ORDER BY tbl_room.category_id";
                        $select_room=mysqli_query($con,$query);
                        while($row=mysqli_fetch_array($select_room))
                        {
                          ?>
                          <tr>
                          <td><?php echo $row['room_name'];?></td>
                          <td>
                            <img src="upload_img/<?php echo $row['room_img'];?>" alt="" width="300">
                          </td>
                          <td>
                          <ul class="font-weight-bold text-capitalize">

                                <li class=" text-success">Category: <?php echo $row['category_name'];?></li>
                                <li>Number Of Adults: <?php echo $row['no_of_adults'];?></li>
                                <li>Number Of Children: <?php echo $row['no_of_children'];?></li>
                                <li class="text-primary ">Facilities: <?php echo $row['room_desc'];?></li>
                                <li class="text-danger">Price: &#x20b9;<?php echo $row['room_price'];?></li>
                            </ul>
                        </td>
                          <td>
                            <a href="bookroom.php?room_id=<?php echo $row['room_id'];?>" class="btn btn-primary">Book</a>
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