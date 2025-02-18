<?php

require_once dirname(__DIR__) . '/Views/block/header.php'; ?>

<h1>Voir toutes mes tâches</h1>

<?php if (isset($taches) && count($taches) > 0) : ?>
    <ul>
        <?php foreach ($taches as $tache) : ?>
            <li>
                <a href="taches/<?= $tache->getId() ?>"><?= $tache->getName() ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else : ?>
    <p>Aucune tâche pour le moment</p>
<?php endif; ?>

<?php require_once dirname(__DIR__) . '/Views/block/footer.php'; ?>
