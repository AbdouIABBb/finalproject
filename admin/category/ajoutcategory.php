<?php
$nom = $_POST['nom'];
$description = $_POST['description'];

include "../../inc/functions.php";
$conn = connect();
$requette = "INSERT INTO category (nom,description) VALUES ('$nom', '$description')";
$resultat = $conn ->query($requette);

if ($resultat){
    header('location:listecategory.php?add=ok');
}
?>