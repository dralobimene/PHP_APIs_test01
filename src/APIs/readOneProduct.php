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

    // on instancie la classe produit
    // définie ds le fichier produits.php
    // (JE NOTE car là c'est clairement de la mvaise
    // pratique -> erreur de ma part)
    $produit = new produit();

    // On vérifie si le produit existe
    if($produit != null){

        /*
         * Puisque le produit existe, on récupere son id
         * depuis la barre d'adresse, on appele ca 1 query param
         * et on affiche les propriétes en format json
         */
        $product = $produit->getOneProduct($_GET['id']);

        // Affichage de l'objet en format json
        echo json_encode($product);
    } else {
        echo json_encode(array("message" => "Le produit n'existe pas."));
    }


}
