<?php
session_start();
if(isset($_SESSION['panier'][3])){
    $_SESSION[$_SESSION['email']] = $_SESSION['panier'][3];
    $_SESSION['total'] = $_SESSION['panier'][1];
}

unset($_SESSION ['id']);
unset($_SESSION ['email']);
unset($_SESSION ['nom']);
unset($_SESSION ['prenom']);
unset($_SESSION ['telephone']);
unset($_SESSION['panier'][3]);
print_r($_SESSION);
die();
header('location:index.php');

?>