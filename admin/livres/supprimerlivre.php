<?php
session_start();
$idlivre = $_GET['idl'];

include "../../inc/functions.php";
$conn = connect();
$requette="DELETE FROM book WHERE id='$idlivre'";
$resultat= $conn->query($requette);

if($resultat){
        $_SESSION['message'] = "Suppression effectuée avec succès";
        header('location:listelivres.php');
    }
?>