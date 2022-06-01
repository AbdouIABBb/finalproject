<?php
require "../../inc/functions.php";
$book = getbookbyid($_POST['idl']);

$id = $_POST['idl'];
$nom = $_POST['nom'];
$prix = $_POST['prix'];
$image = $_FILES['image'];
$quantite = $_POST['quantite'];
$category = $_POST['category'];
$auteur = $_POST['auteur'];
$resume = $_POST['resume'];
if(empty($nom)) $nom = $book['nom'];
if(empty($resume)) $resume = $book['resume'];
if(empty($prix)) $prix = $book['prix'];
if(empty($image['name'])){
    $image = $book['image'];
}else{
    $image = uploadFile($image);
}
if(empty($quantite)) $quantite = $book['quantite'];
if(empty($category)) $category = $book['category'];
if(empty($auteur)) $auteur = $book['auteur'];
$conn = connect();
$requette = "UPDATE book SET nom = '$nom', resume = '$resume' , prix = '$prix', image = '$image', quantite = $quantite, category = '$category', auteur = '$auteur'WHERE id= '$id' ";
$resultat = $conn ->query($requette);

if ($resultat){
    header('location:listelivres.php?edit=ok');
}
?>