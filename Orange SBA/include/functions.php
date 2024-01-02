<?php

function connect() {
    $servername = "localhost";
    $DBuser = "root";
    $DBpassword = "";
    $DBname = "orange_sba";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$DBname", $DBuser, $DBpassword);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn; // Add this line
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        return null; // Return null on failure
    }
}

function getAllCategories() {
    $conn = connect();
    $requete = "SELECT * FROM categories";
    
    try {
        $resultat = $conn->query($requete);
        if ($resultat !== false) {
            $categories = $resultat->fetchAll();
            return $categories;
        } else {
            throw new Exception("Query failed: " . $conn->errorInfo()[2]);
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
        return null;
    }
}

function getAllProduct() {
    $conn = connect();
    $requete = "SELECT * FROM produits";
    
    try {
        $resultat = $conn->query($requete);
        if ($resultat !== false) {
            $produits = $resultat->fetchAll();
            return $produits;
        } else {
            throw new Exception("Query failed: " . $conn->errorInfo()[2]);
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
        return null;
    }
}

function getProduitById($id) {
    $conn = connect();
    $requete = "SELECT * FROM produits WHERE id=$id";

    try {
        $resultat = $conn->query($requete);
        if ($resultat !== false) {
            $produit = $resultat->fetch();
            return $produit;
        } else {
            throw new Exception("Query failed: " . $conn->errorInfo()[2]);
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
        return null;
    }
}

function addVisiteur($data) {
    $conn = connect();
    $requete = "INSERT INTO visiteur(nom,prénom,email,numero,mdp) VALUES('{$data["nom"]}','{$data["prénom"]}','{$data["email"]}','{$data["numero"]}','{$data["mdp"]}')";

    try {
        $resultat = $conn->query($requete);
        if ($resultat) {
            return true;
        } else {
            return false;
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}

function ConnectVisiteur($data){
    $conn = connect();
    $email=$data['email'];
    $mdp=$data['mdp'];


    $requete = "SELECT * FROM visiteur WHERE email ='$email' AND mdp = '$mdp' ";

    $resultat = $conn->query($requete);
    $user = $resultat->fetch();

    return $user;

}
function ConnectAdmin($data){
    $conn = connect();
    $email=$data['email'];
    $mdp=$data['mdp'];


    $requete = "SELECT * FROM administrateur WHERE email ='$email' AND mdp = '$mdp' ";

    $resultat = $conn->query($requete);
    $user = $resultat->fetch();

    return $user;
}

function getAllUsers(){
    $conn = connect();

    $requete = "SELECT * FROM visiteur WHERE etat = 0 ";
    
    $resultat = $conn->query($requete);

    $users = $resultat->fetchAll();

    return $users;
}

function getStocks(){
    $conn = connect();

    $requete = "SELECT p.nom,s.quantité,s.id FROM produits p,stocks s WHERE p.id = s.produit";
    
    $resultat = $conn->query($requete);

    $stocks = $resultat->fetchAll();

    return $stocks;
}

?>
