<?php
session_start();
//1-recuperation des donné de la formulaire
$id = $_POST['idc'];
$nom = $_POST['nom'];
$details = $_POST['details'];
$prix = $_POST['prix'];
$categorie = $_POST['categorie'];

// Initialize $image variable
$image = '';

// Check if "image" key exists in $_FILES array
if (isset($_FILES["image"]["name"])) {
    // Continue with the upload process
    $target_dir = "../../images/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        $image = $_FILES["image"]["name"];
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
} else {
    // Handle the case when "image" key is not set
    echo "No image file provided.";
}

// Rest of your code...
$date = date("Y-m-d");

//2-la chaine de connexion
include "../../include/functions.php";
$conn = connect();

//3-creation de la requette
$requette = "UPDATE produits SET nom = '$nom',details = '$details',prix = '$prix',catégorie = '$categorie',image = '$image',date_modification = '$date' WHERE id ='$id'";

//4-execution de la requette
$resultat = $conn->query($requette);

if ($resultat) {
    header('location:liste.php?modification=ok');
}
