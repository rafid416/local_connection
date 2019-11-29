<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Local Connection</title>
    <meta name="description" content="About Local Connection.">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Mukta:400,700|Ubuntu:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="about">
    <div class="background">
        <header>
            <nav class="navbar navbar-expand-md navbar-dark bg-dark">
                <a class="" href="index.php"><img src="./images/logow.png" alt="" style="width:200px;" class="navlogo"></a>
                <button class="navbar-toggler text-white" type="button" data-toggle="collapse" data-target="#navtoggle">
                    <span class="navbar-toggler-icon text-white"></span>
                </button>
                <div class="collapse navbar-collapse" id="navtoggle">
                    <div class="navbar-nav navlinksheader ml-auto">
                        <a class="nav-item nav-link text-white" href="cities.php">Cities</a>
                        <a class="nav-item nav-link text-white" href="aboutus.php">About Us</a>
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
        <div class="jumbotron jumbotron-fluid jumbohead">
            <div class="container">
                <p class="lead text-white mt-3">WE ASPIRE TO CHANGE THE CONCEPT OF TRAVELLING BY MAKING IT MORE AUTHENTIC AND MORE LOCAL.</p>
            </div>
        </div>
        <div class="container">
            <div class="row my-5 text-center justify-content-center">
                <div class="col-10">
                    <h3 class="mb-2 aboutheaders mb-4">Our Story</h3>
                    <p>There’s no reason to be just a mere tourist anymore, not when locals can show you an edgier, more beautiful and more authentic version of their city. 
                    is all about the activities that happen when you’re not lounging around your hotel room, and they can start from the moment you arrive at your destination. From pick-up to departure, a Showaround local can be at your side – it’s like having a knowledgeable friend in every city you visit.</p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-10 text-center mb-5">
                    <h3 class="mb-2 aboutheaders mb-4">Why Us</h3>
                    <p>The best things come from those who know a destination best: the locals!</p>
                </div>
            </div>
            <div class="row mb-5 about usrow">
                <div class="col-md-3 text-center mb-4">
                <i class="fas fa-star secondicons mb-3"></i>
                <h5 class="h5heading">Your favorite local</h5>
                <p class="">Choose like minded locals with common interests.</p>
                </div>
                <div class="col-md-3 text-center mb-4">
                <i class="fas fa-lock secondicons mb-3"></i>
                <h5 class="h5heading">100% Private</h5>
                <p>It's just you and your local guide enjoying a private experience.</p>
                </div>
                <div class="col-md-3 text-center mb-4">
                <i class="fas fa-address-book secondicons mb-3"></i>
                <h5 class="h5heading">100% Personalized</h5>
                <p>Customize your trip together with your local guide and visit only the places you are interested in.</p>
                </div>
                <div class="col-md-3 text-center mb-4">
                <i class="fas fa-thumbs-up secondicons mb-3"></i>
                <h5 class="h5heading">100% Affordable</h5>
                <p>Pay per hour instead of per person.</p>
                </div>
            </div>
        </div>
        <div class="jumbotron jumbotron-fluid mb-0 bg-none">
            <div class="container text-center">
                <h3 class="lead aboutcontact mb-3">Get in touch with us</h3>
                <p class="mb-4">Want to know more about us? We would be happy to hear from you!</p>
                <a href="mailto:localconnection@connection.com" class="btn btn-primary">Contact us</a>

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