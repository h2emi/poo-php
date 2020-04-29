<?php

namespace App\Models;

class Car
{
    private $id;
    private $brand;
    private $model;
    private $color;
    private $registration;


    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }


    
    public function getBrand()
    {
        return $this->brand;
    }

    public function setBrand($brand)
    {
        $this->brand = $brand;
    }



    public function getModel()
    {
        return $this->model;
    }

    public function setModel($model)
    {
        $this->model = $model;
    }



    public function getColor()
    {
        return $this->color;
    }

    public function setColor($color)
    {
        $this->color = $color;
    }



    public function getRegistration()
    {
        return $this->registration;
    }

    public function setRegistration($registration)
    {
        $this->registration = $registration;
    }
}