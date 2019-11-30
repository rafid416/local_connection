<?php
include_once __DIR__ . '/vendor/autoload.php';

$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

    session_start();
 

    if (isset($_POST["logInButton"])){
        $_SESSION["lemail"] = $_POST["lemail"];
        $_SESSION["lpass"] = $_POST["lpass"];


        $servername = getenv('servername'); 
        $username = getenv('username');
        $password = getenv('password');
        $conn = new mysqli ($servername, $username, $password);

        if ($conn->connect_error){
            die("Connection failed: " . $conn->connect_error);
        }
        echo "connect successful";

        $conn->select_db('localconnection');

    
        $sqlSelect = "SELECT * FROM localusers WHERE lemail = '{$_SESSION['lemail']}' AND lpass = '{$_SESSION["lpass"]}'";
        $result = $conn->query($sqlSelect);

        if ($result->num_rows == 0) {
            $_SESSION["logInError"] = "Email or Password doesn't exist!";
            unset($_SESSION["lemail"]);
            $conn->close();
            header("Location: index.php");
            

        } else {
            unset($_SESSION["logInError"]);
            unset($_SESSION["signUpError"]);
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
            $conn->close();
            header("Location: profile.php");
            }
        }
    

        ?>