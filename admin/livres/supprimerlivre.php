<?php
$idlivre = $_GET['idl'];


include "../../inc/functions.php";
$conn = connect();
$requette="DELETE FROM book WHERE id='$idlivre'";
$resultat= $conn->query($requette);

if($resultat){
        header('location:listelivres.php?delete=ok');
    }
?>