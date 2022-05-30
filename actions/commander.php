<?php 

session_start();

// if(!isset($_SESSION ['nom'])){

//     header('location:../connexion.php');
//     exit();
// }

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

  

//   //creation de panier

// $requette_panier ="INSERT INTO panier(user,total,date_creation  ) VALUES('$user','$total','$date') ";
// $resultat = $conn ->query($requette_panier);

// $panier_id = $conn ->LastInsertId();





// //Ajoutter commande


  
 

//   $requette = "INSERT INTO  commandes(quantite,total,panier,date_creation,date_modification,produit) VALUES('$quantite','$total','$panier_id','$date','$date','$id_produit')  ";
//   $conn ->query($requette);

header('location:../panier.php');
  




?>