<?php

// démarrage d'une nouvelle session ou restauration d'une session existante (permet l'accès à la superglobale $_SESSION)
session_start();

// chargement de l'autoloader
require_once './autoloader.php';

// Ajout des routes depuis le Router
if (isset($_GET['p']))
    $router = new Router($_GET['p']);

// route accueil gérée dans le Router

// routes utilisateur
$router->addRoute('user-register', ['UserController', 'register']);
$router->addRoute('update-profile', ['UserController', 'update']);
$router->addRoute('delete-profile', ['UserController', 'delete']);
$router->addRoute('login', ['AuthController', 'login']);
$router->addRoute('logout', ['AuthController', 'logout']);

// routes films
$router->addRoute('movie-register', ['MovieController', 'movieRegister']);
$router->addRoute('more-details', ['MovieController', 'moreDetails']);
$router->addRoute('my-movies', ['MovieController', 'displayCollection']);
$router->addRoute('search-movie', ['MovieController', 'displaySearchMovie']);
$router->addRoute('^recent-movies\/?(?P<page>[0-9]+)?$', ['MovieController', 'displayRecentMovies']);
$router->addRoute('^popular-movies\/?(?P<page>[0-9]+)?$', ['MovieController', 'displayPopularMovies']);
$router->addRoute('^upcoming-movies\/?(?P<page>[0-9]+)?$', ['MovieController', 'displayUpcomingMovies']);
$router->addRoute('delete-movie', ['MovieController', 'deleteMovie']);

$router->resolve();
