<?php


$id_produit = $_POST['produit'];
$quantité = $_POST['quantité'];

//selectionner le produit avec leur id
include "../include/functions.php";
//connexion bd
$conn = connect();
//requette
$requette="SELECT prix FROM produits WHERE id='$id_produit'";
//execution
$resultat = $conn->query($requette);
$produit = $resultat->fetch();

$total = $quantité * $produit['prix'];

$date = date("Y-m-d");

//ajouter commande
//requette
$requette="INSERT INTO commandes(produit,quantité,total,panier,date_creation,date_modification) values('$id_produit','$quantité','$total',0,'$date','$date')";
//execution
$resultat = $conn->query($requette);

?>