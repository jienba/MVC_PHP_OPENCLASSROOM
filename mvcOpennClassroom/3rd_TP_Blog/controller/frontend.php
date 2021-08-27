<?php

require_once 'model/CommentManager.php';
require_once 'model/PostManager.php';

function listPosts()
{
    $postManager = new \jienba_devops\Blog\Model\PostManager();
    $posts = $postManager->getPosts();
    require "view/frontend/listPostsView.php";
}

function post()
{
    $postManager = new \jienba_devops\Blog\Model\PostManager();
    $commentManger = new \jienba_devops\Blog\Model\CommentManager();
    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManger->getComments($_GET['id']);
    require "view/frontend/postView.php";
}

function addComment($post_id, $author, $comment)
{
    $commentManger = new \jienba_devops\Blog\Model\CommentManager();
    $affectedLines = $commentManger->postComment($post_id, $author, $comment);
    if ($affectedLines == false){
        throw new Exception(`Impossible d'ajouter le commentaire!`);
    }
    else{
        header('Location: index.php?action=post&id=' . $post_id);
    }
}