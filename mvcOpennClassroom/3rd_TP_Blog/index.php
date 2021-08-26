<?php
require "controller/frontend.php";


if (isset($_GET['action'])){
    if ($_GET['action'] == 'listPosts'){
        listPosts();
    }
    elseif ($_GET['action'] == 'post'){
        if (isset($_GET['id']) && $_GET['id'] > 0 ){
            post();
        }
    }
    elseif ($_GET['action'] == 'addComment'){
        if (isset($_GET['id']) && $_GET['id'] > 0 ){
            addComment($_GET['id'], $_POST['author'], $_POST['comment'] );
        }
    }
    else {
        echo 'Erreur: Aucun identifiant de billet envoyé';
    }

}
else{
    listPosts();
}