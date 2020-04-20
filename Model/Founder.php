<?php

class Founder
{
    private $id;
    private $name_founder;
    private $age;
    private $description;
    private $img;

    public function __construct($id, $name_founder, $age, $description, $img)
    {
        $this->id = $id;
        $this->name_founder = $name_founder;
        $this->age = $age;
        $this->description = $description;
        $this->img = $img;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of name_founder
     */ 
    public function getName_founder()
    {
        return $this->name_founder;
    }

    /**
     * Get the value of age
     */ 
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Get the value of img
     */ 
    public function getImg()
    {
        return $this->img;
    }
}
