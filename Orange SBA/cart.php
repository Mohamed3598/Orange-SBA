<?php
session_start();
include "include/functions.php";
$total = $_SESSION['panier'][1];
$commandes = [];

if(isset($_SESSION['panier'])){
    if(count($_SESSION['panier'][3]) > 0) {
            $commandes = $_SESSION['panier'][3];

    }
}
?>

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

    <?php
        foreach($commandes as $index => $commande){
            echo '<div class="box">
                <a href="actions/enlever-produit.php?id='.$index.'" class="fas fa-times"></a>';
            
            // Check if the key 6 exists in the $commande array
            if(isset($commande[6])){
                echo '<img src="images/'.$commande[6].'" alt="">';
            } else {
                echo '<p>Image not available</p>';
            }
            
            echo '<div class="content" >'.($index+1).'
                    <h3>'.$commande[5].'</h3>
                    <form action="">
                        <span>quantity : '.$commande[0].' </span>
                        <input type="number" name="" value="1" id="">
                    </form>
                    <div class="price"> '.$commande[1].' TND</div>
                </div>
            </div>';
        }
        
    ?>
        


    </div>

    <div class="cart-total">
        <h3> Total : <span><?php echo $total; ?> TND</span> </h3>
        <a href="actions/valider.php" class="btn">Valider la  panier</a>
    </div>

</section>

<!-- shopping cart section ends -->

<!-- footer section starts  -->

<?php
include "include/footer.php"
?>

<!-- footer section ends -->


<!-- swiper js link      -->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>