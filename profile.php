<?php 
  session_start();
  if(!isset($_SESSION['nom'])){
    header('location:connexion.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Profile</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
      <?php
      include "inc/header.php";
      ?>
      <div class="container">
        <h1 > Bienvenue <span class="text-primary"><?php echo $_SESSION['nom']." ". $_SESSION['prenom'];?> </span><h1>   
        <h2> Email:<?php echo $_SESSION['email'];?></h2>
      </div>
      <?php  include"inc/footer.php"?>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>