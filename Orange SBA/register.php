<?php
session_start();

if(isset($_SESSION['nom'])){
    header('location:profile.php');
}



include "include/functions.php";

$registrationAlert = 0; 

if (!empty($_POST)) {//click sur le button register
   if(addVisiteur($_POST)) {
    $registrationAlert = 1; 

   }
}



?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- swiper css link  -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!--sweet alert link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.10.1/sweetalert2.min.css">

    <!-- cusom css file link  -->
    <link rel="stylesheet" href="css/style.css">

    
</head>
<body>
    
<?php
include "include/header.php";
include "include/side_bar.php"

?>

<!-- register form section starts  -->

<section class="register">

    <form action="register.php" method="POST">
        <h3>Inscription</h3>
        <input type="text" name="nom" placeholder="Entrez votre nom" id="" class="box">
        <input type="text" name="prénom" placeholder="Entrez votre prénom" id="" class="box">
        <input type="email" name="email" placeholder="Entrez votre adresse e-mail" id="" class="box">
        <input type="number" name="numero" placeholder="Entrez votre numéro de téléphone" id="" class="box">
        <input type="password" name="mdp" placeholder="Entrez votre mot de passe" id="" class="box">
        <input type="submit" value="Inscrivez-vous" class="btn">
        <p>Vous avez déjà un compte ?</p>
        <a href="login.php" class="btn link">Connectez</a>
    </form>

</section>

<!-- register form section ends  -->

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
<!--sweet alert link-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.10.1/sweetalert2.all.min.js"></script>
<?php
if ($registrationAlert == 1) {
    print '
    <script>
        Swal.fire({
        position: "top-end",
        icon: "success",
        title: "bienvenue chez orange sba",
        showConfirmButton: false,
        timer: 1500
        });
    </script>';
}
?>


 



</html>