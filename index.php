<?php 
session_start();
include "inc/functions.php";
$category= getALLcategory();

if(isset($_GET['cat'])){
  $idcat = $_GET['cat'];
  $book = getBooksByCategory($idcat);
}else if(!empty($_POST)) {
  $book = searchbook($_POST['search']);
}else{
  $book= getLastBook();
}
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="icon" href="images/lb.jpg" type="image/icon type">
    
    <title>LeLibraire</title>


    <style>

      .omar{
        position: relative ;
        height: 50vh ;
        width: 100%;
        display:flex;
        justify-content: center;
        align-items: center;
        flex-direction:column ;
        box-shadow: 0px 7px 18px black; 
        

       
      }

      .omar::before {    
      content: "";
      background-image: linear-gradient(rgba(0,0,0,0.40),rgba(0,0,0,0.40)) , url('images/test.jpg');
      background-size: cover;
      position: absolute;
      top: 0px;
      right: 0px;
      bottom: 0px;
      left: 0px;
     
}
      .omar p {
        position : relative ;
        font-weight: 700 ;
        color: white ;
        font-size: 4rem ;


      }
     
      </style>


  </head>
  <body>
  	<?php include "inc/header.php"; ?> 

    <div class="omar" >

    
    <p >If you want to make intelligent, </p> 
    <p > get books from here.</p> 

    
<!-- Section-->


</div>



    <div class="row col-12 mt-4 p-5" style="justify-content:center; gap:1em;">
    <div style="align-self:center;" >
    <h1 > Nos derniers Livres </h1> </div>
        <?php
        if(!isset($_GET['cat'])){
          foreach($book as $b ){
            print ' <div class="row col-3 mt-2"> 
                      <div class="card" style="width: 18rem;">
                          <img src="images/'.$b['image'].'" class="card-img-top" alt="...">
                          <div class="card-body">
                              <h5 class="card-title"> '.$b['nom'].' </h5>
                              <p class="card-text">'.$b['auteur'].'</p>
                              <p class="card-text">'.$b['prix'].' DA</p>
                              <a href="books.php?id='.$b['id'].'" class="btn btn-primary">Voir Plus</a>';
                              if($b['quantite'] == 0){
                                print '<div class="btn btn-danger" style="margin-left:1.3px;">
                                        rupture de stock
                                      </div>
                                      </div>
                                      </div>
                                    </div>';
                              }else{
                                print '
                                    </div>
                                    </div>
                                  </div>';
                              }
          }
        }else{
          foreach($book as $b ){
            print ' <div class="row col-3"> 
                      <div class="card" style="width: 16rem;">
                          <img src="images/'.$b['image'].'" class="card-img-top" alt="...">
                          <div class="card-body">
                              <h5 class="card-title"> '.$b['nom'].' </h5>
                              <p class="card-text">'.$b['auteur'].'</p>
                              <p class="card-text">'.$b['prix'].'</p>
                              <a href="books.php?id='.$b['id'].'" class="btn btn-primary">Voir Plus</a>';
                              if($b['quantite'] == 0){
                                print '<div class="btn btn-danger" style="margin-left:1.3px;">
                                       rupture de stock
                                      </div>
                                      </div>
                                      </div>
                                    </div>';
                              }else{
                                print '
                                    </div>
                                    </div>
                                  </div>';
                              }
  
          }
        }
      ?>
    </div>
     <?php  include"inc/footer.php"?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>

</html>
