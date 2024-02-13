<?php

include "include/functions.php";

$categories = getAllCategories();

if(isset($_GET["id"])){
    $produits = getProductsByCategorie($_GET['id']);
}else{
    $produits = getAllProduct();
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- font awesome cdn link  -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- swiper css link  -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
   
    <!-- cusom css file link  -->
    <link rel="stylesheet" href="css/style.css">
    <title>produits</title>
</head>
<body>
    <?php
    include "include/header.php";
    include "include/side_bar.php";
    
    
    ?>
<section class="products">

<h1 class="heading"> Produits en  <span>vedette</span> </h1>

<div class="box-container">
<?php
    foreach ($produits as $produit) {
        echo '<div class="box" data-target="p-1">
                <div class="image">
                    <img src="images/'.$produit['images'].'" class="main-img" alt="">
                </div>
                <div class="content">
                    <h3>' . $produit['nom'] . '</h3>
                    <h4>' . $produit['details'] . '</h4>
                    <div class="price">' . $produit['prix'].' TND </span></div>

                    <form action="actions/commander.php" method="POST">
                    <input type="hidden" name="produit" value="' . $produit['id'] . '">
                        <input type="number" name="quantité" step="1" placeholder="quantité de produit">
                        <button type="submit" class=" fas fa-shopping-cart ">Acheter</button>
    
                </form>
                </div>
                
            </div>';
    }
  


?>

</section>
<!-- product banner section starts  -->

<section class="product-banner">

    <h1 class="heading"> <span>Offre </span> du jour </h1>

    <div class="box-container">

        <div class="box">
            <img src="images/product-banner-1.jpg" alt="">
            <div class="content">
                <span>Offre spéciale</span>
                <h3>Jusqu'à 50%</h3>
                <a href="#" class="btn">Acheter maintenant</a>
            </div>
        </div>

        <div class="box">
            <img src="images/product-banner-2.jpg" alt="">
            <div class="content">
                <span>Offre spéciale</span>
                <h3>Jusqu'à 50%</h3>
                <a href="#" class="btn">Acheter maintenant</a>
            </div>
        </div>

    </div>
    
</section>

<!-- product banner section ends -->

<!-- footer section starts  -->
<?php
include "include/footer.php";
?>
<!-- footer section ends -->



<!-- swiper js link      -->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>


<!-- custom js file link  -->
<script src="js/script.js"></script>
</body>
</html>