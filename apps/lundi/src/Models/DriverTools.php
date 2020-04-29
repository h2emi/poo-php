<?php

namespace App\Models;

class DriverTools
{
    private $databasetools;
    

    public function __construct($databasetools)
    {
        $this->databasetools = $databasetools;
    }

    public function hydrateDriver($driver, $datas)
    {
        $driver->setId($datas['con_id']);
        $driver->setFirstName($datas['con_prenom']);
        $driver->setName($datas['con_nom']);
        return $driver;
    }


    public function getAllDrivers()
    {
        $results = $this->databasetools->executeQuery("SELECT * FROM Conducteur");
        
        $drivers = [];

        foreach ($results as $result) {
            $driver = new Driver();
            $driver = $this->hydrateDriver($driver, $result);

            array_push($drivers, $driver);
        }
        return $drivers;
    }


    public function addNewDriver($name, $firstname)
    {
        $re = $this->databasetools->executePrepare("INSERT INTO Conducteur (con_prenom , con_nom) VALUES (:firstname , :name)");
        $re->bindParam(':firstname', $firstname);
        $re->bindParam(':name', $name);
        
        $re->execute();
    }


    public function showNbDrivers()
    {
        $number = $this->databasetools->numberQuery("SELECT COUNT(*) FROM Conducteur");
    }
}