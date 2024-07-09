<?php
class Post
{
    private $conn;
    private $table_name = "posts";

    public $id;
    public $title;
    public $content;
    public $date;
    public $summary;

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
    public function delete()
    {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $this->id);

        if ($stmt->execute()) {
            echo $stmt->execute();
            return true;
        }
        return false;
    }
    public function create()
    {
        $query = "INSERT INTO " . $this->table_name . " SET title=:title, content=:content, summary=:summary, date=:date";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":title", $this->title);
        $stmt->bindParam(":content", $this->content);
        $stmt->bindParam(":summary", $this->summary);
        $stmt->bindParam(":date", $this->date);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
    public function readOne()
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        return $stmt;
    }
    public function update()
    {
        $query = "UPDATE " . $this->table_name . " SET title=:title, content=:content, summary=:summary, date=:date WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":title", $this->title);
        $stmt->bindParam(":content", $this->content);
        $stmt->bindParam(":summary", $this->summary);
        $stmt->bindParam(":date", $this->date);
        $stmt->bindParam(":id", $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
