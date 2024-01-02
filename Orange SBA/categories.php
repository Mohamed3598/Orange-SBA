<?php

include "include/functions.php";

$categories = getAllCategories();

$produits = getAllProduct();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- swiper css link  -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- cusom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    
<?php
include "include/header.php";
include "include/side_bar.php"

?>


<!-- category section starts  -->

<section class="category">

    <h1 class="heading"> Acheter par  <span>catégorie</span> </h1>

    <div class="box-container">

    <?php
        foreach ($categories as $categorie) {
        echo '<a href="produits.php" class="box">
            <h3>' . $categorie['nom'] . '</h3>
          </a>';
            }
     ?>


    </div>

</section>

<!-- category section ends -->


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