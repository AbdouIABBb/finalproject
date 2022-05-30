<?php   
include"../inc/functions.php" ;

//var_dump($_POST);
$id_produit = $_POST['produit'];
$quantite = $_POST['quantite'];


$conn=connect();
$requette ="SELECT prix FROM book where id='$id_produit' ";

  $resultat = $conn ->query($requette);
  $produit = $resultat ->fetch();
  
  $total= $quantite * $produit['prix'];
  echo $total;

  $date = date("Y-m-d");


//Ajoutter commande

  $requette = "INSERT INTO  commandes(quantite,total,panier,date_creation,date_modification,produit) VALUES('$quantite','$total',0,'$date','$date','$id_produit')  ";

  $resultat = $conn ->query($requette);
  $produit = $resultat ->fetch();




?>