<?php
require_once __DIR__ . '/../../config/Database.php';
require_once __DIR__ . '/../models/AdminModel.php';
class AdminCon
{
    private $db;
    private $post;

    public function __construct($value)
    {
        $database = new Database();
        $this->db = $database->getConnection($value);
        $this->post = new AdminModel($this->db);
    }
    public function getAll()
    {
        $stmt = $this->post->read();
        $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $posts;
    }
    public function createUser($data)
    {
        // Set the properties
        $this->post->title = $data['title'];
        $this->post->content = $data['content'];
        $this->post->summary = $data['summary'];
        $this->post->date = $data['date'];

        // Call the create method
        if ($this->post->create()) {
            session_start();
            $_SESSION["create"] = "Post added successfully";
            header("Location:index.php");
        } else {
            die("Data is not inserted!");
        }
    }
    public function view($id)
    {
        $this->post->id = $id;
        $stmt = $this->post->readOne();
        $post = $stmt->fetch(PDO::FETCH_ASSOC);
        return $post;
    }
    public function deleteUser($id)
    {
        $this->post->id = $id;
        if ($this->post->delete() === true) {
            session_start();
            $_SESSION["delete"] = "Post deleted successfully!";
        } else {
            $_SESSION["delete"] = "Something is not write. Data is not deleted";
        }
    }
    public function updateUser($data)
    {
        $this->post->title = $data['title'];
        $this->post->content = $data['content'];
        $this->post->summary = $data['summary'];
        $this->post->date = $data['date'];
        $this->post->id = $data['id'];

        // Call the create method
        if ($this->post->update() === true) {
            session_start();
            $_SESSION["update"] = "Post udpated successfully";
            header("Location:index.php");
        } else {
            die("Data is not updated!");
        }
    }
}
