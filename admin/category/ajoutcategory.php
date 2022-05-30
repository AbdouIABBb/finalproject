<?php
$nom = htmlentities($_POST['nom'], ENT_QUOTES, "UTF-8");
$description = htmlentities($_POST['description'], ENT_QUOTES, "UTF-8");

include "../../inc/functions.php";
$conn = connect();
$requette = "INSERT INTO category (nom,description) VALUES ('$nom', '$description')";
$resultat = $conn ->query($requette);

if ($resultat){
    header('location:listecategory.php?add=ok');
}
?>