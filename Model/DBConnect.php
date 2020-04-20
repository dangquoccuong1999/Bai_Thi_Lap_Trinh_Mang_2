<?php


class DBConnect
{
    public $user;
    public $pass;
    public $link;
    public $options = array(
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    );

    public function __construct()
    {
        $this->user = 'root';
        $this->pass = '';
        $this->link = "mysql:host=localhost;dbname=shop_dang_cuong_authentic";
    }

    public function connect()
    {
        try{
            $conn = new PDO($this->link,$this->user,$this->pass, $this->options);

        }catch (PDOException $e){
            return $e->getMessage();
        }
        return $conn;
    }
}