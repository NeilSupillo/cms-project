
<?php

class Database
{
    private $host = 'sql110.infinityfree.com';
    private $db_name = 'if0_36888259_cms';
    private $username = 'if0_36888259';
    private $password = 'mtEPVs3nuGb0';
    public $conn;

    public function getConnection()
    {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
