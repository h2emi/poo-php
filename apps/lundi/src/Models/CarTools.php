<?php

namespace App\Models;

class CarTools
{
    private $databasetools;

    public function __construct($databasetools)
    {
        $this->databasetools = $databasetools;
    }

    public function hydrateCar($car, $datas)
    {
        $car->setId($datas['veh_id']);
        $car->setBrand($datas['veh_marque']);
        $car->setModel($datas['veh_modele']);
        $car->setColor($datas['veh_couleur']);
        $car->setRegistration($datas['veh_immatriculation']);
        return $car;
    }


    public function getAllCars()
    {
        $results = $this->databasetools->executeQuery("SELECT * FROM Vehicule");
        
        $cars = [];

        foreach ($results as $result) {
            $car = new Car();
            $car = $this->hydrateCar($car, $result);

            array_push($cars, $car);
        }
        return $cars;
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