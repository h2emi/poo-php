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
$dbTools = new DatabaseTools("mysql", "vtc", "root", "root");


/* ligne magique qui affiche les erreurs */
//$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

require './components/head.php';
 require './components/navbar.php';


$request = $_SERVER['REQUEST_URI'];
$uri = parse_url($request, PHP_URL_PATH);

switch ($uri) {
    case '/':
        require __DIR__ . '/pages/homepage.php';
        break;
    case '/conducteurs':
        require __DIR__ . '/pages/conducteurs.php';
        break;

    case '/vehicules':
        require __DIR__ . '/pages/vehicules.php';
        break;
    
    case '/associatif':
        require __DIR__ . '/pages/associatif.php';
        break;
   
        
    default:
        require __DIR__ . '/pages/homepage.php';
        break;
}?>

</div>
</body>

</html>