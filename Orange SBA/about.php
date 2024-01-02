<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>À propos</title>

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

<!-- about section starts  -->

<section class="about">

    <!-- <div class="image">
        <img src="images/about-img.png" alt="">
    </div> -->

    <div class="content">
        <h3>our story</h3>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quam modi ea fuga quibusdam fugiat porro doloremque, quas dignissimos culpa unde. Recusandae maxime aliquam beatae reiciendis, facilis voluptatum eligendi nesciunt ipsa?</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus, distinctio et? Odio voluptatum eius reprehenderit saepe quisquam excepturi molestiae architecto.</p>
        <a href="#" class="btn">read more</a>
    </div>

</section>

<!-- about section ends -->

<!-- faq section starts  -->

<section class="faq">

    <h1 class="heading"> Questions & <span> réponses</span> </h1>

    <div class="accordion-container">

       

        <div class="accordion">
            <div class="accordion-heading">
                <h3>how to place order online?</h3>
                <i class="fas fa-angle-down"></i>
            </div>
            <p class="accordioin-content">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Minus, laboriosam non eligendi reiciendis quis laborum exercitationem voluptatibus autem harum nihil nisi sed mollitia, quam blanditiis architecto cumque? Sit, voluptate maiores.
            </p>
        </div>

        <div class="accordion">
            <div class="accordion-heading">
                <h3>how to pay online?</h3>
                <i class="fas fa-angle-down"></i>
            </div>
            <p class="accordioin-content">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Minus, laboriosam non eligendi reiciendis quis laborum exercitationem voluptatibus autem harum nihil nisi sed mollitia, quam blanditiis architecto cumque? Sit, voluptate maiores.
            </p>
        </div>

        <div class="accordion">
            <div class="accordion-heading">
                <h3>is online payment safe?</h3>
                <i class="fas fa-angle-down"></i>
            </div>
            <p class="accordioin-content">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Minus, laboriosam non eligendi reiciendis quis laborum exercitationem voluptatibus autem harum nihil nisi sed mollitia, quam blanditiis architecto cumque? Sit, voluptate maiores.
            </p>
        </div>

        <div class="accordion">
            <div class="accordion-heading">
                <h3>how to contact service center?</h3>
                <i class="fas fa-angle-down"></i>
            </div>
            <p class="accordioin-content">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Minus, laboriosam non eligendi reiciendis quis laborum exercitationem voluptatibus autem harum nihil nisi sed mollitia, quam blanditiis architecto cumque? Sit, voluptate maiores.
            </p>
        </div>

    </div>

</section>

<!-- faq section ends -->

<!-- review section starts  -->

<section class="review">

    <h1 class="heading"> clients <span>review</span> </h1>

    <div class="swiper review-slider">

        <div class="swiper-wrapper">

            <div class="swiper-slide slide">
                <img src="images/pic-1.png" alt="">
                <h3>john deo</h3>
                <span>designer</span>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Incidunt explicabo laborum eos delectus, in pariatur iste! Ducimus laudantium nostrum odio.</p>
            </div>

            <div class="swiper-slide slide">
                <img src="images/pic-2.png" alt="">
                <h3>john deo</h3>
                <span>designer</span>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore, culpa non eaque illo laudantium amet. Eius beatae, consequuntur corrupti atque, quod suscipit rem maiores impedit alias labore numquam nihil nostrum.</p>
            </div>

            <div class="swiper-slide slide">
                <img src="images/pic-3.png" alt="">
                <h3>john deo</h3>
                <span>designer</span>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem, culpa. Ducimus quos fuga hic. Tempore!</p>
            </div>

            <div class="swiper-slide slide">
                <img src="images/pic-4.png" alt="">
                <h3>john deo</h3>
                <span>designer</span>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit explicabo placeat laborum pariatur voluptatibus tenetur impedit assumenda ex reprehenderit soluta ea fugiat error in laboriosam cum dicta consequuntur, sapiente minima quis hic deserunt magnam dignissimos.</p>
            </div>

            <div class="swiper-slide slide">
                <img src="images/pic-5.png" alt="">
                <h3>john deo</h3>
                <span>designer</span>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Incidunt explicabo laborum eos delectus, in pariatur iste! Ducimus laudantium nostrum odio.</p>
            </div>

            <div class="swiper-slide slide">
                <img src="images/pic-6.png" alt="">
                <h3>john deo</h3>
                <span>designer</span>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus earum quas quo natus quis, accusamus maxime magni molestias eos. Ab nihil magnam, id inventore explicabo ducimus repudiandae unde distinctio iste!</p>
            </div>

        </div>

    </div>

</section>

<!-- review section ends -->

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