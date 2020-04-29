<?php
use App\Models\Car;
use App\Models\CarTools;

//instancier un tool qui fera référence au model driver
$carTools = new CarTools($dbTools);

$cars = $carTools -> getAllCars();

if (!empty($_POST)) {
    $carTools->addNewCar($_POST['brand'], $_POST['model'], $_POST['color'], $_POST['registration']);
}?>



<h5 class="mt-4">Ajouter un véhicule</h5>
<form action="" method="post" class="">
    <input type="text" name="brand" class=" form-control" placeholder="marque">
    <input type="text" name="model" class="mt-2 form-control" placeholder="modele">
    <input type="text" name="color" class="mt-2 form-control" placeholder="couleur">
    <input type="text" name="registration" class="mt-2 form-control" placeholder="immatriculation">
    <input type="submit" class="mt-2 btn btn-primary" value="Ajouter véhicule">
</form>


<h5 class="mt-4">Liste des véhicules</h5>
<table class="table table-dark">
    <thead class="thead-dark">

        <tr>
            <th scope="col">id</th>
            <th scope="col">marque</th>
            <th scope="col">modele</th>
            <th scope="col">couleur</th>
            <th scope="col">immatriculation</th>

            <th scope="col">modification</th>
            <th scope="col">suppression</th>
        </tr>
    </thead>
    <tbody>
        <?php
                 
    foreach ($cars as $car) {?>
        <tr>
            <td><?php echo $car->getId()?></td>
            <td><?php echo $car->getBrand()?></td>
            <td><?php echo $car->getModel()?></td>
            <td><?php echo $car->getColor()?></td>
            <td><?php echo $car->getRegistration()?></td>
            <td> <a href="#"> modifier</a> </td>
            <td><a href="#"> supprimer </a></td>
        </tr>
        <?php }?>
    </tbody>
</table>