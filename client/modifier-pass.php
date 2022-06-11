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
  	<?php include "../inc/header.php"; ?>
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
                <a class="nav-link" href="client/listecommandes.php">
                  <span data-feather="shopping-cart" class="align-text-bottom"></span>
                    Mes commandes
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="modifier-profile.php">
                  <span data-feather="users" class="align-text-bottom"></span>
                    Profile
                </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="modifier-pass.php">
                    <span data-feather="file" class="align-text-bottom"></span>
                      Modifier mot de passe
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
 		<div class="row gutters">
 			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
 				<h6 class="mb-2 text-primary">Personal Details</h6>
 			</div>
 			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
 				<div class="form-group">
            <label type="ancien">Ancien mot de passe</label>
            <input type="password" class="form-control" id="ancien" name="ancien" placeholder="Ancien mot de passe">
 				</div>
 			</div>
 			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
 				<div class="form-group">
 					<label for="nouveau">Telephone</label>
 					<input type="password" class="form-control" id="nouveau" name="nouveau" placeholder="Nouveau mot de passe">
 				</div>
 			</div>
             <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
 				<div class="form-group">
 					<label for="confirmer">Telephone</label>
 					<input type="password" class="form-control" id="confirmer" name="confirmer" placeholder="Confirmer mot de passe">
 				</div>
 			</div>
       </div>
 		</div>
 		<div class="row gutters">
 			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
 				<div class="text-right">
 					<button type="submit" id="submit" name="cancel" class="btn btn-secondary">Cancel</button>
 					<button type="submit" id="submit" name="modifier-pass" class="btn btn-primary">Modifier</button>
 				</div>
 			</div>
 		</div>
     </form>
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
