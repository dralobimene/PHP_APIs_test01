<?php

// require_once('UtilsDb.php');
require_once(__DIR__ . '/UtilsDb.php');

class Produits{

    // pr la connexion

    //    
    private $pdo;

    // table ds la db
    private $table = "produits";

    // Propriétés
    public int $id;
    public string $nom;
    public string $description;
    public int $prix;
    public int $categories_id;
    public string $categories_nom;
    public DateTime $created_at;
    public DateTime $updated_at;

    /**
     * Constructeur qui utilise la class UtilsDB
     * pr ..?
     */
    public function __construct(){
        $utilsDb = new UtilsDB();
        $this->pdo = $utilsDb->getConnection();
    }

    // les getters / setters

    // Getters and setters for id
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    // Getters and setters for nom
    public function getNom() {
        return $this->nom;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    // Getters and setters for description
    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    // Getters and setters for prix
    public function getPrix() {
        return $this->prix;
    }

    public function setPrix($prix) {
        $this->prix = $prix;
    }

    // Getters and setters for categories_id
    public function getCategoriesId() {
        return $this->categories_id;
    }

    public function setCategoriesId($categories_id) {
        $this->categories_id = $categories_id;
    }

    // Getters and setters for categories_nom
    public function getCategoriesNom() {
        return $this->categories_nom;
    }

    public function setCategoriesNom($categories_nom) {
        $this->categories_nom = $categories_nom;
    }

    // Getters and setters for created_at
    public function getCreatedAt() {
        return $this->created_at;
    }

    public function setCreatedAt($created_at) {
        $this->created_at = $created_at;
    }
    
    // Getters and setters for updated_at
    public function getUpdatedAt() {
        return $this->updated_at;
    }

    public function setUpdatedAt($updated_at) {
        $this->updated_at = $updated_at;
    }

}
