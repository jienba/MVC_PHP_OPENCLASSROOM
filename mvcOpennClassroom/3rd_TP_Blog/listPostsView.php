<?php $title = 'Mon blog'; ?>

<?php ob_start() ?>
<span class="col-md-10 col-md-offset-1" style="font-size: 20px;">Derniers billets du blog: </span>
<div class="col-md-10 col-md-offset-1"
     style="background-color: rgb(175, 200, 247); border: 2px ridge; border-radius: 10px; text-align:center; padding:20px;">
    <div class="row">
        <div class="col-md-12" style="text-align:justify;">
            <?php
            while ($data = $posts->fetch()) {
                ?>
                <h3 style="text-align: center; background-color:#011c37; color:#EBF6F7; border-radius:2rem; padding: 1.8rem 2rem"><?= $data['title'] ?>
                    le <span
                            style="font-style: italic;"><?= $data['creation_date_fr'] ?></span>
                </h3>
                <p style="font-size: 25px;">
                    <?= $data['content'] ?>
                    <br><a href="index.php?action=post&id=<?= $data['id'] ?>"
                           style="text-decoration:none; color:blue; font-size:2rem;">Commentaires</a>
                <hr>
                <?php
            }
            $posts->closeCursor();
            ?>
        </div>
    </div>
</div>
<?php $content = ob_get_clean();?>
<?php require("template.php")?>