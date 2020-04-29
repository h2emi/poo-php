<?php
use App\Models\Plant;
use App\Models\PlantTools;
use App\Models\CategoryTools;

//instancier un tool qui fera référence à un model
$plantTools = new PlantTools($dbTools);
$categoryTools = new CategoryTools($dbTools);


//trier par catégorie
if ($_POST['parCategorie']) {
    $plants = $plantTools->selectByCategoryName();
//$tools->prettyVarDump($plants);
} else {
    $plants = $plantTools->getAllPlants();
}

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
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="http://localhost:9090/">Home</a>


            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost:9090/new">Ajouter</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href=""></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href=""></a>
                    </li>
                </ul>
            </div>
        </nav>

        <form action="" method="post" class="row mt-4">
            <input type="text" name="parCategorie" class="col-4 form-control">
            <input type="submit" class="btn btn-primary" value="Trier">
        </form>
        <a href="http://localhost:9090/">Reset</a>




        <h4 class="mt-4">Liste des plantes</h4>
        <!-- liste de mes plantes -->
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