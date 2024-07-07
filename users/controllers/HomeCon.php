<?php
require_once __DIR__ . '/../connect.php';
require_once __DIR__ . '/../models/HomeModel.php';


// require_once '../models/Post.php';
// require_once '../confg/database.php';

class PostController
{
    private $db;
    private $post;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->post = new Post($this->db);
    }

    public function index()
    {
        $stmt = $this->post->read();
        $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $posts;
    }

    public function view($id)
    {
        $this->post->id = $id;
        $stmt = $this->post->readOne();
        $post = $stmt->fetch(PDO::FETCH_ASSOC);
        return $post;
    }
}
