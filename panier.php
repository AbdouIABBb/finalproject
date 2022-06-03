<?php 
session_start();
if(!isset($_SESSION['nom'])){
  header('location:connexion.php');
}
include "inc/functions.php";
//var_dump($_SESSION['panier']);
$total = $_SESSION['panier'][1] ;
$category= getALLcategory();

if(isset($_GET['cat'])){
  $idcat = $_GET['cat'];
  $book = getBooksByCategory($idcat);
}else if(!empty($_POST)) {
  $book = searchbook($_POST['search']);
}else{
  $book= getALLbook();
}
$commandes = array(); 
if(isset($_SESSION['panier'])){
    if(count($_SESSION['panier'][3]) > 0 ){
        $commandes = $_SESSION['panier'][3]; 
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
    <title>LeLibraire</title>
  </head>
  <body>
  	<?php include "inc/header.php"; ?>
    <div class="row col-12 mt-4 p-5  " style="justify-content:center; gap:1em;">
      <h1>  Panier </h1> 
      <table class="table">
        <thead class="table-light">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Produit</th>
            <th scope="col">Quantite</th>
            <th scope="col">Total</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach($commandes as $index  => $commande ){
            print'
            <tr>
              <th scope="row">'.($index+1).'</th>
              <td>'.$commande[5].'</td>
              <td>'.$commande[0].'  pieces</td>
              <td>'.$commande[1].'  DA</td>
              <td> <a href="actions/enlverproduitpanier.php?id='.$index.'"  class="btn btn-danger">Supprimer </a>   </td>
            </tr>';
          }
          ?>
        </tbody>
      </table>
      <div class="text-end mt-3 "> 
        <h3> Total a payer : <?php echo $total ;  ?> DA </h3>
        <hr/>
        <a data-bs-toggle="modal" data-bs-target="#exampleModal" type="button" class="btn btn-success" style="width:100px"> Valider </a>
      </div>
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Saisir l'adresse de livraison</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form action="actions/valider-panier.php" method="POST">
                  <div class="form-group">
                    <input type="text" name="rue" class="form-control mb-3" placeholder="Rue/village">
                  </div>
                  <div class="form-group">
                    <input type="text" name="ville" class="form-control mb-3" placeholder="Ville">
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Confirmer</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

    </div>
    <?php  include"inc/footer.php"?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>
