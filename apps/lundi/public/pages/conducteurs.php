<?php
use App\Models\Driver;
use App\Models\DriverTools;

//instancier un tool qui fera référence au model driver
$driverTools = new DriverTools($dbTools);


$drivers = $driverTools -> getAllDrivers();

if (!empty($_POST)) {
    $driverTools->addNewDriver($_POST['name'], $_POST['firstname']);
}?>


<h5 class="mt-4">Ajouter un conducteur ou une conductrice</h5>
<form action="" method="post" class="">
    <input type="text" name="name" class=" form-control" placeholder="nom">
    <input type="text" name="firstname" class="mt-2 form-control" placeholder="prénom">
    <input type="submit" class="mt-2 btn btn-primary" value="Ajouter">
</form>


<h5 class="mt-4">Liste des conducteurs et conductrices</h5>
<table class="table table-dark">
    <thead class="thead-dark">

        <tr>
            <th scope="col">id</th>
            <th scope="col">Nom</th>
            <th scope="col">Prénom</th>
            <th scope="col">modification</th>
            <th scope="col">suppression</th>
        </tr>
    </thead>
    <tbody>
        <?php
                 
    foreach ($drivers as $driver) {?>
        <tr>
            <td><?php echo $driver->getId()?></td>
            <td><?php echo $driver->getName()?></td>
            <td><?php echo $driver->getFirstName()?></td>
            <td> <a href="#"> modifier</a> </td>
            <td><a href="#"> supprimer </a></td>

        </tr>
        <?php }?>
    </tbody>
</table>

<p>Nombre de conducteur : non achevé (commentaires) <?php
        /* echo "$driverTools->showNbDrivers()";
        $tools->prettyVarDump($driverTools->showNbDrivers()) */
        ?> </p>