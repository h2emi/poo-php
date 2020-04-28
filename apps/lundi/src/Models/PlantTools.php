<?php

namespace App\Models;

class PlantTools
{
    private $databasetools;
    private $categoryTools;

    public function __construct($databasetools)
    {
        $this->databasetools = $databasetools;
        $this->categoryTools = new CategoryTools($databaseTools);
    }

    public function hydratePlant($plant, $datas)
    {
        $plant->setId($datas['plant_id']);
        $plant->setName($datas['plant_name']);
        $plant->setPrice($datas['plant_price']);
        $plant->setCategory($datas['plant_category']);
        return $plant;
    }


    public function getAllPlants()
    {
        $results = $this->databasetools->executeQuery('SELECT * FROM Plante INNER JOIN Category ON plant_category = cat_id');
        
        $plants = [];
        foreach ($results as $result) {
            $plant = new Plant();
            $plant = $this->hydratePlant($plant, $result);

            $category = new Category();
            $category = $this->categoryTools->hydrateCategory($category, $result);
            
            $plant->setCategory($category);

            array_push($plants, $plant);
        }
        return $plants;
    }


    public function selectByCategoryName()
    {
        $results = $this->databasetools->executeQuery("SELECT * FROM Plante INNER JOIN Category ON plant_category = cat_id
        WHERE plant_name LIKE '%" .  $_POST['parCategorie'] . "%'");

        $plants = [];
        foreach ($results as $result) {
            $plant = new Plant();
            $plant = $this->hydratePlant($plant, $result);

            $category = new Category();
            $category = $this->categoryTools->hydrateCategory($category, $result);
    
            $plant->setCategory($category);

            array_push($plants, $plant);
        }
        return $plants;
    }
}