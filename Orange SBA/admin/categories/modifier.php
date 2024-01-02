<?php
session_start();
//1-recuperation des donné de la formulaire
$id = $_POST['idc'];
$nom = $_POST['nom'];
$description = $_POST['description'];
$date_modification= date("Y-M-D");

//2-la chaine de connexion
include "../../include/functions.php";
$conn = connect();

//3-creation de la requette
$requette = "UPDATE categories SET nom = '$nom',déscriptions = '$description',date_modification = '$date_modification' WHERE id ='$id'";

//4-execution de la requette
$resultat = $conn->query($requette);

if($resultat){
    header('location:liste.php?modification=ok');
}

?>