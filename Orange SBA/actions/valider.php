<?php
session_start();
include "../include/functions.php";
//connexion bd
$conn = connect();

$visiteur = $_SESSION['id'];
$total = $_SESSION['panier'][1];
$date = date('Y-m-d');

//creation de panier
$requettePanier = "INSERT INTO panier(visiteur,total,date_creation) values('$visiteur','$total','$date')";
//execution requettePanier
$resultat = $conn->query($requettePanier);
$panier_id=$conn->lastInsertId(); 

$commandes = $_SESSION['panier'][3];

foreach($commandes as $commande){
    //ajouter commande

    //requette
    $quantité = $commande[0];
    $total = $commande[1];
    $id_produit = $commande[4];
    $requette="INSERT INTO commandes(produit,quantité,total,panier,date_creation,date_modification) values('$id_produit','$quantité','$total','$panier_id','$date','$date')";
    //execution
    $resultat = $conn->query($requette);
}
//supprimer panier apres la validation
$_SESSION['panier'] = null;
//redirection
header('location:../index.php');

?>
