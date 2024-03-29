<?php
    require_once('../Logic/signup.class.php');
    require_once('../Logic/database.class.php');

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])){

        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password_repeat = $_POST['password_repeat'];

        $signUp = new userRegister();

        $result = $signUp->registerUser($fullname, $email, $password, $password_repeat);

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
    <link rel="stylesheet" href="../CSS/signup.css">
    <title>Sign Up To-Do</title>
</head>
<body>
    <div class="wrapper">
        <div class="right">
            <p>Ready to Start</p>
            <span class="span">Organizing</span>
            <p >Your</p>
            <p id="para">Day-To-Day</p><span class="span"> Tasks</span>
            <div >
                <form  class="form" method="POST" action="signup.php">
                    <input type="text" name="fullname" id="" placeholder="Enter your Fullname">
                    <input type="email" name="email" id="" placeholder="Enter your Email">
                    <input type="password" name="password" id="" placeholder="Password">
                    <input type="password" name="password_repeat" id="" placeholder="Reapeat da Password">
                    <button type="submit" name="submit">Sign Up</button>
                </form>
            </div>
        </div>
        <div class="left">
            <img src="../assets/pic3.jpeg" alt="">
        </div>
    </div>

    <?php if (!empty($errors)): ?>
        <ul class="errors">
            <?php foreach ($errors as $error): ?>
                <li><?php echo $error; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</body>
</html>