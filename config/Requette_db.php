<?php
/**
 * Created by PhpStorm.
 * User: oumar_sow
 * Date: 18/10/18
 * Time: 16:24
 */


 function affichage_film()
 {
     $host = 'mysql:dbname=annuaire_db;charset=utf8;host=127.0.0.1';
     $user = 'root';
     $password = 'oumarsow';
     try {
         $pdo = new PDO($host, $user, $password);
         // echo "La connexion à la base est ok";
     } catch (PDOException $e) {
         echo 'Connexion échouée : ' . $e->getMessage();
     }
     $affichage = $pdo->query('SELECT *,SUBSTRING(description,1,10) FROM films ');
     return $affichage;
 }
function affichage_details()
{
    $host = 'mysql:dbname=annuaire_db;charset=utf8;host=127.0.0.1';
    $user = 'root';
    $password = 'oumarsow';
    try {
        $pdo = new PDO($host, $user, $password);
        // echo "La connexion à la base est ok";
    } catch (PDOException $e) {
        echo 'Connexion échouée : ' . $e->getMessage();
    }
    $affichage = $pdo->query('SELECT * FROM films ');
    return $affichage;
}