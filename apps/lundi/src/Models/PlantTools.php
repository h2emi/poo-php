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
        WHERE cat_name LIKE '%" .  $_POST['parCategorie'] . "%'");

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


    public function addNewPlant($name, $price, $category)
    {
        /* $params = [
            ["paramKey" => ":name", "paramValue" => $plant->getName()],
            ["paramKey" => ":price", "paramValue" => $plant->getPrice()],
            ["paramKey" => ":category", "paramValue" => $plant->getCategory()->getId()]
        ]; */
        
        $re = $this->databasetools->executePrepare("INSERT INTO Plante (plant_name , plant_price , plant_category) VALUES (:name , :price , :category)");
        $re->bindParam(':name', $name);
        $re->bindParam(':price', $price);
        $re->bindParam(':category', $category);

        $re->execute();
        
        //$stmt->execute(array("name"=>$name , "price"=>$price ,"category"=>$category));
    }
}