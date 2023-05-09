<?php
    include('conn.php');
    $fac_id=$_REQUEST['fac_id'];
    $query="DELETE from `tbl_facility` WHERE fac_id='$fac_id'";
    $delete_facility=mysqli_query($con,$query);
    if($delete_facility)
    {
        ?>
        <script>
            window.location="managefacilities.php";
        </script>
        <?php
    }
    else
    {
        ?>
        <script>
            alert('Sorry! Something Went Wrong! Please Try Again.');
            window.location="managefacilities.php";
        </script>
        <?php
    }
?>