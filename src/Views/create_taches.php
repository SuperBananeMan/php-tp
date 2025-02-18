<?php

require_once dirname(__DIR__) . '/Views/block/header.php'; ?>

<h1>Créer une tâche</h1>

<form action="?controller=taches&action=create" method="post">
    <label for="name">Nom :</label>
    <input type="text" id="name" name="name" required>
    <br>
    <label for="description">Description :</label>
    <input type="text" id="description" name="description" required>
    <br>
    <label for="date">Date :</label>
    <input type="date" id="date" name="date" required>
    <br>
    <input type="submit" value="Créer">
</form>

<?php require_once dirname(__DIR__) . '/Views/block/footer.php'; ?>
