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
    $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr
                        FROM posts ORDER BY creation_date DESC LIMIT 0, 5');
    return $req;

}

function getPost($postId)
{
    $db = dbConnect();
    $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr
                                FROM posts WHERE id = ?');
    $post = $req->execute(array($postId));
    return $post;

}

function getComments($postId)
{
    $db = dbConnect();
    $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr
                                    FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
    $comments->execute(array($postId));
    $comments->fetch();
    return $comments;
}