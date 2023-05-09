<?php
    include('conn.php');
    session_start();
    if(!isset($_SESSION['admin_username']))
    {
      header("Location:./login/login.php");
    }
    include('header.php');
    $room_id=$_REQUEST['room_id'];
    $select_query="SELECT * from tbl_room JOIN tbl_category ON tbl_category.category_id=tbl_room.category_id WHERE room_id='$room_id'";
    $select_details=mysqli_query($con,$select_query);
    while($row=mysqli_fetch_array($select_details))
    {
        $room_name=$row['room_name'];
        $no_adults=$row['no_of_adults'];
        $no_children=$row['no_of_children'];
        $category=$row['category_name'];
        $room_price=$row['room_price'];
        $room_img=$row['room_img'];
        $room_desc=$row['room_desc'];
    }
?>
<div class="container">
    <div class="row mt-4">
        <div class="col-xl">
    <div class="card">
        <h3 class="card-header">Room Details</h3>
    <div class="card-body">
        <h4 class="text-primary">Room's Name</h4>
        <h5 class="text-capitalize text-dark"><?php echo $room_name;?></h5>
        <h4 class="text-primary">Number of adults</h4>
        <h5 class="text-capitalize text-dark"><?php echo $no_adults;?></h5>
        <h4 class="text-primary">Number of children</h4>
        <h5 class="text-capitalize text-dark"><?php echo $no_children;?></h5>
        <h4 class="text-primary">Category</h4>
        <h5 class="text-capitalize text-dark"><?php echo $category;?></h5>
        <h4 class="text-primary">Room's Price</h4>
        <h5 class="text-capitalize text-dark"><?php echo $room_price;?></h5>
        <h4 class="text-primary">Room's Image</h4>
        <img src="upload_img/<?php echo $room_img;?>" class="mb-3" width="250">
        <h4 class="text-primary">Room's Description</h4>
        <h5 class="text-capitalize text-dark"><?php echo $room_desc;?></h5>
        <a href="manageroom.php" class="btn btn-secondary">Back</a>
    </div>
    </div>
    </div>
</div>
</div>
<?php
    include('footer.php');
?>