<?php
$id = $_POST['idc'];
$nom = htmlentities($_POST['nom'], ENT_QUOTES, "UTF-8");
$description = htmlentities($_POST['description'], ENT_QUOTES, "UTF-8");

include "../../inc/functions.php";
$conn = connect();
$requette = "UPDATE category SET nom = '$nom', description = '$description' WHERE id= '$id' ";
$resultat = $conn ->query($requette);

if ($resultat){
    header('location:listecategory.php?edit=ok');
}
?>