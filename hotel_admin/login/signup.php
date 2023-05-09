<?php
    include('conn.php');
    if(isset($_POST['signup']))
    {

    
    $username=stripslashes($_POST['username']);
    $username = mysqli_real_escape_string($con, $username);
    $email    = stripslashes($_POST['email']);
    $email    = mysqli_real_escape_string($con, $email);
    $password = stripslashes($_POST['password']);
    $password = mysqli_real_escape_string($con, $password);
    $phone=$_POST['phone'];
    $dob=$_POST['dob'];
    $query    = "INSERT into `tbl_user` (user_name, user_pwd, user_mail, user_phone,user_dob)
    VALUES ('$username','" . md5($password) . "', '$email', $phone,'$dob')";
    $result= mysqli_query($con, $query);
    if($result)
    {
        ?>
        <script>
            alert("your account has been created");
        </script>
        <?php
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Free Stylish Login Page Website Template | Smarteyeapps.com</title>

    <link rel="shortcut icon" href="assets/images/fav.jpg">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fontawsom-all.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
</head>

<body>
    <div class="container-fluid ">
        <div class="container ">
            <div class="row">
                
                <div class="col-sm-10 login-box mb-2 mt-4">
                    <div class="row">
                       <div class="col-lg-4 col-md-5 box-de">
                           <div class="small-logo">
                                <i class="fas fa-heartbeat"></i> Health On Click
                            </div>
                            <div class="ditk-inf sup-oi">
                                <h2 class="w-100">Already Have an Account </h2>
                                <p>Simply login to your account by clicking the login Button</p>
                                <a href="login.php">
                                    <button type="button" class="btn btn-outline-light">SIGN IN</button>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-7 log-det">
                            
                            <h2 style="margin-bottom: 50px;">Create Account</h2>
                            <div class="text-box-cont">
                                <form action="#" method="POST">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                        <i class="far fa-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Full Name"  name="username" aria-describedby="basic-add">
                                </div>
                                 <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                            <i class="far fa-envelope"></i>
                                        </span>
                                    </div>
                                    <input type="email" class="form-control" placeholder="Email Address" name="email"  aria-describedby="basic-addon1">
                                </div>
                                 <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                                    </div>
                                    <input type="password" class="form-control" placeholder="Password" name="password" aria-describedby="basic-addon1">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-phone"></i></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Phone number" name="phone" aria-describedby="basic-addon1">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="date" class="form-control" placeholder="Date Of Birth" name="dob" aria-describedby="basic-addon1">
                                </div>
                                <div class="input-group center sup mb-3">
                                    <input type="submit" name="signup" value="SIGN UP" class="btn-success btn" style="border-radius:50px;">
                                </div>  
                            </form>  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="assets/js/jquery-3.2.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/script.js"></script>


</html>
