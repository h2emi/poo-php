<?php

namespace App\Models;

class Driver
{
    private $id;
    private $name;
    private $firstname;


    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setFirstName($firstname)
    {
        $this->firstName = $firstname;
    }
}