<?php
$idproduit = $_GET['idproduits'];


include "../../inc/functions.php";
$conn = connect();
$requette="DELETE FROM produit WHERE id='$idproduit'";
$resultat= $conn->query($requette);

if($resultat){
        header('location:listeproduits.php?delete=ok');
    }
?>