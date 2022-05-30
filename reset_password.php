<?php
    session_start();
    if(isset($_POST['submit'])){
        require "inc/resetPassword.php";
        $email = $_POST['email'];
        if(generateAndSendCode($email)){
            header("Location: confirm_reset.php");
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <input type="email" name="email" id="">
        <input type="submit" value="send mail" name="submit">
    </form>
</body>
</html>