
<?php

class Database
{
    // private $host = 'sql110.infinityfree.com';
    // private $db_name = 'if0_36888259_cms';
    // private $username = 'if0_36888259';
    // private $password = 'mtEPVs3nuGb0';

    // private $host = 'localhost';
    // private $db_name = 'cms';
    // private $username = 'root';
    // private $password = '';
    public $conn;

    public function getConnection($value)
    {


        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $value['host'] . ";dbname=" . $value['dbname'], $value['username'], $value['password']);
            $this->conn->exec("set names utf8");
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
