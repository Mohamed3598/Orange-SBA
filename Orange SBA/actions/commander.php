<?php
 session_start();
 //test user connectee
 if(!isset($_SESSION['nom'])){//user non connectée
     header('Location:../login.php');
    exit();
 }

include "../include/functions.php";
//connexion bd
$conn = connect();

$visiteur = $_SESSION['id'];

$id_produit = $_POST['produit'];
$quantité = $_POST['quantité'];
//requette
$requette="SELECT prix,nom,images FROM produits WHERE id='$id_produit'";
//execution
$resultat = $conn->query($requette);

$produit = $resultat->fetch();

$total = $quantité * $produit['prix'];
$date = date("Y-m-d");
if(!isset($_SESSION['panier'] )){//panier n'existe pas
    $_SESSION['panier'] = array($visiteur,0,$date,array() );//creation de panier
}
$_SESSION['panier'][1] += $total;

$_SESSION['panier'][3][] = array($quantité,$total,$date,$date,$id_produit,$produit['nom'],$produit['images']);



header('location:../cart.php');

?>