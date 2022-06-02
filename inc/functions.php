<?php

function connect(){
    $servername= "localhost";
    $DBuser= "root" ; 
    $DBpassword= "root" ; 
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
  $requette = "SELECT * FROM book where id=:id  ";
  $resultat = $conn ->prepare($requette);
  $resultat->bindParam(':id',$id);
  $resultat->execute();
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



function getALLusers (){
  $conn=connect();
  $requette ="SELECT * FROM user ";
  $resultat = $conn ->query($requette);
  $user = $resultat ->fetchALL();
  return $user ;
}

function uploadFile($file){
  $fileName = $file['name'];
  $fileTmpName = $file['tmp_name'];
  $fileSize = $file['size'];
  $fileError = $file['error'];
  $fileExt = explode('.', $fileName);
  $fileActualExt = strtolower(end($fileExt));
  $allowed = array('png','jpg','jpeg');
  if(in_array($fileActualExt, $allowed)){
      if($fileError == 0){
          if($fileSize < 5000000){
              $fileNameNew = uniqid('', true).".".$fileActualExt;
              $fileDestination = '../../images/'.$fileNameNew;
              move_uploaded_file($fileTmpName, $fileDestination);
              return $fileNameNew;
          }else{
              return false;
          }
      }else{
          return false;
      }
  }else{
      return false;
  }
}


function getBooksByCategory($id){
  $conn=connect();
  $requette ="SELECT * FROM book where category=:id";
  $resultat = $conn ->prepare($requette);
  $resultat->bindParam(':id',$id);
  $resultat->execute();
  $books = $resultat ->fetchALL();
  return $books ; 
}

function getALLcommandes (){
  $conn=connect();
  $requette ="SELECT u.nom, u.prenom , u.telephone ,  p.total,  p.etat,  p.date_creation ,  p.id FROM panier p, user u WHERE p.user = u.id  ";
  $resultat = $conn ->query($requette);
  $commandes = $resultat ->fetchALL();
  return $commandes ;
} 
function getALLdetails (){
  $conn=connect();
  $requette ="SELECT b.nom ,b.image ,c.quantite, c.total , c.panier FROM commandes c, book b WHERE c.produit = b.id ";
  $resultat = $conn ->query($requette);
  $details = $resultat ->fetchALL();
  return $details ;
} 
function changerEtatCommande($data){
  $conn=connect();
  $requette = "update panier SET etat =' ".$data['etat']. "'where id='".$data['panier_id']."'";
  $resultat = $conn ->query($requette);
}
function getCommandeByEtat( $commandes,$etat){
  $commandesEtat = array();
  foreach($commandes as $c){
    if($c['etat'] == $etat ){
      array_push($commandesEtat,$c);
    }
  }
  return $commandesEtat;

}
function getData(){
  $data = array();
  $conn = connect();

  $requette = "SELECT count(*) from book";
  $resultat = $conn -> query($requette);
  $nbrPrds = $resultat->fetch();

  $requette1 = "SELECT count(*) from category";
  $resultat1 = $conn -> query($requette1);
  $nbrCat = $resultat1->fetch();

  $requette2 = "SELECT count(*) from user";
  $resultat2 = $conn -> query($requette2);
  $nbrClients = $resultat2->fetch();

  $data["book"] = $nbrPrds[0];
  $data["category"] = $nbrCat[0];
  $data["user"] = $nbrClients[0];

  return $data;

}
?>
