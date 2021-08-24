<?php
$title = 'Commentaires';
ob_start()?>


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

            </div>
        </div>
    </div>
<?php
$content = ob_get_clean();
require("template.php") ?>
?>


