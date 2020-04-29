<?php
use App\Tools\DevTools;
use App\Tools\LibsLoader;
use App\Tools\DatabaseTools;

$loader = require '../vendor/autoload.php';

//instancier et appeller les librairies externes
$libsLoader = new LibsLoader();
$libsLoader->loadLibrairies();

//instancier un devTools
$tools = new DevTools();

//instancier un tool pour pouvoir utiliser la BDD (params : credentials pour la BDD)
$dbTools = new DatabaseTools("mysql", "poo", "root", "root");


/* ligne magique qui affiche les erreurs */
//$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$request = $_SERVER['REQUEST_URI'];
$uri = parse_url($request, PHP_URL_PATH);

switch ($uri) {
    case '/':
        require __DIR__ . '/pages/homepage.php';
        break;
    case '/new':
        require __DIR__ . '/pages/new.php';
        break;
   
    default:
        require __DIR__ . '/pages/homepage.php';
        break;
}