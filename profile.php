<?php
session_start();

    if (!isset($_SESSION["lfn"]) && !isset($_SESSION["lemail"])){
        $_SESSION["logInError"] = "Sorry there are no backdoors allowed in here!";
        header("location: index.php");
    }

    if (isset($_POST["updateButton"])){
        $_SESSION["lfn"] = filter_var(trim($_POST["efn"], " "), FILTER_SANITIZE_STRING);
        $_SESSION["lln"] = filter_var(trim($_POST["eln"], " "), FILTER_SANITIZE_STRING);
        $_SESSION["lgen"] = $_POST["egender"];
        $_SESSION["lcity"] = filter_var(trim($_POST["ecity"], " "), FILTER_SANITIZE_STRING);
        $_SESSION["ltel"] = $_POST["etel"];
        $_SESSION["lemail"] = strtolower($_POST["eemail"]);
        $_SESSION["lpass"] = $_POST["epass"];
        $_SESSION["eimg"] = "./images/" . basename($_FILES["emyimg"]["name"]);
        move_uploaded_file($_FILES["emyimg"]["tmp_name"], $_SESSION["eimg"]);
 
    
        $servername = getenv('servername'); 
        $username = getenv('localconnection');
        $password = getenv('allusers');
        $conn = new mysqli ($servername, $username, $password);

        if ($conn->connect_error){
            die("Connection failed: " . $conn->connect_error);
        }
        // echo "connected successfully";

  
            $conn->select_db('localconnection');

            $sqlSelect = "SELECT * FROM localusers where lemail = '{$_SESSION["lemail"]}'";
            $result = $conn->query($sqlSelect);
        // alternate way - if(mysql_num_row>0)
        if ($result->num_rows > 0) {
            $sqlInsert = "INSERT INTO localusers (lid, lfname, llname, lgender, lcity, ltel, lemail, lpass, image)
            VALUES (null,'{$_SESSION['lfn']}','{$_SESSION['lln']}','{$_SESSION['lgen']}','{$_SESSION['lcity']}','{$_SESSION['ltel']}','{$_SESSION['lemail']}', '{$_SESSION['lpass']}','{$_SESSION['eimg']}')";
     
            if ($conn->query($sqlInsert) === true) {

                    $sqlSelect2 = "SELECT * FROM localusers where lemail = '{$_SESSION["lemail"]}'";
                    $result2 = $conn->query($sqlSelect2);
                    if($result2->num_rows > 0) {
                        while($row = $result2->fetch_assoc()){
                            $_SESSION["lfn"] = $row["lfname"];
                            $_SESSION["lln"] = $row["llname"];
                            $_SESSION['lgen'] = $row["lgender"];
                            $_SESSION['lcity'] = $row["lcity"];
                            $_SESSION['ltel'] = $row["ltel"];
                            $_SESSION["lemail"] = $row["lemail"];
                            $_SESSION["lpass"] = $row["lpass"];
                            $_SESSION["eimg"] = $row["image"];  
                            }
                            $conn->close();
                            }

            } else {
            echo  "ERROR: "  . $sql . "<br>" . $conn->error;
            }

            }
        }

        $servername = getenv('servername'); 
        $username = getenv('localconnection');
        $password = getenv('allusers');
        $conn = new mysqli ($servername, $username, $password);

        if ($conn->connect_error){
            die("Connection failed: " . $conn->connect_error);
        }
        // echo "connected successfully";

        // mysqli_select_db($conn,"myphp");
            // $conn->select_db('rasiradb'); trios
            $conn->select_db('localconnection');
            
        if (isset($_SESSION["lfn"]) && isset($_SESSION["lemail"])){
            $sqlSelect = "SELECT * FROM localusers INNER JOIN requests ON localusers.lid=requests.lid where lfname = '{$_SESSION["lfn"]}'";
            $result = $conn->query($sqlSelect);
            if ($result->num_rows >= 0) {
                while($row = $result->fetch_assoc()){      
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

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Local Connection</title>
    <meta name="description" content="Profile - Local Connection.">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Mukta:400,700|Ubuntu:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
<div class="">
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
                    <a class="nav-item nav-link text-white loginnav" href="logout.php">Log Out</a>                
                </div>
            </div>
        </nav>
        <div class="placeholder"></div>
    </header>

    
    <div class="container updateprofile text-left">
    <h1 class="container pl-0 my-5 text-left">Welcome to Your Profile <?php echo $_SESSION["lfn"] ?></h1>
        <form class="needs-validation" novalidate action="profile.php" method="post" name="updateProfile" enctype="multipart/form-data">
            <div class="form-group row">
                <div class="col-sm-8 text-center">
                    <img src="<?php 
                        if ($_SESSION["eimg"] == null) {
                            echo "./images/shakira.jpg";
                            } else 
                            { echo $_SESSION["eimg"];}
                             ?>" alt="imghere" width="200" height="200" style="border-radius:50%;">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">First Name:</label>
                <div class="col-sm-6">
                <input type="text" class="form-control" name="efn" value="<?php echo $_SESSION["lfn"] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Last Name:</label>
                <div class="col-sm-6">
                <input type="text" class="form-control" name="eln" value="<?php echo $_SESSION["lln"] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Gender:</label>
                <label class="col-sm-1 col-form-label">Male:</label>
                <div class="col-sm-1">
                    <input type="radio" class="form-control gen" <?php 
                    if ($_SESSION["lgen"] == 'm') {
                    echo "checked";
                    }?> name="egender" value="m">
                </div>
                <label class="col-sm-1 col-form-label">Female:</label>
                <div class="col-sm-1">
                    <input type="radio" class="form-control gen" <?php 
                    if ($_SESSION["lgen"] == 'f') {
                    echo "checked";
                    }?> name="egender" value="f">
                </div>
                <label class="col-sm-1 col-form-label">Other:</label>
                <div class="col-sm-1">
                    <input type="radio" class="form-control gen" <?php 
                    if ($_SESSION["lgen"] == 'o') {
                    echo "checked";
                    }?> name="egender" value="o">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">City:</label>
                <div class="col-sm-6">
                <input type="text" class="form-control" name="ecity" value="<?php session_start(); echo  $_SESSION["lcity"] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Tel:</label>
                <div class="col-sm-6">
                <input type="tel" class="form-control" name="etel" value="<?php echo $_SESSION["ltel"] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Email:</label>
                <div class="col-sm-6">
                <input type="email" class="form-control" name="eemail" value="<?php echo $_SESSION["lemail"] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Password:</label>
                <div class="col-sm-6">
                <input type="password" class="form-control" name="epass" value="<?php echo $_SESSION["lpass"] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Upload Profile Image:</label>
                <div class="col-sm-6">
                <input type="file" class="" name="emyimg" >
                </div>
            </div>
            <button class="col-sm-8 btn btn-primary my-4" name="updateButton">Update your profile</button>            
        </form>
    </div>
    <div class="container m-5">
        <div class="row">
            <div class="col-sm-6">
            <h2>Requests Submitted:</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-2">
            <p>Request Location:</p>
            </div>
            <div class="col-sm-6">
            <p><?php echo $_SESSION["location"] ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-2">
            <p>Requests Number:</p>
            </div>
            <div class="col-sm-6">
            <p><?php echo $_SESSION["location"] ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-2">
            <p>Date of Travel:</p>
            </div>
            <div class="col-sm-6">
            <p><?php echo $_SESSION["date"] ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-2">
            <p>Duration:</p>
            </div>
            <div class="col-sm-6">
            <p><?php echo $_SESSION["duration"]?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-2">
            <p>Number of People:</p>
            </div>
            <div class="col-sm-6">
            <p><?php echo $_SESSION["numpeople"]; ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-2">
            <p>Message Request:</p>
            </div>
            <div class="col-sm-6">
            <p><?php echo $_SESSION["comment"] ?></p>
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

<script src="https://code.jquery.com/jquery-3.4.1.min.js"integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="./myjs.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $("body").removeClass("scrolllock");
});
    </script>
</body>
</html>

