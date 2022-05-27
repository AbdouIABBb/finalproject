<?php
$id = $_POST['idc'];
$nom = $_POST['nom'];
$description = $_POST['description'];

include "../../inc/functions.php";
$conn = connect();
$requette = "UPDATE category SET nom = '$nom', description = '$description' WHERE id= '$id' ";
$resultat = $conn ->query($requette);

if ($resultat){
    header('location:listecategory.php?edit=ok');
}
?>