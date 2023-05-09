<?php
    include('conn.php');
    if(isset($_POST['add_room']))
    {
        $room_name=$_POST['room_name'];
        $no_adults=$_POST['no_adult'];
        $no_children=$_POST['no_children'];
        $room_type=$_POST['room_type'];
        $room_img=$_FILES['room_img'] ['name'];
        $room_price=$_POST['price'];
        $room_desc=$_POST['room_desc'];
        $query="INSERT INTO `tbl_room`(`room_name`,`no_of_adults`,`no_of_children`,`category_id`,`room_price`,`room_img`,`room_desc`) 
        VALUES('$room_name','$no_adults','$no_children','$room_type','$room_price','$room_img','$room_desc') ";
        $insert_room=mysqli_query($con,$query);
        if($insert_room)
        {
            move_uploaded_file($_FILES['room_img'] ['tmp_name'],"upload_img/".$room_img);
            ?>
            <script>
                alert("Congrats!! Room Has Been Added.");
                window.location="addroom.php";
            </script>
            <?php
        }
        else
        {
            ?>
            <script>
                alert("Sorry! Something Went Wrong.Please Try Again.");
                window.location="addroom.php";
            </script>
            <?php
        }
    }
?>