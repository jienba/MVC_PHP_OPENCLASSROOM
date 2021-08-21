<?php
/**
 * @return PDO
 */
function dbConnect(): PDO
{
    try {
        $db = new PDO('mysql:host=localhost;dbname=openclassroom;charset=utf8', "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch (PDOException $e) {
        echo "Failure while connecting to the database" . $e->getMessage();
    }
    return $db;
}


function getPosts()
{
    $db = dbConnect();

    return $db->query('SELECT * FROM billets ORDER BY creation_date DESC LIMIT 0, 5');

}

function getPost($postId)
{
    $db = dbConnect();
    $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr
                                FROM posts WHERE id = ?');
    $req->execute(array($postId));
    return $req->fetch();

}

function getComments($postId)
{
    $db = dbConnect();
    $req = $db->prepare('');
}


