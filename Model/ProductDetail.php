<?php

class ProductDetail
{
    private $id;
    private $price;
    private $capacity;
    private $quantity_number;
    private $id_product;
    
    public function __construct($id,$price, $capacity, $quantity_number,$id_product)
    {
        $this->id = $id;
        $this->price = $price;
        $this->capacity = $capacity;
        $this->quantity_number = $quantity_number;
        $this->id_product = $id_product;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of price
     */ 
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Get the value of capacity
     */ 
    public function getCapacity()
    {
        return $this->capacity;
    }

    /**
     * Get the value of quantity_number
     */ 
    public function getQuantity_number()
    {
        return $this->quantity_number;
    }

    /**
     * Get the value of id_product
     */ 
    public function getId_product()
    {
        return $this->id_product;
    }
}
