<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Home</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../Bootstrap3/css/bootstrap.css">
    <link rel="stylesheet" href="../Bootstrap3/css/basescss.css">
    <link rel="stylesheet" href="../Bootstrap3/font-awesome/css/font-awesome.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="../Bootstrap3/css/bootstrap-theme.min.css">
    <!-- Loader -->
    <!-- <link rel="stylesheet" href="css/loader.css"> -->
    <link rel="stylesheet" href="../Bootstrap3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../Bootstrap3/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="../Bootstrap3/css/responsive.bootstrap.min.css">
    <script src="../Bootstrap3/js/jquery-1.12.4.js"></script>
    <script src="../Bootstrap3/js/bootstrap.min.js"></script>
    <script src="../Bootstrap3/js/jquery.dataTables.min.js"></script>

</head>

<body>

<?php
require("../includes/navbar.php");
?>
<!-- DATE -->
<div class="container-fluid">
    <div class="jumbotron">

        <h1>TP Blog</h1>
        <p>Aujourd'hui, nous sommes le <?= date('D-d-M-Y h:i:s'); ?>. </p>

        <p><a class="btn btn-success btn-lg" href="#" role="button">Learn more</a></p>


    </div>
    <h2 style="text-align:center; font-size:40px; letter-spacing: 4px;">Mon Super blog!</h2>
    <span class="col-md-10 col-md-offset-1" style="font-size: 20px;">Derniers billets du blog: </span>
    <div class="col-md-10 col-md-offset-1"
         style="background-color: rgb(175, 200, 247); border: 2px ridge; border-radius: 10px; text-align:center; padding:20px;">
        <div class="row">
            <div class="col-md-12" style="text-align:justify;">
                <?php
                /**
                 * Correction De Mathieu
                 * $req = $db->query('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d%m%Y à %Hh%imin%ss\') AS date_creation_fr  FROM billets ORDER BY date_creation DESC LIMIT 0, 5');
                 * Utilisation d'une nouvelle fonction nl2br qui permet de convertir les retours à la ligne  en balise HTML <br>
                 * * C'est une fonction dont on aura sûrement besoin  pour conserver les retours à la ligne saisis dans les formulaires.
                 */
                // fonctionnalité pour compter le nombre des commentaire pour chaque billet
                /*
                $req2 = $db->prepare('SELECT COUNT(commentaire) AS nbreCommentaire FROM commentaires');
                $nbreCommentaire = $req->execute();
                */
                $req->execute();
                while ($data = $req->fetch()) {

                    ?>
                    <!-- <h3 style="text-align: center; background-color:#011c37; color:#EBF6F7; border-radius:2rem; padding: 1.8rem 2rem"><?= $data['titre'] ?> le <span style="font-style: italic;"><?= DATE_FORMAT(date($data['date_creation']), '%d/%m/%Y'); ?> à <?= DATE_FORMAT($data['date_creation'], '%Hh%imin%ss'); ?></span></h3> -->
                    <!-- <h3 style="text-align: center; background-color:#011c37; color:#EBF6F7; border-radius:2rem; padding: 1.8rem 2rem"><?= $data['titre'] ?> le <span style="font-style: italic;"><?= DATE($data['date_creation']); ?> </span></h3> -->
                    <h3 style="text-align: center; background-color:#011c37; color:#EBF6F7; border-radius:2rem; padding: 1.8rem 2rem"><?=  $data['title'] ?>
                        le <span
                                style="font-style: italic;"><?= date($data['creation_date']); ?> à <?= date($data['creation_date']); ?></span>
                    </h3>
                    <p style="font-size: 25px;">
                        <?= $data['content'] ?>
                        <br><a href="commentaires.php?id=<?= $data['id'] ?>"
                               style="text-decoration:none; color:blue; font-size:2rem;">Commentaires </a>
                    <hr>
                    </p>
                    <?php
                }
                $req->closeCursor();
                ?>
            </div>
        </div>
    </div>


</div>


</body>

</html>

