<?php

require_once dirname(__DIR__).'/vendor/autoload.php';
require_once dirname(__DIR__).'/config/database.php';

use App\router;
use App\Controllers\UserController;

// Ajout des routes
$router = new router();

$router->addRoute('GET', '/', function() use ($db) {
    header('Location: /connexion');
});

$router->addRoute('GET', '/connexion', function() use ($db) {
    require_once __DIR__ . '/../src/Views/connexion.php';
});

$router->addRoute('GET', '/inscription', function() use ($db) {
    require_once __DIR__ . '/../src/Views/inscription.php';
});

$router->addRoute('GET', '/home', function() use ($db) {
    require_once __DIR__ . '/../src/Views/home.php';
});

$router->addRoute('GET', '/taches', function() use ($db) {
    $userController = new UserController($db);
    $userController->inscription();
});

$router->addRoute('GET', '/taches/create', function() use ($db) {
    $userController = new UserController($db);
    $userController->connexion();
});


// Dispatch de l'URL actuelle
$method = $_SERVER['REQUEST_METHOD'];
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$router->dispatchURL($method, $uri);

// Routage basique
if (isset($_GET['controller'])) {
    $controller = $_GET['controller'];
} else {
    $controller = 'user';
}

if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'index';
}

switch ($controller) {
    case 'user':
        $userController = new UserController($db);
        switch ($action) {
            case 'index':
                break;
            case 'inscription':
                $userController->inscription();
                break;
            case 'connexion':
                $userController->connexion();
                break;
            default:
                echo '404';
        }
        break;
    default:
        echo '404';
}
