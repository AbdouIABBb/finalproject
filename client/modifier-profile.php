<?php 
session_start();
include "../inc/functions.php";
$category= getALLcategory();
if(isset($_POST['confirmer'])){
    changerEtatCommande("confirmer",$_POST['panier_id']);
}
if(isset($_POST['annuler'])){
    AnullerCommande($_POST['panier_id']);
    changerEtatCommande("annuler",$_POST['panier_id']);
}
$commandes = getALLcommandesByUser($_SESSION['id']);
$details = getAlldetails();

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
  	<?php include "../inc/headerdash.php"; ?>
    <div class="container-fluid">
      <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse" style="background:#2f2f33;">
          <div class="position-sticky pt-3">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link " aria-current="page" href="../profile.php">
                  <span data-feather="home" class="align-text-bottom"></span>
                    Home
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="listecommandes.php">
                  <span data-feather="shopping-cart" class="align-text-bottom"></span>
                    Mes commandes
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="modifier-profile.php">
                  <span data-feather="users" class="align-text-bottom"></span>
                      Modifier mon profile
                </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="modifier-pass.php">
                    <span data-feather="file" class="align-text-bottom"></span>
                      Modifier mon mot de passe
                  </a>
              </li>
            </ul>
          </div>
        </nav>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
          <div class="container">
            <div class="row gutters">
              <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                <div class="card h-100">
                  <div class="card-body">
                    <?php
                      if (isset($_SESSION['message']) ){
                        print'<div class="alert alert-danger">'.$_SESSION['message'].'</div>';
                        unset($_SESSION['message']);
                      }
                      if (isset($_SESSION['success']) ){
                        print'<div class="alert alert-success">'.$_SESSION['success'].'</div>';
                        unset($_SESSION['success']);
                      }
                    ?>
                    <form action="../actions/modifierProfile.php" method="post">
                      <div class="row">
                        
                          <h6 class="mb-2 text-primary">Informations personnelles</h6>
                          </div>
                            
                              <div class="form-group">
                                      <label for="fullName">Nom</label>
                                <input type="text" class="form-control mb-3 mt-2" id="fullName" name="nom" placeholder="Nom">
                              </div>
                            
                           
                              <div class="form-group">
                                <label for="Prenom">Pr??nom</label>
                                <input type="text" class="form-control mt-2 mb-3" id="Prenom" name="prenom" placeholder="Prenom">
                              </div>
                            
                            
                              <div class="form-group">
                                  <label type="email">Adresse E-mail</label>
                                  <input type="text" class="form-control mb-3 mt-2" id="email" name="email" placeholder="Adresse E-mail">
                              </div>
                            
                            
                              <div class="form-group">
                                <label for="phone">Num??ro de t??l??phone</label>
                                <input type="text" class="form-control mt-2" id="phone" name="tel" placeholder="Num??ro de t??l??phone">
                              
                            </div>
                          </div>
                        
                      </div>
                      <div class="row gutters">
                      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="text-right">
                          
                          <button type="submit" id="submit" name="modifier-profile" class="btn btn-primary mt-3">Modifier</button>
                        </div>
                      </div>
                    </form>
                    
                    </div>
                  </div>
                </div>
              </div>
 	          </div>
          </div>
        </main>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>
