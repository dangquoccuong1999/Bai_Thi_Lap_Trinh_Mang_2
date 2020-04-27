<?php


include_once 'DBConnect.php';
include_once 'Founder.php';

class FounderDB
{
    public $conn;

    public function __construct()
    {
        $conn = new DBConnect();
        $this->conn = $conn->connect();
    }

    public function getAllFounders()
    {
        $sql = "SELECT * FROM `founder`";
        $stmt = $this->conn->query($sql);
        $dataFounder = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $arr = [];
        
        foreach ($dataFounder as $value) {
            $founder = new Founder($value['id'],$value['name_founder'],$value['age'],$value['description'],$value['img']);
            array_push($arr, $founder);
        }
        return $arr;
    }
}
