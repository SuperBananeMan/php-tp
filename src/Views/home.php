<?php

if (!isset($_SESSION['user'])) {
    header('Location: connexion');
}

require_once dirname(__DIR__) . '/Views/block/header.php'; ?>

<h1>Bienvenue</h1>

<h2>Vous êtes connecté en tant que <?= $_SESSION['user']->getName() ?></h2>

<a href="taches">Voir toutes les tâches</a>
<a href="taches/create">Créer une tâche</a>

<?php require_once dirname(__DIR__) . '/Views/block/footer.php'; ?>
