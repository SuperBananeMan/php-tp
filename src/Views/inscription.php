<?php
require_once dirname(__DIR__) . '/Views/block/header.php'; ?>

<a href="connexion">Connexion</a>

<form action="?controller=user&action=inscription" method="post">
    <label for="name">Nom :</label>
    <input type="text" id="name" name="name" required>
    <br>
    <label for="email">Email :</label>
    <input type="email" id="email" name="email" required>
    <br>
    <label for="password">Mot de passe :</label>
    <input type="password" id="password" name="password" required>
    <br>
    <input type="submit" value="Inscription">
</form>

<?php require_once dirname(__DIR__) . '/Views/block/footer.php'; ?>
