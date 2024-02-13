<?php
    session_start();
    include "../../include/functions.php";

    if(isset($_POST['btnSubmit'])){
      //changer etat de panier 
      changerEtatPanier($_POST);

    }

    $commandes= getAllCommandes();
    $paniers= getAllPaniers();

    if(isset($_POST['btnSearch'])){
        
        if ($_POST['etat']=="tout") {
          $paniers= getAllPaniers();
        }else{
          $paniers = getPanierByEtat($paniers,$_POST['etat']);
        }
       
    }

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>ADMIN : Profile</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">

    
    <!-- Bootstrap core CSS -->
<link href="../../css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
<meta name="theme-color" content="#7952b3">

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
    </style>

    <!-- Custom styles for this template -->
    <link href="../../css/dashboard.css" rel="stylesheet">
  </head>

  <body>
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="../dashboard.php">Orange SBA</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="../../deconnexion.php">Deconnexion</a>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <?php 
      include "../template/nav.php";
    ?>  

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Liste des paniers</h1>


      </div>
      
      <div>
       <form action="liste.php" method="POST">
        <div class="form-group d-flex">
        <select name="etat" class="form-control">
          <option value="">--Choisir l'etat de panier--</option>
          <option value="tout">Tout</option>
          <option value="en cours">En cours</option>
          <option value="en livraison">En livraison</option>
          <option value="livraison terminer">Livraison terminer</option>
        </select>
        <button type="submit" class="btn btn-primary" name="btnSearch">Chercher</button>
        </div>
        
       </form>
      
      <table class="table ">
            <thead class="table-danger">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Client</th>
                <th scope="col">Numéro</th>
                <th scope="col">Total</th>
                <th scope="col">Date</th>
                <th scope="col">Etat</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                     $i=0;
                     foreach ($paniers as $panier){
                         $i++;
                         print'<tr>
                         <th scope="row">'.$i.'</th>
                         <td>'.$panier['nom']." ".$panier['prénom'].'</td>
                         <td>'.$panier['numero'].'</td>
                         <td>'.$panier['total'].' TND</td>
                         <td>'.$panier['date_creation'].'</td>
                         <td>'.$panier['etat'].'</td>
                         <td>
                            <a  data-bs-toggle="modal" data-bs-target="#commandes'.$panier['id'].'" class="btn btn-success">Détails</a>
                            <a data-bs-toggle="modal" data-bs-target="#traiter'.$panier['id'].'" class="btn btn-primary">Traiter</a>
                        </td>
                     </tr>';
                     }
                
                ?>
                
            </tbody>
        </table>
       
      
    </main>
  </div>
</div>

<?php
  foreach($paniers as $index => $panier) {
    ?>
    <!-- Modal commandes -->
    <div class="modal fade" id="commandes<?php echo $panier['id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Liste des commandes</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Nom Produit</th>
                      <th>Image</th>
                      <th>Quantité</th>
                      <th>Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    foreach($commandes as $index => $commande){

                      if($commande['panier']==$panier['id']){//si commande appartient panier ouvert
                        print'<tr>
                        <td>'.$commande['nom'].'</td>
                        <td><img src="../../images/'.$commande['images'].'" width="100"></td>
                        <td>'.$commande['quantité'].'</td>
                        <td>'.$commande['total'].'</td>
                        
                        </tr>';

                      }  
                      

                    }
                    
                    ?>



                  </tbody>
                </table>

              </div>
  

              <div class="modal-footer">
                      
              </div>
      
              
            </div>
          </div>
        </div>
        <!--Modal ends-->

<?php
  }

?>
<?php
  foreach($paniers as $index => $panier) {
    ?>
    <!-- Modal traiter -->
    <div class="modal fade" id="traiter<?php echo $panier['id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Traiter la commande</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>


              <div class="modal-body">
                <form action="<?php echo $_SERVER['PHP_SELF'];?> " method="post">
                  <input type="hidden" value="<?php echo$panier['id'];?>" name="id_panier">
                  <div class="form-group">
                    <select name="etat" class="form-control">
                      <option value="en livraison">En livraison</option>
                      <option value="livraison terminer">Livraison terminer</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <button type="submit" name="btnSubmit" class="btn btn-primary">Sauvgarder</button>
                  </div>

                </form>
              </div>
  

              <div class="modal-footer">
                      
              </div>
      
              
            </div>
          </div>
        </div>
        <!--Modal ends-->

<?php
  }

?>






    <script src="../../js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>
