<?php
session_start();
include"../inc/functions.php" ;
 $conn=connect();

 // id visiteur 

 $user=$_SESSION['id'];
 $total=$_SESSION['panier'][1];
 $date=date('y-m-d' );

//creation de panier
 $requette_panier ="INSERT INTO panier(user,total,date_creation  ) VALUES('$user','$total','$date') ";
 $resultat = $conn ->query($requette_panier);
 $panier_id = $conn ->LastInsertId();
 $commandes=$_SESSION['panier'][3];

 foreach($commandes as $commande)
 {

// //Ajoutter commande
$quantite=$commande[0];
$total=$commande[1];
$id_produit=$commande[4];

 $requette = "INSERT INTO  commandes(quantite,total,panier,date_creation,date_modification,produit) VALUES('$quantite','$total','$panier_id','$date','$date','$id_produit')  ";
 $resultat=$conn ->query($requette);



 }
//sup l panier
$_SESSION['panier']=null;
header('location:../index.php')


?>