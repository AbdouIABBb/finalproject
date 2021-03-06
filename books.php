<?php
session_start();
include "inc/functions.php";
$category= getALLcategory();
if(isset($_GET['id'])) {
  $book = getbookbyid($_GET['id']);
  $_SESSION['bookid'] = $_GET['id'];
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
  <?php include "inc/header.php"; ?>
  <div  class="row col-12 mt-2 p-5">
    <div class="row col-7 p-5">
      <div class="card mb-3" >
          <div class="card-body">
               <?php
                  if (isset($_SESSION['error'])){
                    print'<div class="alert alert-danger">'.$_SESSION["error"].'</div>';
                    unset($_SESSION['error']);
                  }
                ?>
                <h5 class="card-title"> <?php echo $book['nom'] ?></h5>
                <p class="card-text">Auteur : <?php echo $book['auteur'] ?></p>
                <p class="card-text">Résumé :<?php echo $book['resume'] ?></p>  
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">Prix :  <?php echo $book['prix'] ?>DA</li>
                  <?php
                  foreach($category as $index =>$cat ) {
                    if($cat['id']== $book['category']){
                        print '<li class="list-group-item"> Catégorie: '.$cat['nom'].'</li>';
                    }
                  }
                  ?>
                </ul>  
          </div>
      </div>
      <div>
        <form class="d-flex" action="actions/commander.php" method="POST">
            <input type="hidden"  value="<?php echo $book['id'] ?>"name="produit"></input>
            <input type="number" class="row col-3 p-2"  min="1" max="<?php echo $book['quantite'];  ?>" name="quantite" step="1" placeholder="quantité"></input>
            <button type ="submit"  class="btn-btn-primary btn btn-success" style="margin-left: 15px">Ajouter au panier </button>
        </form>
      </div>
    </div>
    <div class="row col-5 p-5">
      <img src="images/<?php echo $book['image']; ?>" class="card-img-top" alt="...">
    </div>
  </div>
  <!------Footer------>
  <?php  include"inc/footer.php"?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>
            