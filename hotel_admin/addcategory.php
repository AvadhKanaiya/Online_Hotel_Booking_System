<?php
    include('conn.php');
    if(isset($_POST['add_category']))
    {
        $category_name=$_POST['category_name'];
        $category_img=$_FILES['category_img'] ['name'];
        $query="INSERT INTO `tbl_category` (`category_name`,`category_img`) VALUES('$category_name','$category_img')";
        $insert_category=mysqli_query($con,$query);
        if($insert_category)
        {
            move_uploaded_file($_FILES['category_img'] ['tmp_name'],"upload_img/".$category_img);
            ?>
            <script>
                alert("Congrats!! Category Has Been Added.");
                window.location="managecategory.php";
            </script>
            <?php
        }
        else
        {
            ?>
            <script>
                alert("Sorry! Something Went Wrong.Please Try Again.");
                window.location="managecategory.php";
            </script>
            <?php
        }
    }
?>