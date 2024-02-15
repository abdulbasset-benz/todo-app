<?php
    require_once('../Logic/signup.class.php');
    require_once('../Logic/dbcon.php');

    if(isset($_POST['submit'])){
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password_repeat = $_POST['password_repeat'];

        $newUser = new user($fullname, $email, $password, $password_repeat);

        $nameError = $newUser->validateName($fullname);
        $emailError = $newUser->validateEmail($email);
        $passwordError = $newUser->validatePassword($password, $password_repeat);

        if(empty($nameError) && empty($emailError) && empty($passwordError)){

            $result = $newUser->createUser($fullname, $email, $password, $password_repeat);

            if($result == true){
                echo "user created successfully";
            }else{
                $errors [] = "error creating the account";
            }
        }else {
            $errors = array_merge((array)$nameError, (array)$emailError, (array)$passwordError);
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
                <form  class="form" method="POST" action="../Logic/signup.class.php">
                    <input type="text" name="fullname" id="" placeholder="Enter your Fullname">
                    <input type="email" name="email" id="" placeholder="Enter your Email">
                    <input type="password" name="password" id="" placeholder="Password">
                    <input type="password" name="password_repeat" id="" placeholder="Reapeat da Password">
                    <button type="submit" name="submit">Sign Up</button>
                    <?php if (!empty($errors)): ?>
                        <ul class="errors">
                            <?php foreach ($errors as $error): ?>
                                <li><?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </form>
            </div>
        </div>
        <div class="left">
            <img src="../assets/pic3.jpeg" alt="">
        </div>
    </div>
</body>
</html>