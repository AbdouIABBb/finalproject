<?php 
include "inc/functions.php";
$category= getALLcategory();
if(isset($_GET['id'])) {
  $book = getbookbyid($_GET['id']);
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
    <div class="row col-7 p-5">
      <div class="card" >
          <div class="card-body">
              <h5 class="card-title"> <?php echo $book['nom'] ?> </h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">An item</li>
            <li class="list-group-item">A second item</li>
            <li class="list-group-item">A third item</li>
          </ul>
          <div class="card-body">
            <a href="#" class="card-link">Card link</a>
            <a href="#" class="card-link">Another link</a>
          </div>
      </div>
    </div>
    <div class="row col-5 p-5">
      <img src="images/<?php echo $book['image']; ?>" class="card-img-top" alt="...">
    </div>
  </div>
  <!------Footer------>
  <div class="bg-dark text-center p-5 mt-5">
      <p class="text-white">Tous droits réservés</p>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>
