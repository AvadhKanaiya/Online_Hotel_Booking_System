<?php
    include('conn.php');
    session_start();
    if(!isset($_SESSION['admin_username']))
    {
      header("Location:./login/login.php");
    }
    include('header.php');
    $select_query="SELECT * FROM tbl_feedback JOIN tbl_user ON tbl_user.user_id=tbl_feedback.user_id";
    $select_feedback=mysqli_query($con,$select_query);
    ?>
    <div class="container">
    <?php
    while($row=mysqli_fetch_array($select_feedback))
    {
        ?>
        <div class="row mt-3">
            <div class="col-xl">
        <div class="card">
            <h3 class="card-header text-capitalize"><?php echo $row['user_name'];?></h3>
            <div class="card-body text-capitalize">
                <?php echo $row['feedback'];?>
            </div>
        </div>
        </div>
        </div>
        <?php
    }
    ?>
    </div>
    <?php
?>
<?php
    include('footer.php');
?>