<?php 
  session_start();
  include "inc/functions.php";
  $category= getALLcategory();
  if(!isset($_SESSION['nom'])){
    header('location:connexion.php');
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
    <div class="container-fluid">
      <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse" style="background:#2f2f33;">
          <div class="position-sticky pt-3">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link " aria-current="page" href="#">
                  <span data-feather="home" class="align-text-bottom"></span>
                    Home
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="client/listecommandes.php">
                  <span data-feather="shopping-cart" class="align-text-bottom"></span>
                    Mes commandes
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="client/modifier-profile.php">
                  <span data-feather="users" class="align-text-bottom"></span>
                    Profile
                </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="client/modifier-pass.php">
                    <span data-feather="file" class="align-text-bottom"></span>
                      Modifier mot de passe
                  </a>
              </li>
            </ul>
          </div>
        </nav>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Profile</h1>
            <div >
              <?php
                echo $_SESSION['nom'];
              ?>
            </div>
          </div>
          <div class="container">
            <h1>Nom: <span class="text-primary"><?php echo$_SESSION['nom'];?></span></h1>
            <h1>Email: <span class="text-primary"><?php echo$_SESSION['email'];?></span></h1>
            <a data-bs-toggle="modal" data-bs-target="#profileEdit" class="btn btn-primary">Modifier</a>
          </div>
        </main>
      </div>
    </div>
    <div class="modal fade" id="profileEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modifier profile</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="" method="POST">
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Modifier</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
	<script src="../js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>
