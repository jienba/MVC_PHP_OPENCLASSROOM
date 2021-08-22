<?php
$title = 'Mon Blog';
require("../includes/navbar.php");
?>
<?php ob_start();?>
<!-- DATE -->

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
                while ($data = $req->fetch()) {

                    ?>
                    <!-- <h3 style="text-align: center; background-color:#011c37; color:#EBF6F7; border-radius:2rem; padding: 1.8rem 2rem"><?= $data['titre'] ?> le <span style="font-style: italic;"><?= DATE_FORMAT(date($data['date_creation']), '%d/%m/%Y'); ?> à <?= DATE_FORMAT($data['date_creation'], '%Hh%imin%ss'); ?></span></h3> -->
                    <!-- <h3 style="text-align: center; background-color:#011c37; color:#EBF6F7; border-radius:2rem; padding: 1.8rem 2rem"><?= $data['titre'] ?> le <span style="font-style: italic;"><?= DATE($data['date_creation']); ?> </span></h3> -->
                    <h3 style="text-align: center; background-color:#011c37; color:#EBF6F7; border-radius:2rem; padding: 1.8rem 2rem"><?=  $data['title'] ?>
                        le <span
                                style="font-style: italic;"><?= $data['creation_date_fr']?></span>
                    </h3>
                    <p style="font-size: 25px;">
                        <?= $data['content'] ?>
                        <br><a href="post.php.php?id=<?= $data['id'] ?>"
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
<?php $content = ob_clean();?>
<?php require 'template.php'?>
