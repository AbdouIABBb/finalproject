<?php
    session_start();
    if(isset($_POST['submit'])){
        require "inc/resetPassword.php";
        if(modifyPassword($_POST)){
            header("Location: connexion.php");
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
        <input type="password" name="password" id="">
        <input type="password" name="passwordCF" id="">
        <input type="submit" value="modify" name="submit">
    </form>
</body>
</html>