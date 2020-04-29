<?php

namespace App\Models;

class AssociationTools
{
    private $databasetools;
    private $driverTools;
    private $carTools;

    public function __construct($databasetools)
    {
        $this->databasetools = $databasetools;
        $this->driverTools = new DriverTools($databaseTools);
        $this->carTools = new CarTools($databaseTools);
    }


    public function hydrateAssociation($association, $datas)
    {
        $association->setId($datas['asso_id']);
        
        return $association;
    }


    public function getAllAssociations()
    {
        $results = $this->databasetools->executeQuery('SELECT asso_id , asso_id_conducteur , con_prenom , con_nom , asso_id_vehicule, veh_marque , veh_modele FROM Association_vehicule_conducteur
        INNER JOIN Vehicule ON asso_id_vehicule = veh_id
        INNER JOIN Conducteur ON asso_id_conducteur = con_id');
        
        $associations = [];

        foreach ($results as $result) {
            $association = new Association();
            $association = $this->hydrateAssociation($association, $result);

            $driver = new Driver();
            $driver = $this->driverTools->hydrateDriver($driver, $result);

            $association->setId_conduteur($driver);

            $car = new Car();
            $car = $this->carTools->hydrateCar($car, $result);

            $association->setId_vehicule($datas['asso_id_vehicule']);


            array_push($associations, $association);
        }
        return $associations;
    }


    public function addNewCar($brand, $model, $color, $registration)
    {
        $re = $this->databasetools->executePrepare("INSERT INTO Vehicule (veh_marque , veh_modele , veh_couleur , veh_immatriculation ) 
        VALUES (:brand , :model , :color , :registration )");
        $re->bindParam(':brand', $brand);
        $re->bindParam(':model', $model);
        $re->bindParam(':color', $color);
        $re->bindParam(':registration', $registration);

        $re->execute();
    }
}