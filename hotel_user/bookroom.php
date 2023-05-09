<?php
    include('conn.php');
    session_start();
    if(!isset($_SESSION['username']))
    {
        header("Location: ./login/login.php");
    }
    include('header.php');
    $room_id=$_REQUEST['room_id'];
    if(isset($_POST['book_room']))
    {
        $user_name=$_POST['name'];
        $phone=$_POST['phone'];
        $checkin=$_POST['checkindate'];
        $checkout=$_POST['checkoutdate'];
        $adult=$_POST['adult'];
        $children=$_POST['children'];
        $book_date=date("Y-m-d");
        $query="INSERT INTO `tbl_book_room`(`user_name`,`phone`,`room_id`,`checkin_dt`,`checkout_dt`,`no_of_adults`,`no_of_children`,`book_dt`) 
        VALUES('$user_name','$phone','$room_id','$checkin','$checkout','$adult','$children','$book_date') ";
        $insert_book=mysqli_query($con,$query);
        if($insert_book)
        {
            ?>
            <script>
                alert("Congrats! Your Room Has Been Successfully Booked. See You In Hotel");
                window.location="index.php";
            </script>
            <?php
        }
        else
        {
            ?>
            <script>
                alert("Sorry! Something Went Wrong. Please Try Again.");
                window.location="bookroom.php";
            </script>
            <?php
        }
    }
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
    <div class="row mt-5 mb-5">
        <div class="col-md-6">
            <?php
                
                $select_room_query="SELECT * from tbl_room where room_id='$room_id'";
                $select_room=mysqli_query($con,$select_room_query);
                while($row=mysqli_fetch_array($select_room))
                {
                    $room_name=$row['room_name'];
                    $room_img=$row['room_img'];
                    $adult=$row['no_of_adults'];
                    $children=$row['no_of_children'];
                    $price=$row['room_price'];
                }
            ?>
            <div class="card">
                <h3 class="card-header">Room Details</h3>
                <div class="card-body">
                    <img src="upload_img/<?php echo $room_img;?>" alt="" width="100%">
                    <h3 class="text-primary text-capitalize mt-2">Name: <?php echo $room_name;?></h3>
                    <h3 class="text-danger text-capitalize mt-2">Price: &#x20b9; <?php echo $price;?></h3>
                </div>
            </div>
        </div>
        <div class="col-md-6">
        <div class="col-lg-8">
                       <form action="#" method="POST" class="form-contact contact_form">
                       <div class="row">
                        <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control valid border border-dark" name="name" id="name" type="text"  placeholder="Enter your name">
                                    </div>
                                </div>
                         </div>
                         <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control border border-dark valid" name="phone" id="" type="text"  placeholder="Phone Number">
                                    </div>
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">CheckIn Date</label>
                                        <input class="form-control border border-dark valid" name="checkindate" id="" type="date" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" placeholder="Checkin Date">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">CheckOut Date</label>
                                        <input class="form-control border border-dark valid" name="checkoutdate" id="" type="date" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" placeholder="Checkout Date">
                                    </div>
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control border border-dark valid" name="adult" id="number" type="number" placeholder="Select number of adults" min="1" max="<?php echo $adult;?>">
                                    </div>
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control border border-dark valid" name="children" id="email" type="number"  placeholder="Select number of children" min="0" max="<?php echo $children;?>">
                                    </div>
                                </div>
                                </div>
                            <!-- <input type="submit" name="send_feedback"> -->
                            <div class="form-group mt-3">
                                <input type="submit" value="BOOK ROOM" class="button-contactForm boxed-btn" name="book_room">
                            </div>
                       </form>
                    </div>
        </div>
    </div>
</div>

<?php
    include('footer.php');
?>