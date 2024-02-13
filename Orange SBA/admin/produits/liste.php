<?php
    session_start();

    include "../../include/functions.php";

    $categories = getAllCategories();
    $produits = getAllProduct() ;

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
        <h1 class="h2">Liste des Produits</h1>

        <div>
           <a class="btn btn-primary"data-bs-toggle="modal" data-bs-target="#exampleModal">Ajouter</a>
        </div>

      </div>
      
      
      <div>
      <?php if(isset($_GET['ajout']) && $_GET['ajout'] == "ok"){
          print'<div class="alert alert-success">
          Produit Ajoutée avec succes
  
        </div>';
        } ?>

        <?php if(isset($_GET['delete']) && $_GET['delete'] == "ok"){
          print'<div class="alert alert-danger">
          Produit Supprimer avec succes
  
        </div>';
        } ?>

        <?php if(isset($_GET['modification']) && $_GET['modification'] == "ok"){
          print'<div class="alert alert-primary">
          Produit Modifier avec succes
  
        </div>';
        } ?>
        
      <table class="table ">
            <thead class="table-danger">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nom</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    
                    foreach ($produits as $i => $produit){
                        
                        print'<tr>
                        <th scope="row">'.$i.'</th>
                        <td>'.$produit['nom'].'</td>
                        <td>'.$produit['details'].'</td>
                        <td>
                        <a data-bs-toggle="modal" data-bs-target="#editModal'.$produit['id'].'" class="btn btn-success">Modifier</a>
                        <a href="supprimer.php?idc='.$produit['id'].'" class="btn btn-danger">Supprimer</a>
                
                        </td>
                    </tr>';
                    }
                
                ?>
                
            </tbody>
        </table>
       
      
    </main>
  </div>
</div>
<!-- Modal ajout -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Ajout Produit</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="ajout.php" method="post" enctype="multipart/form-data">
          <div class="form-group mb-2">
            <input type="text" name="nom" required class="form-control" placeholder="nom de produit ..." >

          </div>
          <div class="form-group mb-2">
            <textarea name="details" required class="form-control" placeholder="details de  produit ..."></textarea>

          </div>
          <div class="form-group mb-2">
            <input type="text" name="prix" required step="0.10" class="form-control" placeholder="prix de produit ..." >

          </div>
          <div class="form-group mb-2">
            <input type="file" name="images" required class="form-control" >
            
          </div>
          <div class="form-group mb-2" >
          <label for="exampleSelect">Sélectionnez une catégorie :</label>
            <select name="categorie" class="form-control" id="exampleSelect" >
              <?php
                foreach($categories as $index => $categorie)
                print '<option value="'.$categorie['id'].'">'.$categorie['nom'].'</option>';
                
              ?>
             
            </select>
          </div>
          
          <div class="form-group">
            <input type="number" name="quantité" class="form-control" placeholder="Tapez la quantité de produit ...">
          </div>
          <input type="hidden" name="createur" value="<?php echo $_SESSION['id'];?>">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
        <button type="submit" class="btn btn-primary">Ajouter</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!--Modal ends-->

<?php
  foreach($produits as $index => $produit) {
    ?>
    <!-- Modal modifier -->
    <div class="modal fade" id="editModal<?php echo $produit['id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modifier produit</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form action="modifier.php" method="post" enctype="multipart/form-data">
                  <input type="hidden" value="<?php echo $produit['id']; ?>" name="idc">
                    <div class="form-group">
                        <input type="text" name="nom" class="form-control" value="<?php echo $produit['nom'];?>" placeholder="nom de produit ...">
                    </div>
                    <div class="form-group">
                        <textarea name="details" class="form-control" placeholder="detail de produit ..."><?php echo $produit['details'];?></textarea>
                    </div>
                    <div class="form-group">
                    <input type="text" name="prix"  step="0.10" class="form-control" value="<?php echo $produit['prix'];?>" placeholder="prix de produit ..." >

                    </div>
                    <div class="form-group">
                      <input type="file" name="images"  class="form-control" value="<?php echo $produit['images'];?>" >
                      
                    </div>
                    <div class="form-group">
                      <select name="categorie"  class="form-control" >
                        <?php
                          foreach($categories as $index => $categorie)
                          print '<option value="'.$categorie['id'].'">'.$categorie['nom'].'</option>'
                        ?>
                      
                      </select>

                    </div>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                      <button type="submit" class="btn btn-primary">Modifier</button>
              </div>
                  
                
              </div>
              
              </form>
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
