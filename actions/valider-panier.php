<?php
session_start();
include"../inc/functions.php" ;
 $conn=connect();
 $book=getbookbyid($_SESSION['bookid']);
 // id visiteur 

 $user=$_SESSION['id'];
 $total=$_SESSION['panier'][1];
 $date=date('y-m-d' );
 $rue=$_POST['rue'];
 $ville=$_POST['ville'];
 
//creation de panier
$requette_panier ="INSERT INTO panier(user,total,date_creation, rue, ville ) VALUES('$user','$total','$date', '$rue', '$ville') ";
$resultat = $conn ->query($requette_panier);
$panier_id = $conn ->LastInsertId();
$commandes=$_SESSION['panier'][3];

 foreach($commandes as $commande)
 {

// //Ajouter commande
    $quantite=$commande[0];
    $total=$commande[1];
    $id_produit=$commande[4];
    $new = $book['quantite'] - $quantite;
    $rue= $_POST['rue'];
    $requette = "INSERT INTO  commandes(quantite,total,panier,date_creation,produit) VALUES('$quantite','$total','$panier_id','$date','$id_produit')";
    $resultat=$conn ->query($requette);

    $requette = "UPDATE book SET quantite = '$new' WHERE id = '$id_produit'";
    $resultat=$conn ->query($requette);

 }
//sup l panier
unset($_SESSION['bookid']);
$_SESSION['panier']=null;
header('location:../index.php')


?>