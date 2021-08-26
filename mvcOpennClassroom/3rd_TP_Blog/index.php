<?php
require "controller/frontend.php";

try {
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
            throw  new Exception('Erreur: Aucun identifiant de billet envoyé');
        }

    }
    else{
        listPosts();
    }

}
catch (Exception $e){
    $errorMessage = $e->getMessage();
//    require "view/errorView.php";

}
