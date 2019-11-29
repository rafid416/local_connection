<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Local Connection</title>
    <meta name="description" content="Local Connection guides.">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Mukta:400,700|Ubuntu:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="background">
        <header>
            <nav class="navbar navbar-expand-md p-4">
            <a class="" href="index.php"><img src="./images/logow.png" alt="" style="width:200px;" class="navlogo"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navtoggle">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navtoggle">
                    <div class="navbar-nav navlinksheader ml-auto">
                        <a class="nav-item nav-link text-white" href="cities.php">Cities</a>
                        <a class="nav-item nav-link text-white" href="aboutus.php">About Us</a>
                        <a class="nav-item nav-link text-white loginnav" href="logout.php">Log Out</a>                
                    </div>
                </div>
            </nav>
            <div class="placeholder"></div>
        </header>

        <h1 class="container my-5">Welcome <?php session_start(); echo $_SESSION["lfn"] ?> to Your Profile</h1>
        <div class="card container mb-5">
            <div class="card-header">
                Messages
            </div>
            <div class="card-body">
                <h5 class="card-title">Message from user</h5>
                <p class="card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Asperiores mollitia molestias voluptatibus ad nulla tenetur officiis aspernatur corrupti nemo architecto?</p>
            </div>
            <div class="card-body">
                <h5 class="card-title">Message from user</h5>
                <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatibus placeat maiores molestiae ducimus non laboriosam alias aut corporis laborum facere.</p>
            </div>
            <div class="card-body">
                <h5 class="card-title">Message from user</h5>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum reprehenderit necessitatibus eveniet enim unde eaque molestias, quibusdam veniam vero mollitia?</p>
                <a href="#" class="btn btn-primary">Delete Message</a>
            </div>
        </div>
        <div class="card container mb-5">
            <div class="card-header">
                Previous Local Guides
            </div>
            <div class="card-body">
                <h5 class="card-title">Guide Name</h5>
                <p class="card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Asperiores mollitia molestias voluptatibus ad nulla tenetur officiis aspernatur corrupti nemo architecto?</p>
            </div>
            <div class="card-body">
                <h5 class="card-title">Guide Name</h5>
                <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatibus placeat maiores molestiae ducimus non laboriosam alias aut corporis laborum facere.</p>
            </div>
            <div class="card-body">
                <h5 class="card-title">Guide Name</h5>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum reprehenderit necessitatibus eveniet enim unde eaque molestias, quibusdam veniam vero mollitia?</p>
                <a href="#" class="btn btn-primary">Leave a Review</a>
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
        <form class="needs-validation" name="signInForm" novalidate action="profile.php" method="post">
            <div class="form-row mb-3">
                <label for="validationCustomEmail">Email Address</label>
                <input type="email" class="form-control " id="validationCustomEmail" placeholder="email@address.com" name="email" required>
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">Not a valid email</div>
            </div>
            <div class="form-row mb-3">
                <label for="validationCustom04">Password</label>
                <input type="password" class="form-control" minlength="3" id="validationCustom04" placeholder="********" name="pass" required>
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">Password must be a minimum of 3 characters</div>
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
        <form class="needs-validation" novalidate action="profile.php" method="post" name="signUpForm">
            <div class="form-row mb-3">
                <label for="validationCustom01">First name</label>
                <input type="text" class="form-control" id="validationCustom01" placeholder="Whats Your First name" name="fn" required>
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">Name must include at least one character</div>
            </div>
            <div class="form-row mb-3">
                <label for="validationCustom02">Last name</label>
                <input type="text" class="form-control" id="validationCustom02" placeholder="Whats Your Last name" name="ln" required>
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">Name must include at least one character</div>
            </div>
            <div class="form-row mb-3">
                <label for="validationCustomEmail">Email Address</label>
                <input type="email" class="form-control " id="validationCustomEmail" placeholder="email@address.com" name="email" required>
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">Not a valid email</div>
            </div>
            <div class="form-row mb-3">
                <label for="validationCustom04">Password</label>
                <input type="password" class="form-control" minlength="3" id="validationCustom04" placeholder="********" name="pass" required>
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">Password must be a minimum of 3 characters</div>
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