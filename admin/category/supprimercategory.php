<?php
session_start();
$idcategory = $_GET['idc'];

include "../../inc/functions.php";
$conn = connect();
$requette="DELETE FROM category WHERE id='$idcategory'";
$resultat= $conn->query($requette);

if($resultat){
        $_SESSION['message'] = "Suppression effectuée avec succès";
        header('location:listecategory.php?delete=ok');
    }
?>