<?php
include "../../inc/functions.php";

$nom = $_POST['nom'];
$prix = $_POST['prix'];
$createur = $_POST['createur'];
$description = $_POST['description'];
$category = $_POST['category'];
$image = uploadFile($_FILES['image']);
$conn = connect();
$requette = "INSERT INTO book (nom,descrition,prix,image,category,createur) VALUES ('$nom', '$description','$prix','$image','$category','$createur')";
$resultat = $conn ->query($requette);
header("location: listeproduits.php?add=ok");

?>