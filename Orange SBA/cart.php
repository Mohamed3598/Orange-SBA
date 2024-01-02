<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cart</title>

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

<!-- shopping cart section starts  -->

<section class="shopping-cart">

    <h1 class="heading">your <span>products</span></h1>

    <div class="box-container">

        <div class="box">
            <i class="fas fa-times"></i>
            <img src="images/product-1.jpg" alt="">
            <div class="content">
                <h3>smartphone</h3>
                <form action="">
                    <span>quantity : </span>
                    <input type="number" name="" value="1" id="">
                </form>
                <div class="price">$249.99 <span>$399.99</span></div>
            </div>
        </div>

        <div class="box">
            <i class="fas fa-times"></i>
            <img src="images/product-2.jpg" alt="">
            <div class="content">
                <h3>camera</h3>
                <form action="">
                    <span>quantity : </span>
                    <input type="number" name="" value="1" id="">
                </form>
                <div class="price">$249.99 <span>$399.99</span></div>
            </div>
        </div>

        <div class="box">
            <i class="fas fa-times"></i>
            <img src="images/product-3.jpg" alt="">
            <div class="content">
                <h3>television</h3>
                <form action="">
                    <span>quantity : </span>
                    <input type="number" name="" value="1" id="">
                </form>
                <div class="price">$249.99 <span>$399.99</span></div>
            </div>
        </div>

        <div class="box">
            <i class="fas fa-times"></i>
            <img src="images/product-4.jpg" alt="">
            <div class="content">
                <h3>speaker</h3>
                <form action="">
                    <span>quantity : </span>
                    <input type="number" name="" value="1" id="">
                </form>
                <div class="price">$249.99 <span>$399.99</span></div>
            </div>
        </div>

        <div class="box">
            <i class="fas fa-times"></i>
            <img src="images/product-6.jpg" alt="">
            <div class="content">
                <h3>smartwatch</h3>
                <form action="">
                    <span>quantity : </span>
                    <input type="number" name="" value="1" id="">
                </form>
                <div class="price">$249.99 <span>$399.99</span></div>
            </div>
        </div>

        <div class="box">
            <i class="fas fa-times"></i>
            <img src="images/product-7.jpg" alt="">
            <div class="content">
                <h3>headphone</h3>
                <form action="">
                    <span>quantity : </span>
                    <input type="number" name="" value="1" id="">
                </form>
                <div class="price">$249.99 <span>$399.99</span></div>
            </div>
        </div>

    </div>

    <div class="cart-total">
        <h3> subtotal : <span>$1499.94</span> </h3>
        <h3> discount : <span>-$99.94</span> </h3>
        <h3> subtotal : <span>$1400.00</span> </h3>
        <a href="#" class="btn">proceed to checkout</a>
    </div>

</section>

<!-- shopping cart section ends -->
















<!-- footer section starts  -->

<section class="quick-links">

    <a href="index.php" class="logo"> <i class="fas fa-store"></i> Orange SBA </a>

    <div class="links">
        <a href="index.php"> home </a>
        <a href="about.php"> about </a>
        <a href="products.php"> products </a>
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