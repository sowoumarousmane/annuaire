<?php
$host = 'mysql:dbname=annuaire_db;host=127.0.0.1';
//charset=utf8;
$user = 'root';
$password = 'oumarsow';
try {
    $pdo = new PDO($host, $user, $password);
   // echo "La connexion à la base est ok";
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}
?>