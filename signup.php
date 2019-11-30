<?php
include_once __DIR__ . '/vendor/autoload.php';

$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();
    session_start();

    $servername = getenv('servername'); 
    $username = getenv('username');
    $password = getenv('password');
    // $conn = new_connect ($servername, $username, $password);
    $conn = new mysqli ($servername, $username, $password);

    if ($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }
    echo "";


    $conn->select_db('localconnection');



    if (isset($_POST["signUpButton"])){
        $_SESSION["lfn"] = filter_var(trim($_POST["sfn"], " "), FILTER_SANITIZE_STRING);
        $_SESSION["lln"] = filter_var(trim($_POST["sln"], " "), FILTER_SANITIZE_STRING);
        $_SESSION["lemail"] = strtolower($_POST["semail"]);
        $_SESSION["lpass"] = $_POST["spass"];

        // $conn->select_db('rasiradb');
        $conn->select_db('localconnection');

        $sqlSelect = "SELECT lemail FROM localusers WHERE lemail = '{$_SESSION["lemail"]}'";
        $result = $conn->query($sqlSelect);

        if ($result->num_rows > 0) {
            $_SESSION["signUpError"] = "Email already exists. Please login or sign up with new email";
            header("Location: index.php");

        } else {
            $_SESSION["signUpError"] = null;
            $_SESSION["logInError"] = null;
            $sqlInsert = "INSERT INTO localusers (lid, lfname, llname, lemail, lpass)
            VALUES (null,'{$_SESSION['lfn']}','{$_SESSION['lln']}','{$_SESSION['lemail']}', '{$_SESSION['lpass']}')";
            
            if ($conn->query($sqlInsert) === true) {
                $conn->close();
                header("Location: profile.php");
            } else {  
                echo "Error: " . $sql . "<br>" . $conn->error;
                }
        }
    }
?>