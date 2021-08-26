<?php
require "model/frontend.php";
function listPosts()
{
    $posts = getPosts();
    require "view/frontend/listPostsView.php";
}

function post()
{
    $post = getPost($_GET['id']);
    $comments = getComments($_GET['id']);
    require "view/frontend/postView.php";
}

function addComment($post_id, $author, $comment)
{
    $affectedLines = postComment($post_id, $author, $comment);
    if ($affectedLines == false){
        throw new Exception(`Impossible d'ajouter le commentaire!`);
    }
    else{
        header('Location: index.php?action=post&id=' . $post_id);
    }
}