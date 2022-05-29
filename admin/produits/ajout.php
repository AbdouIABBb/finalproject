<?php
include "../../inc/functions.php";

$nom = $_POST['nom'];
$prix = $_POST['prix'];
$description = $_POST['description'];
$category = $_POST['category'];
$quantite = $_POST['quantite'];
$image = uploadFile($_FILES['image']);
$conn = connect();
$requette = "INSERT INTO book (nom,descrition,prix,image,category) VALUES ('$nom', '$description','$prix','$image','$category')";
$resultat = $conn ->query($requette);
if ($resultat){
    $produit_id = $conn->lastInsertId(); 
    $requette2="INSERT INTO stock (produit,quantite) VALUES('$produit_id','$quantite')";
    if($conn->query($requette2)){
    header("location: listeproduits.php?add=ok");
    }else {
        echo"impossible d'ajouter le stock de produits";
    }
    
}

?>