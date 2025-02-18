<?php
require_once dirname(__DIR__) . '/Views/block/header.php'; ?>

<a href="inscription">Inscription</a>

<form action="?controller=user&action=connexion" method="post">
    <label for="email">Email :</label>
    <input type="email" id="email" name="email" required>
    <br>
    <label for="password">Mot de passe :</label>
    <input type="password" id="password" name="password" required>
    <br>
    <input type="submit" value="Connexion">
</form>

<?php require_once dirname(__DIR__) . '/Views/block/footer.php'; ?>
