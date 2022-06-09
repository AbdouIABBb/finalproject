<?php 
  session_start();
  include "inc/functions.php";
  $category= getALLcategory();
  if(!isset($_SESSION['nom'])){
    header('location:connexion.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Profile</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
      <?php
      include "inc/header.php";
      ?>
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
    <form action="actions/modifierProfile.php" method="post">
		<div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<h6 class="mb-2 text-primary">Personal Details</h6>
			</div>
      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
        <label>Nom</label>
					<p class="form-control" id="fullName"> <?php echo $_SESSION['nom']; ?></p>
				</div>
			</div>
      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label>Prenom</label>
					<p class="form-control" id="fullName"> <?php echo $_SESSION['prenom']; ?></p>
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
        <label>Prenom</label>
					<p class="form-control" id="fullName"> <?php echo $_SESSION['email']; ?></p>
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="phone">Telephone</label>
					<input type="text" class="form-control" id="phone" name="tel" placeholder="Enter phone number">
				</div>
			</div>
      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="ancien">Ancien mot de passe</label>
					<input type="password" class="form-control" id="ancien" name="ancienMP" placeholder="Enter phone number">
				</div>
			</div>
      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="nouveau">Nouveau mot de passe</label>
					<input type="password" class="form-control" id="nouveau" name="nouveauMP" placeholder="Enter phone number">
				</div>
			</div>
      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="confimer">Confirmer mot de passe</label>
					<input type="password" class="form-control" id="confirmer" name="confirmerMP" placeholder="Enter phone number">
				</div>
			</div>
      </div>
		</div>
		<div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="text-right">
					<button type="submit" id="submit" name="cancel" class="btn btn-secondary">Cancel</button>
					<button type="submit" id="submit" name="modifier" class="btn btn-primary">Modifier</button>
				</div>
			</div>
		</div>
    </form>
	</div>
</div>
</div>
</div>
</div>
      <?php  include"inc/footer.php"?>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>