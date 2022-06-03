<?php 
session_start();
include "inc/functions.php";
$showRegistrationAlert = -1;
$category= getALLcategory();
if (!empty($_POST)){
    if(AddUser($_POST)){
        $showRegistrationAlert = 1;
    }else{
        if (isset($_SESSION['erreur'])){
        $erreur = $_SESSION['erreur'];
        unset($_SESSION['erreur']);
        $showRegistrationAlert = 0;
          
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.6/sweetalert2.min.css">
    <title>LeLibraire</title>
  </head>
  <body>
    
  <?php
  include "inc/header.php";

  ?>

    <div class="container">
        <h1 class="text-center">Inscription</h1>
        <form action="inscription.php" method="post" style="max-width:500px;margin:auto">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Adresse Email</label>
                <input type="email" name="email"class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputNom1" class="form-label">Nom</label>
                <input type="text" name="nom" class="form-control" id="exampleInputNom1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPrenom1" class="form-label">Prénom</label>
                <input type="text" name="prenom"class="form-control" id="exampleInputPrenom1">
            </div>
            <div class="mb-3">
                <label for="exampleInputTelephone1" class="form-label">Numero de téléphone</label>
                <input type="text" name="telephone" class="form-control" id="exampleInputTelephone1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            </div>
            <button type="submit" class="btn btn-primary">Confirmer</button>
        </form>
    </div>
    
  </body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.6/sweetalert2.all.min.js"></script>
  <?php 
    if($showRegistrationAlert == 1){
        print "<script>
        Swal.fire({
        title : 'Succès',
        text : 'Compte créé avec succès',
        icon : 'succes',
        confirmButtonText : 'Ok',
        timer : 2000
        })
        </script>
        ";
        }else if($showRegistrationAlert == 0){
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
