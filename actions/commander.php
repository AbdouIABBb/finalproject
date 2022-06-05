<?php 
session_start();

include "../inc/functions.php" ;
$conn=connect();
$book=getbookbyid($_SESSION['bookid']);
$user =$_SESSION['id'];
if(isset($_SESSION[$_SESSION['email']])){
    $_SESSION['panier'][3] = $_SESSION[$_SESSION['email']];
    $_SESSION['panier'][1] = $_SESSION['total'];
    unset($_SESSION['total']);
    unset($_SESSION[$_SESSION['email']]);
}
//var_dump($_POST);
$id_produit = $_POST['produit'];
$quantite = $_POST['quantite'];
if(empty($quantite)){
    $_SESSION['error'] = "veuillez saisir une quantité";
    header("Location: ../books.php?id=$id_produit");
    die();
}else if($quantite>$book['quantite']){
    $_SESSION['error'] = "la quantité est superieur à la quantité en stock";
    header("Location: ../books.php?id=$id_produit");
    die();
}

$requette ="SELECT prix,nom FROM book where id='$id_produit' ";
$resultat = $conn ->query($requette);
$produit = $resultat ->fetch();
$total= $quantite * $produit['prix'];
$date = date("Y-m-d");
if(!isset($_SESSION['panier'])){ //panier existe pas
    $_SESSION['panier'] = array ( $user , 0 ,$date , array() ); //creation de panier 
}
$_SESSION['panier'][1]+= $total;
if(isset($_SESSION['panier'][3])){
    array_push($_SESSION['panier'][3],array ($quantite ,$total,$date ,$date,$id_produit,$produit['nom'] ));
}else{
    $_SESSION['panier'][3][] = array ($quantite ,$total,$date ,$date,$id_produit,$produit['nom'] );
}

if(!isset($_SESSION['nom'])){
    header('location:../connexion.php');
    exit();
}

header('location:../panier.php');
  
?>