<?php
session_start();
if(isset($_SESSION['nom'])){
  header('location:index.php');
 }
include "inc/functions.php";
$user = true;
$category= getALLcategory();
if (isset($_POST['login'])){
  $user =ConnectUser($_POST);
  if (isset($_SESSION['erreur'])){
    $erreur = $_SESSION['erreur'];
    unset($_SESSION['erreur']);
  }
  if($user){
   if (is_array($user) && count($user) > 0  ){ 
   $_SESSION ['id']=$user['id'];
   $_SESSION ['email']=$user['email'];
   $_SESSION ['nom']=$user['nom'];
   $_SESSION ['prenom']=$user['prenom'];
   $_SESSION ['telephone']=$user['telephone'];
   header('location:index.php');
   }
  }
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.6/sweetalert2.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>LeLibraire</title>
  </head>
  <body>
  
  <?php
  include "inc/header.php";

  ?>

    <div class="container">
        <h1 class="text-center mb-5">Connexion</h1>
        <form method="post" style="max-width:500px;margin:auto">
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Adresse Email</label>
              <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
              <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            </div>
            <button type="submit" class="btn btn-primary mb-3" name="login">Se connecter</button>
            <a style="margin-left:220px; text-decoration:none" href="reset_password.php">Mot de passe oublié ?</a>
        </form>
        
    </div>
    <?php
    echo "hi";
    print_r($_SESSION);
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>

  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.6/sweetalert2.all.min.js"></script>
  <?php 
    if(!$user){
        print "<script>
        Swal.fire({
        title : 'Erreur',
        text : '$erreur',
        icon : 'error',
        confirmButtonText : 'Ok',
        timer : 2000
        })
        </script>
        ";
        }
    ?>
</html>
