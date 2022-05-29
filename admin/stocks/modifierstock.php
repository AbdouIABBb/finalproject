<?php
$id = $_POST['idstock'];
$quantite = $_POST['quantite'];

include "../../inc/functions.php";
$conn = connect();
$requette = "UPDATE stock SET quantite = '$quantite' WHERE id= '$id' ";
$resultat = $conn ->query($requette);

if ($resultat){
    header('location:listestock.php?edit=ok');
}
?>