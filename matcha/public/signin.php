<?php
/**
 * Created by PhpStorm.
 * User: tmack
 * Date: 2016/11/01
 * Time: 7:37 AM
 */

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

include_once "config/database.php";
require "varibles.php";

if (isset($_POST['email'])) {
$email = $_POST['email'];
    try {
        $conn = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $result = $conn->prepare('SELECT * FROM users WHERE Email = :Email');
        $result->bindParam(':Email', $email);
        $result->execute();
        if ($result->rowCount() > 0) {
            echo "invalid email";
            exit();
        }
        else{
            echo "valid email";
            exit();
        }

    } catch (PDOException $e) {
        //echo $conn . "<br>" . $e->getMessage();
    }
    $conn = null;
}
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/login.css">
    <script rel="script" type="application/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <title>Login</title>
</head>

<body>
<div id="header">
    <div class="container">
        <div id="logo"><img src="img/logo.png"> </div>
        <div id="navigation">
                <div id="navtabs">
                        <a id="signup" href=""><li>Not a Member? Sign up here</li></a>
                </div>
        </div>
    </div>
</div>

<div id="body">
    <div id="modal-container" <? if ($err_str && $_POST['submit']) echo "class='hide'" ?>">
    <div id="myModal" class="modal">
        <div id="signup-cc" class="container page">
            <span class="close">×</span>
            <h1 style="text-align: center">Please Enter Details To Sign Up</h1>
            <div class="login_container2">
                <img src="img/profile login.png" >
                <div id="form-container">
                    <form id="Create_account" method="post" name="Create_account" onsubmit=" return (valid(this));">
                        <div>
                            <input <?php if ($err_str) {echo "class='error_input'";} ?> id="first-name" type="text" name="name" placeholder="First Name" required >
                        </div>
                        <div>
                            <input  title="Must be a valid Surname" id="surname" type="text" name="surname" placeholder="Surname"  required>
                        </div>
                        <div>
                            <input id="password" type="password" name="password" placeholder="Password" value="" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                    title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                        </div>
                        <div>
                            <input id="re-password" type="password" name="re-password" placeholder="Re-type Password" value="" required >
                        </div>
                        <div>
                            <input id="email" type="text" name="email" placeholder="Email Address" title="Must Be A Valid Email Address!" required>
                        </div>
                        <input id="btn-create_account" type="submit" name="submit" value="Submit">
                    </form>
                </div>
            </div>
            <div>
                <p id="err_msg" style="color: red; text-align: center"></p>
            </div>
        </div>
    </div>
    </div>

<div class="container page">
    <h1 style="text-align: center; font-family: 'Hiragino Maru Gothic Pro'">Welcome to Matcha</h1>
    <h2 style="text-align: center">Please login or sign up</h2>
    <div class="login_container">
        <img src="img/profile login.png">
        <form method="post" name="login-form">
            <div class="form-input">
                <input type="text" name="email" placeholder="Email Address">
            </div>
            <div class="form-input">
                <input type="password" name="password" placeholder="Password">
            </div>
            <input id="btn-login" type="submit" name="login" value="Login">
            <a style="color: crimson" href="">Forgot Password?</a>
        </form>
    </div>
</div>
<div id="footer"><p>Tony Mack © 2016 </p> </div>
<script rel="script" type="application/javascript" src="login.js"></script>

</body>
</html>