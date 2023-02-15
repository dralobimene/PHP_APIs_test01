<?php

/**
 * Fichier pr utiliser l'API
 * Définir les entetes HTTP necessaires
 * au bon fonctionnement de l'API
 */

/**
 *
 */

// Headers requis
// Accès depuis n'importe quel site ou appareil (*)
header("Access-Control-Allow-Origin: *");

// Format des données envoyées
header("Content-Type: application/json; charset=UTF-8");

// Méthode autorisée
header("Access-Control-Allow-Methods: GET");

// Durée de vie de la requête
header("Access-Control-Max-Age: 3600");

// Entêtes autorisées
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


/**
 * Verif de la methode utilisée.
 * on recupere pr affichage, c'est dc la methode GET de l'appareil
 * que l'on va utiliser. Si l'utilisateur utilise 1 autre methode
 * on interdit
 */

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    // La bonne méthode est utilisée
    // on va instancier la DB et l'objet Produits
    // On inclut les fichiers de configuration et d'accès aux données
    require_once ('../../classes/UtilsDb.php');
    require_once ('../../classes/Produits.php');
    require_once ('../../DAO/produits.php');

    // On instancie la base de données
    $database = new UtilsDB();
    $db = $database->getConnection();

    //
    $produit = new produit();
    // print_r($produit);

    // On récupère les données
    $stmt = $produit->getAllProducts();
     
    // On vérifie si on a au moins 1 produit
    // if($stmt->rowCount() > 0) {
    if(count($stmt) > 0) {
        echo json_encode($stmt);
               
        // On envoie le code réponse 200 OK
        http_response_code(200);
    }
    

} else {
    // Mauvaise méthode, on gère l'erreur
    http_response_code(405);
    echo json_encode(["message" => "La méthode n'est pas autorisée"]);
}

?>
