<?php
    session_start();
    if(isset($_POST['submit'])){
        require "inc/resetPassword.php";
        $email = $_SESSION['reset'];
        if(confirmCode($email,$_POST['code'])){
            header("Location: modify_password.php");
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
        <input type="number" name="code" id="">
        <input type="submit" value="verify" name="submit">
    </form>
</body>
</html>