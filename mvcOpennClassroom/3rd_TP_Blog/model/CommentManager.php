<?php

namespace jienba_devops\Blog\Model;
require_once "model/Manager.php";
class CommentManager extends Manager
{

    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr
                                    FROM commentaires WHERE id_billet = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId));
        return $comments;
    }

    public function postComment($postId, $author, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO commentaires(id_billet, author, comment, comment_date)
                                        VALUES (?,?,?, NOW())');
        $affectedLines = $comments->execute(array($postId, $author, $comment));

        return $affectedLines;
    }

    public function editComment($idComment, $newComment)
    {
        $db = $this->dbConnect();
        $comment = $db->prepare('UPDATE commentaires
                                        SET comment = :newComment
                                        WHERE id = :idComment');
        $comment->execute(array(
            'newComment' => $newComment,
            'idComment' => $idComment
        ));

    }
}