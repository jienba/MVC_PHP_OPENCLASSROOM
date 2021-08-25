<?php
require('model.php');

if (isset($GET['id'] ) && $GET['id'] > 0) {
    $post = getPost($GET['id']);
    $comments = getComments($GET['id']);
    require ('postView.php');
}else {
    echo 'Erreur: aucun identifiant de billet envoyé';
}

