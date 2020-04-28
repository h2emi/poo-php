 <?php

use App\Tools\DevTools;
use App\Tools\LibsLoader;
use App\Tools\DatabaseTools;

use App\Models\Plant;
use App\Models\PlantTools;
use App\Models\CategoryTools;

$loader = require '../vendor/autoload.php';

//instancier et appeller les librairies externes
$libsLoader = new LibsLoader();
$libsLoader->loadLibrairies();
//instancier un devTool
$tools = new DevTools();
//instancier un tool pour pouvoir utiliser la BDD
$dbTools = new DatabaseTools("mysql", "poo", "root", "root");

//instancier un tool qui fera référence à un model
$plantTools = new PlantTools($dbTools);
$categoryTools = new CategoryTools($dbTools);

?>


 <!doctype html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport"
         content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
         integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
     <title>Document</title>
 </head>

 <body>
     <div class="container">

         <h4>Liste des plantes</h4>
         <table class="table">
             <thead class="thead-dark">
                 <tr>
                     <th scope="col">Nom</th>
                     <th scope="col">Categorie</th>
                     <th scope="col">Price</th>
                 </tr>
             </thead>
             <tbody>
                 <?php
                 $plants = $plantTools->getAllPlants();
                 
    foreach ($plants as $plant) {?>
                 <tr>
                     <td><?= $plant->getName() ?></td>
                     <td><?php echo $plant->getCategory()->getName() ?></td>
                     <td><?= $plant->getPrice() ?>€</td>

                 </tr>
                 <?php }?>
             </tbody>
         </table>




     </div>
 </body>

 </html>