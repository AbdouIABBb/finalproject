<?php 
include "inc/functions.php";
$category= getALLcategory();

if(!empty($_POST)) {

  
   $produit = searchproduit($_POST['search']);

}else{
    $produit= getALLproduit();
}




?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>LeLibraire</title>
  </head>
  <body>
  	
  <?php
  include "inc/header.php";

  ?>

    <div class="row col-12 mt-4 p-5">


    <?php


foreach($produit as $prodect ){

    print ' <div class="row col-3"> 
    <div class="card" style="width: 18rem;">
         <img src="..." class="card-img-top" alt="...">
         <div class="card-body">
             <h5 class="card-title"> '.$prodect['nom'].' </h5>
             <p class="card-text">'.$prodect['descrition'].'</p>
             <a href="produit.php?id='.$prodect['id'].'" class="btn btn-primary">Afficher </a>
        </div>
    </div>
</div>';

}



    ?>
    	
    	

    <div class="bg-dark text-center p-5 mt-5">
         <p class="text-white">Tous droits réservés</p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>
