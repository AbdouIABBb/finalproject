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
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
              <h1 class="h2">Liste des commandes</h1>
              
            </div>
            <div>
              <table class="table">
                <thead class="table-light">
                  <tr>
                    <th scope="col">#</th>
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
                    foreach ($commandes as $c ) { ?>

                        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                        <input type="hidden" value="<?php echo $c['id']; ?>" name="panier_id">
                        <?php 
                           $i++ ;
                           if($c['etat'] == "En cours"){
                            print ' 
                            <tr>
                              <th scope="row">'.$i.'</th>
                              
                              <td> '.$c['rue'].' '.$c['ville'].'</td>
                              <td> '.$c['total'].' </td>
                              <td> '.$c['date_creation'].' </td>
                              <td> '.$c['etat'].' </td>
                              <td>
                                <a data-bs-toggle="modal" data-bs-target="#Commandes'.$c['id'].'" class="btn btn-primary">Afficher</a>
                                <button type="submit"class="btn btn-success" name="confirmer">Confirmer</a>
                                <button type="submit" class="btn btn-danger" name="annuler">Annuler</a>
                              </td>
                            </tr>';
                           }else{
                            print ' 
                            <tr>
                              <th scope="row">'.$i.'</th>
                              
                              <td> '.$c['rue'].' '.$c['ville'].'</td>
                              <td> '.$c['total'].' </td>
                              <td> '.$c['date_creation'].' </td>
                              <td> '.$c['etat'].' </td>
                              <td>
                                <a data-bs-toggle="modal" data-bs-target="#Commandes'.$c['id'].'" class="btn btn-primary">Afficher</a>
                              </td>
                            </tr>';
                           }
                            
                        ?>
                        </form>
                    <?php } ?>
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
                                                <td><img src="../images/'.$d['image'].'"width="50"/></td>
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
        <?php  }  ?>
    <script src="../js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="../../js/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="../../js/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
    <script src="../../js/dashboard.js"></script>

  </body>
</html>
