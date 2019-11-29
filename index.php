<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
        <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-144195172-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-144195172-1');
    </script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Local Connection</title>
    <meta name="description" content="Local Connection. Travel using local guides">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Mukta:400,700|Ubuntu:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

</head>
<body class="">
    <div class="background">
        <header>
            <nav class="navbar navbar-expand-md navbar-dark bg-dark">
                <a class="" href="index.php"><img src="./images/logow.png" alt="" style="width:200px;" class="navlogo"></a>
                <button class="navbar-toggler text-white" type="button" data-toggle="collapse" data-target="#navtoggle">
                    <span class="navbar-toggler-icon text-white"></span>
                </button>
                <div class="collapse navbar-collapse" id="navtoggle">
                    <div class="navbar-nav navlinksheader ml-auto">
                        <a class="nav-item nav-link text-white citiesnav" href="cities.php">Cities</a>
                        <a class="nav-item nav-link text-white aboutunav" href="aboutus.php">About Us</a>
                        <?php session_start(); if(isset($_SESSION["lemail"])) {
                        echo '<a class="nav-item nav-link text-white " href="profile.php">Profile</a>';
                        }?> 
                        <?php session_start(); if(!isset($_SESSION["lemail"])) {
                        echo '<a class="nav-item nav-link text-white loginnav" href="#">Log In</a>';
                        } else {
                        echo '<a class="nav-item nav-link text-white" href="logout.php">Log Out</a>';
                        }?> 
                    </div>
                </div>
            </nav>
            <div class="placeholder"></div>
        </header>
        <div class="cycler">
            <img src="./images/3.jpg" alt="" class="">
        </div>
        <div class="mainheading text-white text-center popular">

            <h1 class="">FIND YOUR FAVORITE LOCAL CONNECTION</h1>
            <h3 class="">and personalize your trip together!</h3>
        </div>
        <div class="bg-white content">
            <div class="row p-5 m-0">
                <div class="col-md-4">
                    <div class="row  justify-content-center">
                        <div class="col-lg-2">
                        <i class="fas fa-heart firsticons mb-1"></i>
                        </div>
                        <div class="col-lg-9">
                            <h5 class="h5heading mb-4">Your favorite local<br>
                            <span class="p">Get offers from locals and choose your personal favorite</span></h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row  justify-content-center">
                        <div class="col-lg-2">
                        <i class="fas fa-user-circle firsticons mb-1"></i>
                        </div>
                        <div class="col-lg-9">
                            <h5 class="h5heading mb-4">100% Private<br>
                            <span class="p">Just you and your local connection</span></h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row justify-content-center">
                        <div class="col-lg-2">
                        <i class="fas fa-address-book firsticons mb-1"></i>
                        </div>
                        <div class="col-lg-9">
                            <h5 class="h5heading mb-4">100% Personalized<br>
                            <span class="p">Customize your trip together with your local connection</span></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="">
            <div class="row bg-white m-0">
                <div class="col-12 text-center populardest mb-5 p-0">
                    <h2>Popular Destinations</h2>
                </div>
            </div>
        </div>
        <div class="background bg-white">
            <div class="container bg-white mb-5 firstback">
                <div class="row">
                    <div class="col-md-6 cities1">
                        <a href="torontoguides.php"><img src="./images/toronto.jpg" alt="" class="img-fluid">
                        <h3 class="text">Toronto</h3></a> 
                    </div>
                    <div class="col-md-6 cities1">
                        <img src="./images/seoul.jpg" alt="" class="img-fluid">
                        <h3 class="text">Seoul</h3>
                    </div>
                </div>
            </div>
            <div class="container bg-white">
                <div class="row mb-5 ven">
                    <div class="col-12 cities1">
                        <img src="./images/venice.jpg" alt="" height="100px" class="img-fluid venice">
                        <h3 class="text">Venice</h3>    
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row bg-white mb-2">
                    <div class="col-12 text-center secondheading">
                        <h2>How to book your favorite Local Connection</h2>
                    </div>
                </div>
            </div>
            <div class="bg-white content1">
                <div class="row m-0 p-5">
                    <div class="col-md-4">
                        <div class="row  justify-content-center">
                            <div class="col-lg-2">
                            <i class="fas fa-paper-plane secondicons"></i>
                            </div>
                            <div class="col-lg-9">
                                <h5 class="h5heading">SEND A REQUEST</h5>
                                <p>Select a date and explain what you want to do</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row justify-content-center">
                            <div class="col-lg-2">
                            <i class="fas fa-comments secondicons"></i>
                            </div>
                            <div class="col-lg-9">
                                <h5 class="h5heading">GET OFFERS</h5>
                                <p>Locals reply with their personalized offers</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row justify-content-center">
                            <div class="col-lg-2">
                            <i class="fas fa-thumbs-up secondicons"></i>
                            </div>
                            <div class="col-lg-9">
                                <h5 class="h5heading">CHOOSE AND BOOK</h5>
                                <p>Choose your personal favorite local</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="bg-dark myfooter p-5">
            <div class="leftfooter text-white row align-items-center justify-content-between">
                <div class="col-md-6 text-left mb-3">
                    <h4>Contact Information</h4><br>
                    <p>1 Yonge St. Toronto/On, M2N1A1, Canada
                    <br><span><i class="fas fa-phone"></i> +1(416)999-9999</span> &nbsp&nbsp <span><i class="far fa-envelope"></i> <a href= "mailto:localconnection@connection.com" class="text-white">localconnection@connection.com</a></span></p>
                    <hr class="text-left">
                    <p class="m-0">&copy 2019 Local Connection | All Rights Reserved</p>
                    <small>created by | <a href="http://www.rafidasira.com" target="_blank" class="text-white">www.rafidasira.com</a></small>
                </div>
                <div class="col-md-3 pt-3"> 
                    <a class="" href="index.php"><img src="./images/logow.png" alt="" style="width:200px;"> </a><br> <br>
                    <a href="http://www.twitter.com" target="_blank"><i class="fab fa-twitter"></i></a>
                    <a href="http://www.facebook.com" target="_blank"><i class="fab fa-facebook-square"></i></a>
                    <a href="http://www.instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
                    <a href="http://www.linkedin.com" target="_blank"><i class="fab fa-linkedin-in"></i></a><br>
                </div>
            </div>
        </footer>
    </div>
    <div class="container formcontainer text-center">
        <i class="far fa-times-circle closeicon"></i>
        <h3 class="loginheading text-center my-4">Log In To Your Account</h3>
        <hr class="hrform">
        <button class="signupbutton btn btn-primary my-3"> New User? Sign up Here</button>
        <hr class="hrform">
        <form class="needs-validation" name="signInForm" novalidate action="login.php" method="post">
            <div class="form-row mb-3">
                <label for="validationCustomEmail">Email Address</label>
                <input type="email" class="form-control " id="validationCustomEmail" placeholder="email@address.com" name="lemail" required>
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">Not a valid email</div>
            </div>
            <div class="form-row mb-3">
                <label for="validationCustom04">Password</label>
                <input type="password" class="form-control" minlength="3" id="validationCustom04" placeholder="********" name="lpass" required>
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">Password must be a minimum of 3 characters</div><br>
                <small class="mt-1 text-danger loginermsg"><?php echo $_SESSION["logInError"] ?></small>
            </div>
            <button class="login btn btn-primary my-4" name="logInButton">Log In</button>            
        </form>
    </div>
    <div class="container formcontainersu text-center">
        <i class="far fa-times-circle closeicon"></i>
        <h3 class="loginheading text-center my-4">Create A New Account</h3>
        <hr class="hrform">
        <button class="loginbutton btn btn-primary my-3">Have An Account? Log In Here</button>
        <hr class="hrform">
        <form class="needs-validation" novalidate action="signup.php" method="post" name="signUpForm">
            <div class="form-row mb-3">
                <label for="validationCustom01">First name</label>
                <input type="text" class="form-control" id="validationCustom01" placeholder="Whats Your First name" name="sfn" required>
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">Name must include at least one character</div>
            </div>
            <div class="form-row mb-3">
                <label for="validationCustom02">Last name</label>
                <input type="text" class="form-control" id="validationCustom02" placeholder="Whats Your Last name" name="sln" required>
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">Name must include at least one character</div>
            </div>
            <div class="form-row mb-3">
                <label for="validationCustomEmail">Email Address</label>
                <input type="email" class="form-control " id="validationCustomEmail" placeholder="email@address.com" name="semail" required>
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">Not a valid email</div>
            </div>
            <div class="form-row mb-3">
                <label for="validationCustom04">Password</label>
                <input type="password" class="form-control" minlength="3" id="validationCustom04" placeholder="********" name="spass" required>
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">Password must be a minimum of 3 characters</div>
                <small class="mt-1 text-danger signupermsg"><?php echo $_SESSION["signUpError"] ?></small>
            </div>
            <button class="signup btn btn-primary my-4" name="signUpButton">Create Your Account</button>            
        </form>
    </div>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="./myjs.js"></script>
</body>
</html>
