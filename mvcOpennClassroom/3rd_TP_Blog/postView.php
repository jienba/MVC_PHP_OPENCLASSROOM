<?php
$title = 'Commentaires';
require("../includes/navbar.php");
?>
<?php  ob_start();?>
<br><a  href="index.php" class="col-md-10 col-md-offset-1" style="text-decoration:none; color:blue; font-size:2rem;">Retour à la liste des billets</a>
		<div class="col-md-10 col-md-offset-1"  style="background-color: rgb(175, 200, 247); border: 2px ridge; border-radius: 10px; text-align:center; padding:20px;">
			<div class="row">
                <div class="col-md-12" style="text-align:justify;">
				<h3 style="text-align: center; background-color:#011c37; color:#EBF6F7; border-radius:2rem; padding: 1.8rem 2rem"> <?= $post['title']?> le <?= $post['creation_date_fr']?> </h3>
				<p style="font-size: 25px;">
                    <?php
                        echo $post['content'];
                    ?>
                    <br><span  style="text-decoration:none; color:blue; font-size:2rem;">Commentaires</span> <br>
                    <div class="col-md-6">
                        <table class="table table-hover">
                            <tbody>

                                <?php
                                    while ($comment = $comments->fetch()) {

                                        ?>
                                <tr>
                                    <td>
                                        <p><em><?= $comments['author'] ?> </em> le <?= $comments['comment_date_fr'] ?></p>
                                        <p><?= $comments['comment'] ?></p>
                                    </td>

                                </tr>

                            </tbody>
                            <?php
                                    }
                                $comment->closeCursor();

                            ?>
                        </table>
                    </div>

				</p>

				</div>
			</div>
		</div>

    </div>

<?php  ob_clean();?>
<?php  require 'template.php';?>

