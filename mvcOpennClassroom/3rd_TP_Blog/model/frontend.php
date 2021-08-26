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
                        FROM billets ORDER BY creation_date DESC LIMIT 0, 5');
    return $req;

}

function getPost($postId)
{
    $db = dbConnect();
    $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr
                                FROM billets WHERE id = ?');
    $req->execute(array($postId));
    $post = $req->fetch();
    return $post;
}

function getComments($postId)
{
    $db = dbConnect();
    $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr
                                    FROM commentaires WHERE id_billet = ? ORDER BY comment_date DESC');
    $comments->execute(array($postId));
    return $comments;
}

function postComment($postId, $author, $comment)
{
    $db = dbConnect();
    $comments = $db->prepare('INSERT INTO commentaires(id_billet, author, comment, comment_date)
                                        VALUES (?,?,?, NOW())');
    $affectedLines = $comments->execute(array($postId, $author, $comment));

    return $affectedLines;
}