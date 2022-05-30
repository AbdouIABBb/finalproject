

<?php
include "../../inc/functions.php";

$nom = $_POST['nom'];
$prix = $_POST['prix'];
$description = $_POST['description'];
$category = $_POST['category'];

$quantite = $_POST['quantite'];

$image = uploadFile($_FILES['image']);
$target_dir = "../../images/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);

if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
$conn = connect();
$requette = "INSERT INTO book (nom,description,prix,image,category) VALUES ('$nom', '$description','$prix','$image','$category')";
$resultat = $conn ->query($requette);
if ($resultat){
    $livre_id = $conn->lastInsertId(); 
    $requette2="INSERT INTO stock (produit,quantite) VALUES('$livre_id','$quantite')";
    if($conn->query($requette2)){
    header("location: listelivres.php?add=ok");
    }else {
        echo"impossible d'ajouter le stock de produits";
    }
    
}

?>