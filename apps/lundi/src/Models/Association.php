<?php

namespace App\Models;

class Association
{
    private $id;
    private $id_vehicule;
    private $id_conduteur;
  


    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }


    
    public function getId_vehicule()
    {
        return $this->id_vehicule;
    }

    public function setId_vehicule($id_vehicule)
    {
        $this->id_vehicule = $id_vehicule;
    }



    public function getId_conduteur()
    {
        return $this->id_conduteur;
    }

    public function setId_conduteur($id_conduteur)
    {
        $this->id_conduteur = $id_conduteur;
    }
}