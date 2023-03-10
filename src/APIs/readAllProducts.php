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

if($_SERVER['REQUEST_METHOD'] == 'GET') {
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
    // NOTE
    // RENVOIE 1 ERREUR A CAUSE DES Headers
    // qui déclarent recevoir un JSON. Les Headers
    // essayent d'afficher en format json
    // print_r($produit);

    // On récupère les données
    $productsArray = $produit->getAllProducts();
    
    // NOTE
    // RENVOIE 1 ERREUR A CAUSE DES Headers
    // qui déclarent recevoir un JSON. Les Headers
    // essayent d'afficher en format json
    // var_dump($stmt);

    // On vérifie si on a au moins 1 produit
    if(count($productsArray) > 0) {

        echo json_encode($productsArray);

        // On envoie le code réponse 200 OK
        http_response_code(200);
    }


} else {
    // Mauvaise méthode, on gère l'erreur
    http_response_code(405);
    echo json_encode(["message" => "La méthode n'est pas autorisée"]);
}

?>
