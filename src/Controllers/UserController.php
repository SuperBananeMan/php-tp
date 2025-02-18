<?php

namespace App\Controllers;

use App\Models\User;
use Exception;

class UserController
{
    private $user;

    public function __construct($db) {
        $this->user = new User($db);
    }

    /**
     * Affichage de la page d'accueil
     *
     * @return void
     */
    public function index() {
        require_once __DIR__ . '/../Views/connexion.php';
    }

    /**
     * Fonction pour inscrire un utilisateur
     *
     * @return void
     */
    public function inscription() {
        try {
            $name = $_POST['name'] ?? null;
            $email = $_POST['email'] ?? null;
            $password = $_POST['password'] ?? null;

            if (!$name || !$email || !$password) {
                throw new Exception("Tous les champs sont obligatoires.");
            }

            $this->user->create($name, $email, $password);

            header("Location: /connexion");
            exit();
        } catch (Exception $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }

    /**
     * Fonction pour connecter un utilisateur
     *
     * @return void
     */
    public function connexion() {
        $email = $_POST['email'] ?? null;
        $password = $_POST['password'] ?? null;

        if (!$email || !$password) {
            echo "Erreur : Tous les champs sont obligatoires.";
            return;
        }

        $user = $this->user->findByEmail($email);

        if ($user && password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['user'] = $user;
            header('Location: /home');
            exit();
        }
        echo "Erreur : Email ou mot de passe incorrect.";
    }
}
