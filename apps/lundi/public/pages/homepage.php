<?php
use App\Models\Plant;
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

        <form action="" method="post" class="row mt-4">
            <input type="text" name="parCategorie" class="col-4 form-control">
            <input type="submit" class="btn btn-primary" value="Trier">
        </form>
        <?php
         
        if ($_POST['parCategorie']) {
            $plants = $plantTools->selectByCategoryName();
            $tools->prettyVarDump($plants);
        }?>


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