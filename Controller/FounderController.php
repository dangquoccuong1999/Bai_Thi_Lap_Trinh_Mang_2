<?php

include_once 'Model/DBConnect.php';
include_once 'Model/FounderDB.php';
include_once 'Model/Founder.php';


class FounderController
{
    public $founderDB;

    public function __construct()
    {
        $founderDB = new FounderDB();
        $this->founderDB = $founderDB;
    }

    public function getAllFounders()
    {
        $founders = $this->founderDB->getAllFounders();
        return $founders;
    }
}
