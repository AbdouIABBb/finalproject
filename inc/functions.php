<?php

function connect(){
    $servername= "localhost";
    $DBuser= "root" ; 
    $DBpassword= "" ; 
    $DBname= "new-ecommerce" ; 
    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$DBname", $DBuser , $DBpassword );
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Connected successfully";
      } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
      } 

      return $conn;
}

function getALLcategory (){
  $conn=connect();
  $requette ="SELECT * FROM category ";
  $resultat = $conn ->query($requette);
  $category = $resultat ->fetchALL();
  return $category ;
} 


function getALLbook(){
  $conn=connect();
  $requette ="SELECT * FROM book ";
  $resultat = $conn ->query($requette);
  $book = $resultat ->fetchALL();
  return $book ;

}



function searchbook($keywords){ 
  $conn=connect();
  $requette = "SELECT * FROM book where nom LIKE '$keywords' ";
  $resultat =$conn->query($requette);
  $book =$resultat->fetchALL();
  return $book;
}

function getbookbyid ($id){
  $conn=connect();
  $requette = "SELECT * FROM book where id=$id  ";
  $resultat = $conn->query($requette);
  $book = $resultat->fetch();
  return $book; 
}

function AddError($error){
  $_SESSION['erreur']=$error;
}

function AddUser($data){
  $conn=connect();

  if(empty($data["email"]) || empty($data["password"]) || empty($data["nom"]) || empty($data["prenom"]) || empty($data["telephone"])){
    AddError("Entrer tous les champs");
    return false;
  }
  if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){ 
    AddError("Entrer un email valide");
    return false;
  }
  if(strlen($data['password']) < 8){
    AddError("mot de passe doit contenir aux moins 8 chars");
    return false;
  }
  if(!is_numeric($data["telephone"]) || strlen($data['telephone']) < 10 ){
    AddError("Entrer un numero de telephone valide");
    return false;
  }

  $passwordhash=md5($data["password"]);
  $requette = "INSERT INTO user(nom,prenom,email,password,telephone)  VALUES ('".$data["nom"]."', '".$data["prenom"]."', '".$data["email"]."', '".$passwordhash."', '".$data["telephone"]."')";
  $resultat = $conn->query($requette);
  return true;
}

function ConnectUser($data){
  $conn=connect();
  $email=$data['email'];
  $password=md5($data['password']);
  if(empty($email) || empty($password)){
      AddError("Entrer tous les champs");
      return false;
  }
  $requette ="SELECT * FROM user WHERE email= '$email'AND password='$password'";
  $resultat = $conn ->query($requette);
  if($resultat->rowCount()>0){
    $user = $resultat ->fetch();
    return $user;
  }
  AddError("Email ou mot de passe incorrect");
  return false;
}

function ConnectAdmin ($data){
  $conn=connect();
  $email=$data['email'];
  $mp=md5($data['password']);
  $requette ="SELECT * FROM administrateur WHERE email= '$email'AND mp='$mp'";
  $resultat = $conn ->query($requette);
  if($resultat->rowCount()>0){
    $admin = $resultat ->fetch();
    return $admin;
  }
  return false;
}

?>