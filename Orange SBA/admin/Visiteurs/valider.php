<?php

$idvisiteur = $_GET['id'];
  
//1-la chaine de connexion
include "../../include/functions.php";
$conn = connect();

$requette = "UPDATE visiteur SET etat=1 WHERE id = '$idvisiteur'";

$result = $conn->query($requette);

if($result){
    header('location:liste.php?valider=ok');
}else{
    echo "Erreur de validation";
}



?>