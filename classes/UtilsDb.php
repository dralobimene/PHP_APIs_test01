<?php

/**
 * classe pr obtenir la connex° à la DB
 * utilise 1 objet PDO
 * et gère les exceptions?
 */
class UtilsDB {

    // les attributs pr la connex°
    private $host = "localhost";
    private $dbname = "api_rest02_PHP_test29";
    private $username = "root";
    private $password = "rootmdp";

    //
    public function getConnection(){
        try {
            $pdo = new PDO("mysql:host=$this->host;dbname=$this->dbname",
                                $this->username,
                                $this->password);
            // Set additional options if needed, such as error reporting mode
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // Handle any errors that might occur during the connection attempt
            echo "Error connecting to database: " . $e->getMessage();
        }

        return $pdo;

    }
}
