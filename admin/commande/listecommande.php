<?php 
session_start();
include "../../inc/functions.php";
if(isset($_POST['btnSubmit'])){
  if($_POST['etat'] == 'annuler'){
    AnullerCommande($_POST['panier_id']);
    changerEtatCommande("annuler",$_POST['panier_id']);
  }else if($_POST['etat'] == 'confirmer'){
    changerEtatCommande("confirmer",$_POST['panier_id']);
  }else{
    changerEtatCommande("payer",$_POST['panier_id']);
  }

}
$commandes = getALLcommandes();
$details = getAlldetails();

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.98.0">
    <title>Espace Admin ! </title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/dashboard/">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/components/modal/#content">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="../../css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/docs/5.2/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/5.2/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/5.2/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/5.2/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/5.2/assets/img/favicons/safari-pinned-tab.svg" color="#712cf9">
    <link rel="icon" href="/docs/5.2/assets/img/favicons/favicon.ico">
    <meta name="theme-color" content="#712cf9">
    <style>
        .bd-placeholder-img {
          font-size: 1.125rem;
          text-anchor: middle;
          -webkit-user-select: none;
          -moz-user-select: none;
          user-select: none;
        }

        @media (min-width: 768px) {
          .bd-placeholder-img-lg {
            font-size: 3.5rem;
          }
        }

        .b-example-divider {
          height: 3rem;
          background-color: rgba(0, 0, 0, .1);
          border: solid rgba(0, 0, 0, .15);
          border-width: 1px 0;
          box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
          flex-shrink: 0;
          width: 1.5rem;
          height: 100vh;
        }

        .bi {
          vertical-align: -.125em;
          fill: currentColor;
        }

        .nav-scroller {
          position: relative;
          z-index: 2;
          height: 2.75rem;
          overflow-y: hidden;
        }

        .nav-scroller .nav {
          display: flex;
          flex-wrap: nowrap;
          padding-bottom: 1rem;
          margin-top: -1px;
          overflow-x: auto;
          text-align: center;
          white-space: nowrap;
          -webkit-overflow-scrolling: touch;
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="../../css/dashboard.css" rel="stylesheet">
  </head>
  <body>
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">LeLibraire</a>
      <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search">
      <div class="navbar-nav">
        <div class="nav-item text-nowrap">
          <a class="nav-link px-3" href="../../deconnexion.php">Deconnexion</a>
        </div>
      </div>
    </header>

    <div class="container-fluid">
      <div class="row">
          <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="position-sticky pt-3">
              <ul class="nav flex-column">
                <li class="nav-item">
                  <a class="nav-link " aria-current="page" href="../home.php">
                    <span data-feather="home" class="align-text-bottom"></span>
                    Home
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../category/listecategory.php">
                    <span data-feather="file" class="align-text-bottom"></span>
                    Catégories
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../livres/listelivres.php">
                    <span data-feather="shopping-cart" class="align-text-bottom"></span>
                    Livres
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../user/listeusers.php">
                    <span data-feather="users" class="align-text-bottom"></span>
                    Utilisateurs
                  </a>
                  
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../commande/listecommande.php">
                    <span data-feather="file" class="align-text-bottom"></span>
                    commandes
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" href="../profile.php">
                    <span data-feather="layers" class="align-text-bottom"></span>
                    Profile
                  </a>
                </li>
              </ul>
            </div>
          </nav>
          <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
              <h1 class="h2">Liste des commandes</h1>
              
            </div>
            <div>
              <?php
              if (isset($_GET['add']) && $_GET['add'] == "ok"){
                print'<div class="alert alert-success">Catégorie ajoutée avec succès</div>';
              }
              ?>
              <?php
              if (isset($_GET['delete']) && $_GET['delete'] == "ok" ){
                print'<div class="alert alert-success">Catégorie supprimée avec succès</div>';
              }
              ?>
              <?php
              if (isset($_GET['edit']) && $_GET['edit'] == "ok" ){
                print'<div class="alert alert-success">Catégorie modifiée avec succès</div>';
              }
              ?>
              <table class="table">
                <thead class="table-light">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">client</th>
                    <th scope="col">Téléphone</th>
                    <th scope="col">Adresse de livraison</th>
                    <th scope="col">total</th>
                    <th scope="col">date </th>
                    <th scope="col">Etat </th>
                    <th scope="col">Action </th>
                  </tr>
                </thead>
                <tbody> 
                  <?php
                    $i=0 ;
                    foreach ($commandes as $c ) {
                      $i++ ;
                      print ' 
                        <tr>
                          <th scope="row">'.$i.'</th>
                          <td>'.$c['nom'].' '.$c['prenom'].'</td>
                          <td> '.$c['telephone'].' </td>
                          <td> '.$c['rue'].' '.$c['ville'].'</td>
                          <td> '.$c['total'].' </td>
                          <td> '.$c['date_creation'].' </td>
                          <td> '.$c['etat'].' </td>
                          <td>
                            <a data-bs-toggle="modal" data-bs-target="#Commandes'.$c['id'].'" class="btn btn-success">Afficher</a>';
                          if($c['etat'] == " confirmer" || $c['etat'] == "En cours"){
                            echo '<a data-bs-toggle="modal" data-bs-target="#Traiter'.$c['id'].'" class="btn btn-primary">Traiter</a>
                                    </td>
                                  </tr>';
                          }
                    } 
                  ?>
                </tbody>
              </table>  
            </div>  
          </main> 
      </div>
    </div> 
    <?php
        foreach ($commandes as $index=> $c ) { ?>
          <div class="modal fade" id="Commandes<?php echo $c['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Detail de la commande</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <table class="table">
                                  <thead>
                                       <tr>
                                          <th>Livres </th>
                                          <th>Image </th>
                                          <th>Quantite </th>
                                          <th>Total </th>
                                       </tr>
                                  </thead>
                                  <tbody>
                                     <?php
                                        foreach ($details as $index => $d){
                                          if($d['panier'] == $c['id']){
                                          print'<tr>
                                                <td>'.$d['nom'].'</td>
                                                <td><img src="../../images/'.$d['image'].'"width="50"/></td>
                                                <td>'.$d['quantite'].'</td>
                                                <td>'.$d['total'].'DA</td>
                                              </tr>';
                                          }                                  
                                        }
                                      ?>
                                  </tbody>
                                </table>
                              
                                </div>
                                <div class="modal-footer">
                                  
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
        <?php  } 

foreach ($commandes as $index=> $c ) { ?>
  <!-- Modal Traitement-->
  <div class="modal fade" id="Traiter<?php echo $c['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Traiter les commandes </h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                        <input type="hidden" value="<?php echo $c['id']; ?>" name="panier_id">
                        <?php if($c['etat'] == " confirmer"){
                          print'<div class="form-group mb-3">
                          <select name="etat" class="form-control">
                               <option value="annuler">Annulée</option>
                               <option value="payer">Payée</option>
                          </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="btnSubmit" class="btn btn-primary">Sauvegarder</button>
                        </div>';
                        }else{
                          print'<div class="form-group mb-3">
                          <select name="etat" class="form-control">
                               <option value="confirmer">confirmer</option>
                               <option value="annuler">Annulée</option>
                               <option value="payer">Payée</option>
                          </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="btnSubmit" class="btn btn-primary">Sauvegarder</button>
                        </div>';
                        }
                        ?>
                        </form>
                    </div>
                  </div>
                </div>
              </div>
<?php  }
         ?>
    <script src="../js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="../../js/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="../../js/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
    <script src="../../js/dashboard.js"></script>

  </body>
</html>
