<?php
session_start();
include "../inc/functions.php" ;
 $conn=connect();
 $book=getbookbyid($_SESSION['bookid']);
 // id visiteur 

 $user=$_SESSION['id'];
 if(isset($_SESSION[$_SESSION['email']])){
   $commandes=$_SESSION[$_SESSION['email']];
   unset($_SESSION[$_SESSION['email']]);
}else{
   $commandes=$_SESSION['panier'][3];
}
 if(isset($_SESSION['total'])){
   $total=$_SESSION['panier'][1] + $_SESSION['total'];
   unset($_SESSION['total']);
 }else{
   $total=$_SESSION['panier'][1];
 }
 $date=date('y-m-d' );
 $rue=$_POST['rue'];
 $ville=$_POST['ville'];

 if(empty($rue)||empty($ville)){
   $_SESSION['error'] = "veuillez saisir une adresse de livraison complète";
   header('location: ../panier.php');
   die();
}

// creation de panier
$requette_panier ="INSERT INTO panier(user,total,date_creation, rue, ville ) VALUES('$user','$total','$date', '$rue', '$ville') ";
$resultat = $conn ->query($requette_panier);
$panier_id = $conn ->LastInsertId();


 foreach($commandes as $commande)
 {

//Ajouter commande
    $quantite=$commande[0];
    $total=$commande[1];
    $id_produit=$commande[4];
    $rue= $_POST['rue'];
    $requette = "INSERT INTO  commandes(quantite,total,panier,date_creation,produit) VALUES('$quantite','$total','$panier_id','$date','$id_produit')";
    $resultat=$conn ->query($requette);

 }

 foreach($commandes as $commande)
 {
    $id_produit=$commande[4];
    $theBook = getbookbyid($id_produit);
    $quantite=$commande[0];
    $new = $theBook['quantite'] - $quantite;

    $requette = "UPDATE book SET quantite = '$new' WHERE id = '$id_produit'";
    $resultat=$conn ->query($requette);

 }
// supprimer le panier
unset($_SESSION['bookid']);
if(isset($_SESSION[$_SESSION['email']])){
   unset($_SESSION[$_SESSION['email']]);
}
if(isset($_SESSION['total'])){
   unset($_SESSION['total']);
}
$_SESSION['panier']=null;
header('location:../index.php')


?>