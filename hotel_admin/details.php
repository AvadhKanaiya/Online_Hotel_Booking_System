<?php
    include('conn.php');
    session_start();
    if(!isset($_SESSION['admin_username']))
    {
      header("Location:./login/login.php");
    }
    include('header.php');
    $booking_id=$_REQUEST['booking_id'];
    $select_details_query="SELECT * from tbl_book_room JOIN tbl_room ON tbl_room.room_id=tbl_book_room.room_id WHERE booking_id='$booking_id'";
    $select_details=mysqli_query($con,$select_details_query);
    while($row=mysqli_fetch_array($select_details))
    {
        $user_name=$row['user_name'];
        $phone=$row['phone'];
        $room_name=$row['room_name'];
        $checkin=$row['checkin_dt'];
        $checkout=$row['checkout_dt'];
        $adults=$row['no_of_adults'];
        $children=$row['no_of_children'];
        $book_dt=$row['book_dt'];
    }
?>
<div class="container">
    <div class="row mt-4">
        <div class="col-xl">
    <div class="card">
        <h3 class="card-header">Booking Details</h3>
    <div class="card-body">
        <h4 class="text-primary">User Name</h4>
        <h5 class="text-capitalize text-dark"><?php echo $user_name;?></h5>
        <h4 class="text-primary">Phone</h4>
        <h5 class="text-capitalize text-dark"><?php echo $phone;?></h5>
        <h4 class="text-primary">Room's Name</h4>
        <h5 class="text-capitalize text-dark"><?php echo $room_name;?></h5>
        <h4 class="text-primary">CheckIn Date</h4>
        <h5 class="text-capitalize text-dark"><?php echo $checkin;?></h5>
        <h4 class="text-primary">CheckOut Date</h4>
        <h5 class="text-capitalize text-dark"><?php echo $checkout;?></h5>
        <h4 class="text-primary">Number of Adults</h4>
        <h5 class="text-capitalize text-dark"><?php echo $adults;?></h5>
        <h4 class="text-primary">Number of Children</h4>
        <h5 class="text-capitalize text-dark"><?php echo $children;?></h5>
        <h4 class="text-primary">Booking Date</h4>
        <h5 class="text-capitalize text-dark"><?php echo $book_dt;?></h5>
        <a href="viewbooking.php" class="btn btn-secondary">Back</a>
    </div>
    </div>
    </div>
</div>
</div>
<?php
    include('footer.php');
?>