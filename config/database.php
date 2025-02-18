<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'tp_git_php');
define('DB_USER', 'root');
define('DB_PASS', '');

// Connexion à la base de donnée
try {
    $db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}
