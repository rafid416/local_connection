<?php
include_once __DIR__ . '/vendor/autoload.php';

$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();
session_start();

if (isset($_POST["requestbutton"])){
    $_SESSION["date"] = $_POST["date"];
    $_SESSION["duration"] = $_POST["duration"];
    $_SESSION["numpeople"] = $_POST["numberofpeople"];
    $_SESSION["comment"] = $_POST["comment"];
    $_SESSION["location"] = $_POST["location"];


    $servername = getenv('servername'); 
    $username = getenv('username');
    $password = getenv('password');
    $conn = new mysqli ($servername, $username, $password);

    if ($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }

    // mysqli_select_db($conn,"myphp");
        // $conn->select_db('rasiradb');
        $conn->select_db('localconnection');

        $sqlSelect = "SELECT * FROM localusers WHERE lemail = '{$_SESSION['lemail']}' AND lpass = '{$_SESSION["lpass"]}'";
        $result = $conn->query($sqlSelect);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){
                //row is created as an array because there can be many results
                $_SESSION["lid"] = $row["lid"];
                $_SESSION["lfn"] = $row["lfname"];
                $_SESSION["lln"] = $row["llname"];
                $_SESSION['lgen'] = $row["lgender"];
                $_SESSION['lcity'] = $row["lcity"];
                $_SESSION['ltel'] = $row["ltel"];
                $_SESSION["lemail"] = $row["lemail"];
                $_SESSION["lpass"] = $row["lpass"];
                $_SESSION["eimg"] = $row["image"]; 
            }
        }

        $sqlSelect = "SELECT lfname, message FROM localusers INNER JOIN requests ON localusers.lid=requests.lid where lfname = '{$_SESSION["lfn"]}'";
        $result = $conn->query($sqlSelect);
        if ($result->num_rows >= 0){
            $sqlInsert = "INSERT INTO requests (requestid, lid, date, duration, numberofppl, message, location)
            VALUES (null,'{$_SESSION['lid']}','{$_SESSION['date']}','{$_SESSION['duration']}','{$_SESSION['numpeople']}','{$_SESSION['comment']}','{$_SESSION['location']}')";
    
            if ($conn->query($sqlInsert) === true) {
                $sqlSelect1 = "SELECT * FROM localusers INNER JOIN requests ON localusers.lid=requests.lid where lfname = '{$_SESSION["lfn"]}'";
                $result1 = $conn->query($sqlSelect1);
                if ($result1->num_rows >= 0) {
                    while($row = $result1->fetch_assoc()){
                        $_SESSION["requestid"] = $row["requestid"];
                        $_SESSION["lid"] = $row["lid"];
                        $_SESSION["date"] = $row["date"];
                        $_SESSION["duration"] = $row["duration"];
                        $_SESSION['numpeople'] = $row["numberofppl"];
                        $_SESSION['comment'] = $row["message"];
                        $_SESSION['location'] = $row["location"];
                    }
                }
                } 
                  
                else {
                echo "ERROR: "  . $sql . "<br>" . $conn->error;
                }
            $conn->close();
            header("Location: profile.php");
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Local Connection</title>
    <meta name="description" content="Toronto - Local Connection.">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Mukta:400,700|Ubuntu:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="background">
        <header>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <a class="" href="index.php"><img src="./images/logow.png" alt="" style="width:200px;" class="navlogo"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navtoggle">
                    <span class="navbar-toggler-icon"></span>
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
        <div class="jumbotron jumbotron-fluid jumboguides">
            <div class="container">
                <h1 class="mt-4 display-4">TORONTO LOCALS</h1>
            </div>
        </div>
        <div class="maincontainer justify-content-around my-5">
            <div class="guidecontainer m-3">
                <div class="imgcontainer m-0">
                <img src="./images/shakira.jpg" class="images m-0" alt="...">
                </div>
                <div class="guidedetails pl-2 m-0 text-left">
                    <div class="detailcontainer mr-2">
                        <div class="namecontainer m-0">
                            <p class="name m-0">Name</p>
                            <small class="location m-0">location</small>
                        </div>
                        <div class="pricecontainer">
                            <p class="price m-0">Price</p>
                        </div>
                    </div>
                    <div class="descriptiondetails m-0 mr-2 p-2">
                        <p class="m-0 text-secondary"><i class="fas fa-quote-left iconsguide1"></i></p>
                        <p class="textdescribe m-0">Short profile description.</p>
                        <p class="m-0 text-right text-secondary"><i class="fas fa-quote-right iconsguide2"></i></p>
                    </div>
                    <button class="btn btn-primary my-2">View Profile</button>
                </div>
            </div>
            <div class="guidecontainer m-3">
                <div class="imgcontainer m-0">
                <img src="./images/shakira.jpg" class="images m-0" alt="...">
                </div>
                <div class="guidedetails pl-2 m-0 text-left">
                    <div class="detailcontainer mr-2">
                        <div class="namecontainer m-0">
                            <p class="name m-0">Name</p>
                            <small class="location m-0">location</small>
                        </div>
                        <div class="pricecontainer">
                            <p class="price m-0">Price</p>
                        </div>
                    </div>
                    <div class="descriptiondetails m-0 mr-2 p-2">
                        <p class="m-0 text-secondary"><i class="fas fa-quote-left iconsguide1"></i></p>
                        <p class="textdescribe m-0">Short profile description.</p>
                        <p class="m-0 text-right text-secondary"><i class="fas fa-quote-right iconsguide2"></i></p>
                    </div>
                    <button class="btn btn-primary my-2">View Profile</button>
                </div>
            </div>
        </div>
        <div class="maincontainer justify-content-around my-5">
            <div class="guidecontainer m-3">
                <div class="imgcontainer m-0">
                <img src="./images/shakira.jpg" class="images m-0" alt="...">
                </div>
                <div class="guidedetails pl-2 m-0 text-left">
                    <div class="detailcontainer mr-2">
                        <div class="namecontainer m-0">
                            <p class="name m-0">Name</p>
                            <small class="location m-0">location</small>
                        </div>
                        <div class="pricecontainer">
                            <p class="price m-0">Price</p>
                        </div>
                    </div>
                    <div class="descriptiondetails m-0 mr-2 p-2">
                        <p class="m-0 text-secondary"><i class="fas fa-quote-left iconsguide1"></i></p>
                        <p class="textdescribe m-0">Short profile description.</p>
                        <p class="m-0 text-right text-secondary"><i class="fas fa-quote-right iconsguide2"></i></p>
                    </div>
                    <button class="btn btn-primary my-2">View Profile</button>
                </div>
            </div>
            <div class="guidecontainer m-3">
                <div class="imgcontainer m-0">
                <img src="./images/shakira.jpg" class="images m-0" alt="...">
                </div>
                <div class="guidedetails pl-2 m-0 text-left">
                    <div class="detailcontainer mr-2">
                        <div class="namecontainer m-0">
                            <p class="name m-0">Name</p>
                            <small class="location m-0">location</small>
                        </div>
                        <div class="pricecontainer">
                            <p class="price m-0">Price</p>
                        </div>
                    </div>
                    <div class="descriptiondetails m-0 mr-2 p-2">
                        <p class="m-0 text-secondary"><i class="fas fa-quote-left iconsguide1"></i></p>
                        <p class="textdescribe m-0">Short profile description.</p>
                        <p class="m-0 text-right text-secondary"><i class="fas fa-quote-right iconsguide2"></i></p>
                    </div>
                    <button class="btn btn-primary my-2">View Profile</button>
                </div>
            </div>
        </div>
        <?php session_start(); if(isset($_SESSION["lemail"])) {
             
        echo '<h1 class="container pl-0 my-5 text-center">Send A Request to Toronto Locals</h1>
        <form class=""  action="torontoguides.php" method="post" name="torontorequests" enctype="multipart/form-data">  
            <div class="form-group row justify-content-center">
                <label class="col-sm-2 col-form-label">Date:</label>
                <div class="col-sm-6">
                <input type="date" class="form-control" name="date" value="">
                </div>
            </div>
            <div class="form-group row justify-content-center">
                <label class="col-sm-2 col-form-label">Duration:</label>
                <div class="col-sm-6">
                <select name="duration" class="form-control">
                    <option selected="selected" disabled >Please select</option>
                    <option value="2 hours">2 HOURS</option>
                    <option value="3 hours">3 HOURS</option>
                    <option value="4 hours">4 HOURS</option>
                    <option value="5 hours">5 HOURS</option>
                    <option value="6 hours">6 HOURS</option>
                    <option value="7 hours">7 HOURS</option>
                    <option value="8 hours">8 HOURS</option>
                </select>
                </div>
            </div>
            <div class="form-group row justify-content-center">
                <label class="col-sm-2 col-form-label"># of PPL:</label>
                <div class="col-sm-6">
                <select name="numberofpeople" class="form-control">
                    <option selected="selected" disabled >Please select</option>
                    <option value="1 person">1</option>
                    <option value="2 people">2</option>
                    <option value="3 people">3</option>
                    <option value="4 people">4</option>
                    <option value="5 people">5</option>
                    <option value="6 people">6</option>
                    <option value="7 people">7</option>
                    <option value="8 people">8</option>
                </select>
                </div>
            </div>
            <div class="form-group row justify-content-center">
                <label class="col-sm-2 col-form-label">What woud you like to do:</label>
                <div class="col-sm-6">
                <textarea placeholder="Type your message!" class="form-control" name="comment" cols="50" rows="10"></textarea>
                <input type="hidden" name="location" value="Toronto">
            </div>
            <button class="col-sm-8 btn btn-primary my-4" name="requestbutton">Send Request</button>            
        </form>';
        } ?> 
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