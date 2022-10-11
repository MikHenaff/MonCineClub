<?php

spl_autoload_register(function ($class)
{ 
    // stockage des chemins dans des variables afin de pouvoir vérifier que les fichiers autoloadés existent bien
    $pathControllers = './src/Controllers/' . $class . '.php';
    $pathClasses = './src/Classes/' . $class . '.php';
    $pathModels = './src/Models/' . $class . '.php';
    $pathServices = './src/Services/' . $class . '.php';

    
    if (file_exists($pathControllers)) {
        require_once $pathControllers;
    } else if (file_exists($pathClasses)) {
        require_once $pathClasses;
    } else if (file_exists($pathModels )) {
        require_once $pathModels ;
    } else if (file_exists($pathServices )) {
        require_once $pathServices ;
    }
    
});