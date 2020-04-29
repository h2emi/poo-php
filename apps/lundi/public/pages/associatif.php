<?php
use App\Models\Association;
use App\Models\AssociationTools;
use App\Models\CarTools;
use App\Models\DriverTools;

//instancier un tool qui fera référence au model driver
$associationTools = new AssociationTools($dbTools);

$associations = $associationTools -> getAllAssociations();

?>


<h5 class="mt-4">Ajouter une association : non achevé</h5>
<!-- <form action="" method="post" class="">
        
            <input type="submit" class="mt-2 btn btn-primary" value="Ajouter véhicule">
        </form> -->


<h5 class="mt-4">Liste des associations</h5>
<table class="table ">
    <thead class="thead-dark">

        <tr>
            <th scope="col">id</th>
            <th scope="col">conduteur</th>
            <th scope="col">vehicule</th>
            <th scope="col">modification</th>
            <th scope="col">suppression</th>
        </tr>
    </thead>
    <tbody>
        <?php
                 
                 
    foreach ($associations as $association) {?>
        <tr>
            <td><?= $association->getId() ?></td>

            <td><?php echo $association->getId_conduteur()->getName() . " " .
                    $association->getId_conduteur()->getFirstName();
                    //$tools->prettyVarDump($association->getId_conduteur()->getName())
                    ?>
            </td>


            <td><?php //echo $association->getId_vehicule()->getBrand() . " " . $association->getId_vehicule()->getModel();
                    $tools->prettyVarDump($association->getId_vehicule())
                    ?></td>

            <td> <a href="#">modifier</a> </td>
            <td><a href="#">supprimer </a></td>

        </tr>
        <?php }?>
    </tbody>