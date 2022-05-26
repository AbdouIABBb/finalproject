<?php
session_start();
session_regenerate_id();
if(isset($_SESSION['nom'])){
  //header('location:profile.php');

 }
include "../inc/functions.php";
$admin = true;
if (isset($_POST['login'])){
  $admin =ConnectAdmin($_POST);
  if($admin){
   if (is_array($admin) && count($admin) > 0  ){
    session_start(); 
   $_SESSION ['email']=$admin['email'];
   $_SESSION ['nom']=$admin['nom'];
   $_SESSION ['mp']=$admin['mp'];

   header('location:profile.php');
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
  

    <div class="col-12 p-5">
        <h1 class="text-center">Espace Admin : Connexion</h1>
        <form method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Adresse Email</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            </div>
            <button type="submit" class="btn btn-primary" name="login">Se connecter</button>
        </form>
    </div>
    <?php  include"../inc/footer.php"?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.6/sweetalert2.all.min.js"></script>
  <?php 
    if(!$admin){
        print "<script>
        Swal.fire({
        title : 'Erreur',
        text : 'Cordonnes non Valide',
        icon : 'error',
        confirmButtonText : 'Ok',
        timer : 2000
        })
        </script>
        ";
        }
    ?>
</html>
