<?php 
session_start();
include "../../inc/functions.php";
$livres = getALLbook();
$category = getALLcategory();
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
                <a class="nav-link " aria-current="page" href="#">
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
                <a class="nav-link" href="listelivres.php">
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
                    Commandes
                  </a>
                </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="bar-chart-2" class="align-text-bottom"></span>
                  Reports
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
                <h1 class="h2">Liste des Livres</h1>
                <div >
                <button data-bs-toggle="modal" data-bs-target="#exampleModal" type="button" class="btn btn-primary ">Ajouter </button>
                </div> 
            </div>
            <div>
                <?php
                if (isset($_GET['add']) && $_GET['add'] == "ok"){
                print'<div class="alert alert-success">Livre ajouté avec succès</div>';
                }
                ?>
                <?php
                if (isset($_GET['delete']) && $_GET['delete'] == "ok" ){
                print'<div class="alert alert-success">Livre supprimé avec succès</div>';
                }
                ?>
                <?php
                if (isset($_GET['edit']) && $_GET['edit'] == "ok" ){
                print'<div class="alert alert-success">Livre modifié avec succès</div>';
                }
                ?>

                <?php
                if (isset($_GET['erreur']) && $_GET['erreur'] == "duplicate" ){
                print'<div class="alert alert-danger">Ce livre existe déjà</div>';
                }
                ?>
                <table class="table">
                    <thead class="table-light">
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Auteur(s)</th>
                        <th scope="col">Prix</th>
                        <th scope="col">Image</th>
                        <th scope="col">Quantité</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody> 
                        <?php
                        $i=0 ;
                        foreach ($livres as $livre) {
                            $i++;
                            print'
                            <tr>
                                <th scope="row">'.$i.'</th>
                                <td>'.$livre['nom'].'</td>
                                <td>'.$livre['auteur'].'</td>
                                <td>'.$livre['prix'].'</td>
                                <td>'.$livre['image'].'</td>
                                <td>'.$livre['quantite'].'</td>
                                <td> 
                                    <a data-bs-target="#editModal'.$livre['id'].'" data-bs-toggle="modal" class="btn btn-outline-success">Modifier</a>
                                    <a onClick="return popUpDeletelivre()" href= "supprimerlivre.php?idl='.$livre['id'].'" class="btn btn-outline-danger">Supprimer</a>
                                </td>
                            </tr>';
                        }
                        ?>
                    </tbody>
                </table>  
            </div>  
        </main> 
        <!-- Modal ajout-->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajout d'un livre</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                    <form action="ajoutlivre.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="text" name="nom" class="form-control" placeholder="Intitulé du livre">
                        </div>
                        <br>
                        <div class="form-group">
                            <input type ="text" name="auteur" class="form-control" placeholder="Auteur(s)">
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="number" step="0;01" name="prix" class="form-control" placeholder="Le prix">
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="file"  name="image" class="form-control" >
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="number" name="quantite" class="form-control" placeholder="La quantité">
                        </div> 
                        <br>
                        <div class="form-group ">
                            <select name="category" class="form-control" >
                                <?php 
                                foreach($category as $index => $c){
                                    print'<option value="'.$c['id'].'"> '.$c['nom']. '</option>';
                                }
                                ?>
                            </select>
                        </div >
                        <br>
                        <div class="form-group">
                            <textarea name="resume" class="form form-control" placeholder="Le resumé du livre"></textarea>
                        </div>  
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Ajouter</button>
                        </div>
                    </form>
              </div>
            </div>
          </div>
        </div>
        <?php
        foreach ($livres as $index=> $livre ) { ?>
          <!-- Modal modification-->
          <div class="modal fade" id="editModal<?php echo $livre['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Modification d'un livre</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <form action="modifierlivre.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" value="<?php echo $livre['id']; ?>" name="idl" />
                                <div class="form-group">
                                  <input type="text" name="nom" class="form-control" placeholder="nom du livre">
                                </div>
                                <br>
                                <div class="form-group">
                                  <input type="text" name="auteur" class="form-control" placeholder="auteur du livre">
                                </div>
                                <br>
                                <div class="form-group">
                                  <input type="number" name="prix" class="form-control" placeholder="prix du livre">
                                </div>
                                <br>
                                <div class="form-group">
                                  <input type="file"  name="image" class="form-control" >
                                </div>
                                <br>
                                <div class="form-group">
                                  <input type="number" name="quantite" class="form-control">
                                </div>
                                <br>
                                <div class="form-group">
                                    <select name="category" class="form-control">
                                        <?php 
                                        foreach($category as $index => $c){
                                            print'<option value="'.$c['id'].'"> '.$c['nom']. '</option>';
                                        }
                                        ?>
                                    </select>   
                                </div>
                                <br>
                                <div class="form-group">
                                  <textarea name="resume" type="text" class="form form-control" ><?php echo $livre['resume']; ?></textarea>
                                </div>
                                <br>
                                <div class="modal-footer">
                                  <button type="submit" class="btn btn-primary">Modifier</button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
        <?php  } ?>
      </div>
    </div> 
    <script src="../js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="../../js/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="../../js/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
    <script src="../../js/dashboard.js"></script>
    <script > 
    function popUpDeletelivre() {
      return confirm("Voulez-vous vraiment supprimer ce livre ?");
      
    }
    </script>
  </body>
</html>
