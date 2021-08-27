<?php


class PostManager
{
    private function dbConnect(): PDO
    {
        $db = new PDO('mysql:host=localhost;dbname=openclassroom;charset=utf8', "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        return $db;
    }

    public function getPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr
                        FROM billets ORDER BY creation_date DESC LIMIT 0, 5');
        return $req;

    }

    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr
                                FROM billets WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();
        return $post;
    }

}