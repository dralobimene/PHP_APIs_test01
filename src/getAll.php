
<?php
// require_once('../classes/Produits.php');
require_once(__DIR__ . '/../classes/Produits.php');
// require_once('../classes/UtilsDb.php');
require_once(__DIR__ . '/../classes/UtilsDb.php');
// require_once('../DAO/produits.php');
require_once(__DIR__ . '/../DAO/produits.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>getAll</title>
</head>
<body>
    <h1>test29_API01_PHP, getAll</h1>

<br>
page pr lister ts les ergts
<br>

<?php

// intance de la classe du pattern dao
// fichier produits.php
$dao = new produit();

// utilise l'instance ci-dessus
// pr appeller la methode getAllProducts
// de la class DAO produits.php
$products = $dao->getAllProducts();

// boucle pr afficher ts les ergts, colonne nom
foreach ($products as $product) {
    // Do something with each product, for example print its name
    echo $product->getNom() . "<br>";
}

?>
</body>
</html>
