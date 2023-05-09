<?php
    include('conn.php');
    if(isset($_POST['add_facility']))
    {
        $facility_name=$_POST['facility_name'];
        $facility_img=$_FILES['facility_img'] ['name'];
        $query="INSERT INTO `tbl_facility` (`facility_name`,`facility_img`) VALUES('$facility_name','$facility_img')";
        $insert_fac=mysqli_query($con,$query);
        if($insert_fac)
        {
            move_uploaded_file($_FILES['facility_img'] ['tmp_name'],"upload_img/".$facility_img);
            ?>
            <script>
                alert("Congrats!! Facility Has Been Added.");
                window.location="managefacilities.php";
            </script>
            <?php
        }
        else
        {
            ?>
            <script>
                alert("Sorry! Something Went Wrong.Please Try Again.");
                window.location="managefacilities.php";
            </script>
            <?php
        }
    }
?>