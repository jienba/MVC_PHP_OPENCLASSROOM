<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Commentaires</title>
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
<div class="container-fluid">
    <div class="jumbotron">

        <h1>TP Blog</h1>
        <p>Aujourd'hui, nous sommes le <?= date('D-d-M-Y h:i:s'); ?>. </p>

        <p><a class="btn btn-success btn-lg" href="#" role="button">Learn more</a></p>

    </div>
    <h2 style="text-align:center; font-size:40px; letter-spacing: 4px;">Mon Super blog!</h2>
    <br><a href="index.php" class="col-md-10 col-md-offset-1" style="text-decoration:none; color:blue; font-size:2rem;">Retour
        à la liste des billets</a>
    <div class="col-md-10 col-md-offset-1"
         style="background-color: rgb(175, 200, 247); border: 2px ridge; border-radius: 10px; text-align:center; padding:20px;">
        <div class="row">
            <div class="col-md-12" style="text-align:justify;">
                <h3 style="text-align: center; background-color:#011c37; color:#EBF6F7; border-radius:2rem; padding: 1.8rem 2rem"> <?= $post['title'] ?> le <?= $post['creation_date_fr'] ?> </h3>
                <p style="font-size: 25px;">
                    <?php
                    echo $post['content'];
                    ?>
                </p>
                    <br><span style="text-decoration:none; color:blue; font-size:2rem;">Commentaires</span> <br>
                <div class="col-md-6">
                    <table class="table table-hover">
                        <tbody>

                        <?php
                        while ($comment = $comments->fetch()) {

                        ?>
                        <tr>
                            <td>
                                <p><em><?= $comment['author'] ?> </em> le <?= $comment['comment_date_fr'] ?></p>
                                <p><?= $comment['comment'] ?></p>
                            </td>

                        </tr>

                        </tbody>
                        <?php
                        }
                        $comments   ->closeCursor();

                        ?>
                    </table>
                </div>

                </p>

            </div>
        </div>
    </div>

</div>


</body>

</html>



