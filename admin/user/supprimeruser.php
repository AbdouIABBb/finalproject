<?php
$iduser = $_GET['idc'];


include "../../inc/functions.php";
$conn = connect();
$requette="DELETE FROM user WHERE id='$iduser'";
$resultat= $conn->query($requette);

if($resultat){
        header('location:listeusers.php?delete=ok');
    }
?>