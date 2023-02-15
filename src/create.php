<?php
// require_once('../classes/Produits.php');
require_once(__DIR__ . '/../classes/Produits.php');
// require_once('../classes/UtilsDb.bhp');
require_once(__DIR__ . '/../classes/UtilsDb.php');
// require_once('../DAO/produits.php');
require_once(__DIR__ . '/../DAO/produits.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>create</title>
</head>
<body>
    <h1>test29_API01_PHP, create</h1>

<br>
page pr creer 1 ergt
<br>

<?php

// instanciation en dur de la classe Produits
$produit = new Produits();
$produit->setNom("nomProduit02");
$produit->setDescription("descriptionProduit02");
$produit->setPrix(0);
$produit->setCategoriesId(2);
$produit->setCreatedAt(new DateTime());
$produit->setUpdatedAt(new DateTime());

// instanciation de la classe DAO pattern
// produit.php
$dao = new produit();

// appel de la methode de la class DAO pattern
// produits.php
// NOTE:
// produits.php est le nom du fichier
// produit est le nom de la classe
$dao->insertProduct($produit);

?>
</body>
</html>
