<?php
session_start();
$id = $_GET['id'];
$_SESSION['panier'][1] = $_SESSION['panier'][1] - $_SESSION['panier'][3][$id][1];
unset($_SESSION['panier'][3][$id]);
header("Location: ../panier.php");
?>