<?php

$nom = $_POST['nom'];
$prix = $_POST['prix'];
$createur = $_POST['createur'];
$description = $_POST['description'];
$category = $_POST['category'];

$target_dir = "../../images/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);

if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }







?>