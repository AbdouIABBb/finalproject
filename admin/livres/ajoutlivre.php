

<?php
session_start();
include "../../inc/functions.php";

$nom = htmlentities($_POST['nom'], ENT_QUOTES, "UTF-8");
$prix = $_POST['prix'];
$auteur = $_POST['auteur'];
$resume = htmlentities($_POST['resume'], ENT_QUOTES, "UTF-8");
$category = $_POST['category'];
$quantite = $_POST['quantite'];
$image = uploadFile($_FILES['image']);
$target_dir = "../../images/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);

if(empty($nom)||empty($prix)||empty($auteur)||empty($resume)||empty($category)||empty($quantite)){
    $_SESSION['error'] = "veuillez remplir tous les champs";
    header('location: listelivres.php');
    die();
}

if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
$conn = connect();
$requette = "INSERT INTO book (nom,auteur, resume, prix,image,quantite,category) VALUES ('$nom', '$auteur', '$resume', '$prix','$image','$quantite','$category')";
$resultat = $conn ->query($requette);
if ($resultat){
    $_SESSION['message'] = "Ajout effectuée avec succès";
    header("location: listelivres.php");
}
    


?>