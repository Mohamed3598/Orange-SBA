<?php
session_start();

if(isset($_SESSION['nom'])){
    
}


include "../include/functions.php";
$user=true;

if (!empty($_POST)) {//click sur le button register

    $user = ConnectAdmin($_POST);
    if (is_array($user) && count($user) > 0) {
        session_start();
        $_SESSION['id'] = $user['id'];
        $_SESSION['email'] = $user["email"];
        $_SESSION['nom'] = $user["nom"];
        $_SESSION['mdp'] = $user["mdp"];
        
        header('Location: dashboard.php');

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
    <link rel="stylesheet" href="../css/style.css">

</head>
<body>
    

<!-- login form section starts  -->

<section class="login">

    <form action="login.php" method="POST">
        <h3>Espace Admin</h3>
        <input type="email" name="email" placeholder="enter your email" id="" class="box">
        <input type="password" name="mdp" placeholder="enter your password" id="" class="box">
    
        <input type="submit" value="login now" class="btn">
    </form>

</section>

<!-- login form section ends  -->

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