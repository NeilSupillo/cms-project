<?php
class Post
{
    private $conn;
    private $table_name = "posts";

    public $id;
    public $title;
    public $content;
    public $date;

    public function __construct($db)
    {
        $this->conn = $db;
    }
    public function read()
    {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
}
