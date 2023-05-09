<?php
    include('conn.php');
    session_start();
    if(isset($_POST['login']))
    {
        $username = stripslashes($_POST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_POST['user_pwd']);
        $password = mysqli_real_escape_string($con, $password);
        // echo md5($password);
        $query    = "SELECT * FROM `tbl_user` WHERE user_name='$username'
                     AND user_pwd='" . md5($password) . "'";;
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            $row=mysqli_fetch_row($result);
            $_SESSION['user_id'] = $row[0];
            // Redirect to user dashboard page
            header("Location: ../");
            ?>
            <script>
                // alert("you have loggedin successfully");
                
            </script>
            <?php
        } 
        else {
           ?>
           <script>
            alert("try again");
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
    <title>Skyline Suites Signin</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script> 
    <link rel="shortcut icon" href="assets/images/fav.jpg">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fontawsom-all.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
</head>

<body>
    <div class="container-fluid mt-4">
        <div class="container ">
            <div class="row ">
                <div class="col-sm-10 login-box">
                    <div class="row">
                        <div class="col-lg-8 col-md-7 log-det">
                            <h2 style="margin-bottom: 50px;">Sign in</h2>
                           
                            <div class="text-box-cont">
                            <form action="#" method="POST" id="user_login">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                    </div><br>
                                    <input type="text" class="form-control" placeholder="Username" name="username">
                                </div>
                                 <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                                    </div>
                                    <input type="password" class="form-control" placeholder="Password" name="user_pwd">
                                </div>
                                <div class="input-group center mb-3">
                                    <input type="submit" class="btn btn-success btn-round" style="border-radius:50px;" name="login" value="LOGIN">
                                </div>  
                                </form>
                            </div>
                        </div>
                    
                        <div class="col-lg-4 col-md-5 box-de">
                        <div class="small-logo">
                                <img src="../img/logo1.png" class="ml-5" alt="" width="150">
                            </div>
                            <div class="ditk-inf mb-4">
                                <h4 class="w-100">Hey There!!</h4>
                                <h5>Welcome Back! </h5>
                                <p>Please Enter your details for access your portal.</p>
                                <a href="signup.php">
                                <button type="button" class="btn btn-outline-light">SIGN UP</button>
                                </a>
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
<script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <script>
        $(document).ready(function () {
 
            $("#user_login").validate({
                // in 'rules' user have to specify all the constraints for respective fields
                rules: {
                    username: {
                        required: true,
                        // minlength: 2 //for length of lastname
                    },
                    user_pwd: {
                        required: true,
                        // minlength: 5
                    },
                },
                // in 'messages' user have to specify message as per rules
                messages: {

                    username: {
                        required:"Please enter a username",
                    },
                    user_pwd: {
                        required:"Please enter a password",
                    },
                },
            });
        });
 
    </script>
</script>