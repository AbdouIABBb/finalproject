<?php 
session_start();
include "inc/functions.php";
$category= getALLcategory();

if(!empty($_POST)) {

  
   $book = searchbook($_POST['search']);

}else{
    $book= getALLbook();
}




?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>LeLibraire</title>
  </head>
  <body>
  	<?php include "inc/header.php"; ?>
    <div class="row col-12 mt-4 p-5">
        <?php
        foreach($book as $b ){
          print ' <div class="row col-3"> 
                    <div class="card" style="width: 18rem;">
                        <img src="images/'.$b['image'].'" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"> '.$b['nom'].' </h5>
                            <p class="card-text">'.$b['descrition'].'</p>
                            <a href="books.php?id='.$b['id'].'" class="btn btn-primary">Voir Plus</a>
                        </div>
                    </div>
                  </div>';

        }
      ?>
    </div>
     <?php  include"inc/footer.php"?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>
