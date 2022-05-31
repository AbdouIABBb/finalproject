<?php 

session_start();
//test user s'il est connecté
 if(!isset($_SESSION ['nom'])){

    header('location:../connexion.php');
    exit();
 }

 include"../inc/functions.php" ;
 $conn=connect();




 $user =$_SESSION['id'];



// //var_dump($_POST);
 $id_produit = $_POST['produit'];
 $quantite = $_POST['quantite'];
 if(empty($quantite)){
     $_SESSION['error'] = "veuillez saisir une quantité";
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
   $_SESSION['panier'][3][] = array ($quantite ,$total,$date ,$date,$id_produi ,$produit['nom'] );

  



header('location:../panier.php');
  




?>