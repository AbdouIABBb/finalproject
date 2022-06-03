
<nav class="navbar navbar-expand-lg bg-light">
         <div class="container-fluid">
             <a class="navbar-brand" href="index.php">LeLibraire</a>
                 <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                     <span class="navbar-toggler-icon"></span>
                 </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                 <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Catégories </a>
                     <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                         <?php
                         foreach($category as $cat){
                             print' <li><a class="dropdown-item" href="index.php?cat='.$cat['id'].'">'.$cat['nom'].'</a></li> ';
                         }

                         ?>
                         
                     </ul>
                 </li>
                 <?php if( isset($_SESSION['nom'])){
                       if(isset($_SESSION ['role'])){
                        print'  <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="admin/profile.php">Profile </a>
                    </li>';
                       }else{
                     print'  <li class="nav-item">
                     <a class="nav-link active" aria-current="page" href="profile.php">Profile </a>
                 </li>';
                }

                 if(isset($_SESSION['panier'][3])){
                      print'  <li class="nav-item">
                 <a class="nav-link active" aria-current="page" href="panier.php">Mon Panier (<span class="text-danger">'.count($_SESSION['panier'][3]).'</span>) </a>
                  </li>';
                }else {
                    print'  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Mon Panier (<span class="text-danger"> 0 </span>) </a>
                     </li>';
                    }

                 

                 }else{
                     print' <li class="nav-item">
                     <a class="nav-link active" aria-current="page" href="connexion.php">Connexion</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link active" aria-current="page" href="inscription.php">Insciption</a>
                 </li>';
                 }?>
                
             </ul>
             <form class="d-flex" role="search" action="index.php" method ="POST">
                 <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
                 <button class="btn btn-outline-success" type="submit">Search</button>
             </form>

             <?php
             if( isset($_SESSION['nom'])){

                print'<a href="deconnexion.php" class="btn btn-primary" style="margin-left:5px">Deconnexion </a>
                ';
             }
             ?>
         </div>
         </div>
    </nav>