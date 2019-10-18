<?php


class Database
{
    private $servername = "localhost";
    private $username = "root";

    private $password = "password123456";
    private $dbname = "store";

    function connect()
    {
        try {
            $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
             $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//            return "Connect Database";
            return $conn;

        } catch (PDOException $e) {
            echo $e->getMessage();

        }

    }

}

//$check=new Database();
//$check->connect();