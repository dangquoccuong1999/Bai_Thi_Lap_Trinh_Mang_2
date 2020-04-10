<?php


class Product
{
    private $id;
    private $name_product;
    private $name_producer;
    private $origin;
    private $description;
    private $img_product;
    public $productDetail;
    
    public function __construct($id, $name_product, $name_producer, $origin, $description, $img_product,$productDetail)
    {
        $this->id = $id;
        $this->name_product = $name_product;
        $this->name_producer = $name_producer;
        $this->origin = $origin;
        $this->description = $description;
        $this->img_product = $img_product;
        $this->productDetail = $productDetail;
    }


    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of name_product
     */
    public function getName_product()
    {
        return $this->name_product;
    }

    /**
     * Get the value of name_producer
     */
    public function getName_producer()
    {
        return $this->name_producer;
    }

    /**
     * Get the value of origin
     */
    public function getOrigin()
    {
        return $this->origin;
    }

    /**
     * Get the value of description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Get the value of img_product
     */
    public function getImg_product()
    {
        return $this->img_product;
    }

    /**
     * Get the value of productDetail
     */ 
    public function getProductDetail()
    {
        return $this->productDetail;
    }
}
