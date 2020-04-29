<?php
use App\Models\Plant;
use App\Models\Category;
use App\Models\PlantTools;
use App\Models\CategoryTools;

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

        <?php
         
         if (!empty($_POST)) {
             /* $plant = new Plant;
             $plant ->setName($_POST['name']);
             $plant ->setPrice($_POST['price']);

             $category = new Category;
             $category->setName($_POST['category']);
             //$category->setId($_POST['categoryId']);
             $plant->setCategory($category); */
             
             $plantTools->addNewPlant($_POST['name'], $_POST['price'], $_POST['category']);
             $tools->prettyVarDump($_POST);
         }?>

        <h4>Ajouter une plante</h4>
        <form action="" method="post" class="row mt-4">
            <input type="text" name="name" class="col-4 form-control" placeholder="nom">
            <input type="number" name="price" class="col-4 form-control" placeholder="prix">

            <input type="text" name="category" class="col-4 form-control" placeholder="categorie">
            <input type="submit" class="btn btn-primary" value="Ajouter">
        </form>




    </div>
</body>

</html>