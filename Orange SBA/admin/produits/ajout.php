<?php
session_start();
//1-recuperation des donné de la formulaire
$nom = $_POST['nom'];
$details = $_POST['details'];
$prix = $_POST['prix'];
$categorie = $_POST['categorie'];
$createur = $_POST['createur'];
$quantité = $_POST['quantité'];
$date_creation = date('Y-m-d');


//upload image
    $target_dir = "../../images/";
    $target_file = $target_dir . basename($_FILES["images"]["name"]);

    if (move_uploaded_file($_FILES["images"]["tmp_name"], $target_file)) {
        $image = $_FILES["images"]["name"];
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
//end
$date = date("Y-m-d");

//2-la chaine de connexion
include "../../include/functions.php";
$conn = connect();

//3-creation de la requette
$requette = "INSERT INTO produits(nom,details,prix,images,categorie,date_creation) VALUES('$nom','$details','$prix','$image','$categorie','$date')";

//4-execution de la requette
$resultat = $conn->query($requette);


if($resultat){
    $produit_id = $conn->LastInsertId();
    $requette2 = "INSERT INTO stocks(produit,quantité,createur,date_creation) VALUES('$produit_id','$quantité','$createur','$date_creation')";
    if($conn->query($requette2)){
        header('location:liste.php?ajout=ok');
    }else{
        echo "impossible d'ajouter le stock";
    }
    
}
    



?>