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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>LeLibraire</title>
</head>
<body>
    <div class="container">
        <div class="text-center mt-5">
            <h1>Récupération du compte</h1>
        </div>
        <form method="post" style="max-width:300px;margin:auto">
            <div class="form-outline mb-3 mt-5">
                <label class="form-label" for="form1Example1">Adresse Email</label>
                <input type="email" class="form-control" name="email"/>
            </div>
            <button type="submit" name="submit" class="btn btn-primary btn-block">Envoyer</button>
        </form>  
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>
</html>
