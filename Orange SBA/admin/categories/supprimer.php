<?php

 
// echo"id de categorie " . $_GET['idc'];
$idcategorie  = $_GET['idc'];

include "../../include/functions.php";

$conn = connect();

$requette = "DELETE FROM categories WHERE id='$idcategorie'";

$resultat = $conn->query($requette);

if($resultat){
    header('location:liste.php?delete=ok');
}








?>