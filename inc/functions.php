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
//var_dump($category);

return $category ;

} 


function getALLbook(){

    $conn=connect();


$requette ="SELECT * FROM book ";


$resultat = $conn ->query($requette);


$book = $resultat ->fetchALL();
//var_dump($category);

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

function AddUser($data){
  $conn=connect();
  $passwordhash=md5($data["password"]);
  $requette = "INSERT INTO user(nom,prenom,email,password,telephone)  VALUES ('".$data["nom"]."', '".$data["prenom"]."', '".$data["email"]."', '".$passwordhash."', '".$data["telephone"]."')";
  $resultat = $conn->query($requette);
  

}
function ConnectUser($data){
  $conn=connect();
  $email=$data['email'];
  $password=md5($data['password']);
  $requette ="SELECT * FROM user WHERE email= '$email'AND password='$password'";
  $resultat = $conn ->query($requette);
  if($resultat->rowCount()>0){
    $user = $resultat ->fetch();
    return $user;
  }
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