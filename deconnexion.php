<?php
session_start();
unset($_SESSION ['id']);
unset($_SESSION ['email']);
unset($_SESSION ['nom']);
unset($_SESSION ['prenom']);
unset($_SESSION ['telephone']);

header('location:index.php');

?>