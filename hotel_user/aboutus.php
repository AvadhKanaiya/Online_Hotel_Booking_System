<?php
include('conn.php');
    session_start();
    if(!isset($_SESSION['username']))
    {
        header("Location: index.php");
    }
    include('header.php');
?>
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="hotel_img/hotel1.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="hotel_img/hotel2.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="hotel_img/hotel3.jpg" alt="Third slide">
    </div>
  </div>
</div>
<div class="container">
    <div class="row mt-5">
        <div class="col-md-6">
    <div class="card">
        <h2 class="card-header text-secondary">Welcome To Skyline Suites</h2>
  <img class="card-img-top" src="hotel_img/hotel3.jpg" alt="Card image cap">
  <div class="card-body">
    <p>Welcome to our hotel! We are delighted to have you as our guest and look forward to providing you with a comfortable and enjoyable stay. Our friendly and attentive staff are here to assist you with any needs you may have during your time with us.</p>
  </div>
</div>
</div>
<div class="col-md-6">
<div class="card">
    <h2 class="card-header text-secondary">Key Features Of Sklyline Suites</h2>
  <ul class="list-group list-group-flush">
    <li class="list-group-item text-primary font-weight-bold">Premium Location</li>
    <li class="list-group-item text-primary font-weight-bold">Security & Safety</li>
    <li class="list-group-item text-primary font-weight-bold">Comfortable Accomodation</li>
    <li class="list-group-item text-primary font-weight-bold">Recreational Facilities</li>
    <li class="list-group-item text-primary font-weight-bold">Food & Beverage </li>
    <li class="list-group-item text-primary font-weight-bold">Quality Service</li>
  </ul>
</div>
</div>
</div>
<div class="about_area">
            <div class="row">
                <div class="col-xl-7 col-lg-7">
                    <div class="about_thumb2 d-flex">
                        <div class="img_1">
                            <img src="img/about/1.png" alt="">
                        </div>
                        <div class="img_2">
                            <img src="img/about/2.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-5">
                    <div class="about_info">
                        <div class="section_title mb-20px">
                            <span>Delicious Food</span>
                            <h3>We Serve Fresh and <br>
                                Delicious Food</h3>
                        </div>
                        <p>Suscipit libero pretium nullam potenti. Interdum, blandit phasellus consectetuer dolor ornare
                            dapibus enim ut tincidunt rhoncus tellus sollicitudin pede nam maecenas, dolor sem. Neque
                            sollicitudin enim. Dapibus lorem feugiat facilisi faucibus et. Rhoncus.</p>
                    </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-center mb-100">
            <h2 class="text-primary">Enjoy Our</h2>
            <h1>Recreational Facilities.</h1>
        </div>
    </div>
    <?php
        $select_query="SELECT * from tbl_facility";
        $select_facility=mysqli_query($con,$select_query);
        while($row=mysqli_fetch_array($select_facility))
        {
            ?>
            <div class="row mb-5">
            <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                    <div class="col-md-6 text-primary text-capitalize mb-3">
                    <h3><?php echo $row['facility_name'];?></h3>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Corrupti, itaque.</p>
                    </div>
                    <div class="col-md-6">
                    <img src="upload_img/<?php echo $row['facility_img'];?>" alt="" width="100%">
                    </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
            <?php
        }
    ?>
</div>

<?php
    include('footer.php');
?>