<?php
session_start();
include"../inc/functions.php" ;
 $conn=connect();
 $book=getbookbyid($_SESSION['bookid']);
 // id visiteur 

 $user=$_SESSION['id'];
 $total=$_SESSION['panier'][1];
 $date=date('y-m-d' );

//creation de panier
 $requette_panier ="INSERT INTO panier(user,total,date_creation ) VALUES('$user','$total','$date') ";
 $resultat = $conn ->query($requette_panier);
 $panier_id = $conn ->LastInsertId();
 $commandes=$_SESSION['panier'][3];

 foreach($commandes as $commande)
 {

// //Ajoutter commande
$quantite=$commande[0];
$total=$commande[1];
$id_produit=$book['id'];
$new = $book['quantite'] - $quantite;

 $requette = "INSERT INTO  commandes(quantite,total,panier,date_creation,produit) VALUES('$quantite','$total','$panier_id','$date','$id_produit')  ";
 $resultat=$conn ->query($requette);


 $requette = "UPDATE book SET quantite = '$new' WHERE id = '$id_produit'";
 $resultat=$conn ->query($requette);



 }
//sup l panier
unset($_SESSION['bookid']);
$_SESSION['panier']=null;
header('location:../index.php')


?>