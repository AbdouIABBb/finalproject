

<?php
include "../../inc/functions.php";

$nom = $_POST['nom'];
$prix = $_POST['prix'];
$auteur = $_POST['auteur'];
$resume = $_POST['resume'];
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
$requette = "INSERT INTO book (nom,auteur, resume, prix,image,quantite,category) VALUES ('$nom', '$auteur', '$resume', '$prix','$image','$quantite','$category')";
$resultat = $conn ->query($requette);
if ($resultat){
    header("location: listelivres.php?add=ok");
}
    


?>