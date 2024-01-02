<?php

 
// echo"id de categorie " . $_GET['idc'];
$idproduits  = $_GET['idc'];

include "../../include/functions.php";

$conn = connect();

$requette = "DELETE FROM produits WHERE id='$idproduits'";

$resultat = $conn->query($requette);

if($resultat){
    header('location:liste.php?delete=ok');
}








?>