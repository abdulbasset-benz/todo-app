<?php
    require_once ('../Logic/database.class.php');
    require_once ('../Logic/login.class.php');

    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])){
        $fullname = $_POST['fullname'];
        $password = $_POST['password'];

        $login = new loginUser();

        $result = $login->login($fullname, $email, $password);

        if(is_array($result)){
            $errors = $result;
        }elseif(is_string($result)){
            $errors [] = $result; 
        }else{
            header("location : index.php");
            exit();
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/login.css">
    <title>Login - To Do</title>
</head>
<body>
<div class="wrapper">
        <div class="left">
            <img src="../assets/flowers.png" alt="">
        </div>
        <div class="right">
            
            <form class="form" method="post">
                
                <div class="welcome">
                    <h4>Welcome</h4>
                    <span>Back!</span>
                </div>
                
                <input type="text" name="fullname" id="" placeholder="username or email">
                <input type="password" name="password" id="" placeholder="password">
                <input type="submit" value="LOGIN">
            </form>
        </div>
        
    </div>
</body>
</html>