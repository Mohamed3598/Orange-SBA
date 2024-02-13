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
function getProductsByCategorie($id) {
    $conn = connect();
    $requete = "SELECT * FROM produits WHERE categorie = $id";
    
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

function getAllPaniers(){
    $conn = connect();

    $requete = "SELECT v.nom, v.prénom, v.numero,p.etat, p.total, p.date_creation, p.id FROM panier p,visiteur v WHERE p.visiteur = v.id ";
    
    $resultat = $conn->query($requete);

    $paniers = $resultat->fetchAll();

    return $paniers;
}

function getAllCommandes(){
    $conn = connect();

    $requete = "SELECT p.nom, p.images, c.quantité, c.total, c.panier FROM commandes c, produits p WHERE c.produit = p.id";
    
    $resultat = $conn->query($requete);

    $commandes = $resultat->fetchAll();

    return $commandes;
}

function changerEtatPanier($data){
    $conn = connect();

    $requete = "UPDATE panier SET etat = '" . $data['etat'] . "' WHERE id = '" . $data['id_panier'] . "'";

    $resultat = $conn->query($requete);

}
function getPanierByEtat($paniers,$etat){

    $panierEtat=array();

    foreach ($paniers as $panier){
        if($panier['etat'] == $etat){
            array_push($panierEtat,$panier);
            
        }
    }
    return $panierEtat;

}

function EditAdmin($data){
    $conn = connect();

    if($data['mdp']!=""){
        $requete = "UPDATE administrateur SET nom = '" . $data['nom'] . "',email = '" . $data['email'] . "',mdp = '" . $data['mdp'] . "' WHERE id = '" . $data['id_amdin'] . "'";
    }else{
        $requete = "UPDATE administrateur SET nom = '" . $data['nom'] . "',email = '" . $data['email'] . "' WHERE id = '" . $data['id_amdin'] . "'";
    }

    $resultat = $conn->query($requete);
    return true;
}

function getData(){
    $data = array();
    $conn = connect();

    //calculer le nombre des produit dans la bd
    $requete = "SELECT COUNT(*) from produits";
    $resultat = $conn->query($requete);
    $nbrPrds = $resultat->fetch();

    //calculer le nombre des categorie dans la bd
    $requete1 = "SELECT COUNT(*) from categories";
    $resultat1 = $conn->query($requete1);
    $nbrCat = $resultat1->fetch();

    //calculer le nombre des visiteur dans la bd
    $requete2 = "SELECT COUNT(*) from visiteur";
    $resultat2 = $conn->query($requete2);
    $nbrClients = $resultat2->fetch();

    $data["produits"] = $nbrPrds[0];
    $data["categories"] = $nbrCat[0];
    $data["clients"] = $nbrClients[0];

    return $data;




}
?>
