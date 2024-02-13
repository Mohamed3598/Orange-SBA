<?php
session_start();

if(isset($_SESSION['nom'])){
    header('location:profile.php');
}


include "include/functions.php";
$user=true;

if (!empty($_POST)) {//click sur le button register

    $user = ConnectVisiteur($_POST);
    if (is_array($user) && count($user) > 0) {
        session_start();
        $_SESSION['id'] = $user["id"];
        $_SESSION['email'] = $user["email"];
        $_SESSION['nom'] = $user["nom"];
        $_SESSION['prénom'] = $user["prénom"];
        $_SESSION['mdp'] = $user["mdp"];
        $_SESSION['numero'] = $user["numero"];
        // $_SESSION['etat'] = $user["etat"];

        header('Location: profile.php');

    }

        
    }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>

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
<!-- login form section starts  -->

<section class="login">

    <form action="login.php" method="POST">
        <h3>Connectez maintenant</h3>
        <input type="email" name="email" placeholder="Entrez votre adresse e-mail" id="" class="box">
        <input type="password" name="mdp" placeholder="Entrez votre mot de passe" id="" class="box">
        <div class="remember">
            <input type="checkbox" name="" id="remember-me">
            <label for="remember-me"> Remember me </label>
        </div>
        <input type="submit" value="Connectez" class="btn">
        <p>Vous n'avez pas de compte?</p>
        <a href="register.php" class="btn link">Inscrivez maintenant</a>
    </form>

</section>

<!-- login form section ends  -->

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
if (!$user) {
    print '
    <script>
        Swal.fire({
        position: "top-end",
        icon: "error",
        title: "Cordonné non valide",
        showConfirmButton: false,
        timer: 1500
        });
    </script>';
}
?>
</html>