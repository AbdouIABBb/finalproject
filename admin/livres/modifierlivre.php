<?php
$id = $_POST['idl'];
$nom = $_POST['nom'];
$prix = $_POST['prix'];
$image = $_POST['image'];
$quantite = $_POST['quantite'];
$category = $_POST['category'];
$auteur = $_POST['auteur'];

include "../../inc/functions.php";
$conn = connect();
$requette = "UPDATE book SET nom = '$nom', prix = '$prix', image = '$image', quantite = $quantite, category = '$category', auteur = '$auteur'WHERE id= '$id' ";
$resultat = $conn ->query($requette);

if ($resultat){
    header('location:listelivres.php?edit=ok');
}
?>