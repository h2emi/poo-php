<?php

namespace App\Models;

class CategoryTools
{
    private $databasetools;

    public function __construct($databasetools)
    {
        $this->databasetools = $databasetools;
    }

    public function hydrateCategory($category, $datas)
    {
        $category->setId($datas['cat_id']);
        $category->setName($datas['cat_name']);
       
        return $category;
    }
}