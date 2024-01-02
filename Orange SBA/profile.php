<?php
session_start();

if(!isset($_SESSION['nom'])){
    header('location:login.php');
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

    <link rel="stylesheet" href="css/style.css">
    <title>profile</title>
</head>
<body>

<?php
include 'include/header.php';
include 'include/side_bar.php';

?>
    <div class='user'>
    <h1>bienvenue <span ><?php echo $_SESSION['nom']." ".$_SESSION['prénom'];?></span></h1>

    <a href="deconnexion.php">Deconnexion</a>
    </div>


    <!-- footer section starts  -->

<section class="quick-links">

<a href="index.php" class="logo"> <i class="fas fa-store"></i> Orange SBA </a>

<div class="links">
    <a href="index.php"> home </a>
    <a href="about.php"> about </a>
    <a href="categories.php"> categories </a>
    <a href="contact.php"> contact </a>
    <a href="login.php"> login </a>
    <a href="register.php"> register </a>
    <a href="cart.php"> cart </a>
</div>

<div class="share">
    <a href="#" class="fab fa-facebook-f"></a>
    <a href="#" class="fab fa-twitter"></a>
    <a href="#" class="fab fa-instagram"></a>
    <a href="#" class="fab fa-linkedin"></a>
</div>

</section>

<section class="credit">

<p> created by <span>Mohamed Toumi</span> | all rights reserved! </p>

<img src="images/card_img.png" alt="">

</section>

<!-- footer section ends -->



    <!-- swiper js link      -->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>
</body>
</html>