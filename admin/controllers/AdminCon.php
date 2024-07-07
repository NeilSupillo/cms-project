<?php
require_once __DIR__ . '/../connect.php';
require_once __DIR__ . '/../models/AdminModel.php';
class AdminCon
{
    private $db;
    private $post;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->post = new Post($this->db);
    }
    public function getAll()
    {
        $stmt = $this->post->read();
        $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $posts;
    }
}
