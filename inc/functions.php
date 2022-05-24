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

function getALLproduit (){

    $conn=connect();


$requette ="SELECT * FROM produit ";


$resultat = $conn ->query($requette);


$produit = $resultat ->fetchALL();
//var_dump($category);

return $produit ;

}



function searchproduit($keywords){ 
    $conn=connect();
     
      $requette = "SELECT * FROM produit where nom LIKE '$keywords' ";

      $resultat =$conn->query($requette);

      $produit =$resultat->fetchALL();
      return $produit;

}

function getproduitbyid ($id){
    $conn=connect();

    $requette = "SELECT * FROM produit where id=$id  ";

    $resultat = $conn->query($requette);

    $produits = $resultat->fetch();

    return $produits; 
}


?>