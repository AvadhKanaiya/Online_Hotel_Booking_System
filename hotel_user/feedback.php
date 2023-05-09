<?php
    session_start();
    include("conn.php");
    if(isset($_POST['send_feedback']))
    {
        $user_id=$_SESSION['user_id'];
        $message=$_POST['message'];
        $date=date("Y-m-d");
        $q="INSERT INTO `tbl_feedback`(`user_id`, `date`, `feedback`) VALUES ('$user_id','$date','$message')";
        $insert_feedback=mysqli_query($con,$q);
        if($insert_feedback)
        {
            ?>
            <script>
                alert("Thank You! Your Feedback has been submitted. Your Feedback is valuable to US.");
                window.location="index.php";
            </script>
            <?php
        }
        else
        {
            ?>
            <script>
                alert("Sorry.Something Went Wrong! Please Try Again.");
                window.location="contact.php";
            </script>
            <?php
        }
    }
?>