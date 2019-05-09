<?php ob_start(); ?>

    <div class="container">
        <a href="index.php?action=creation">Retour à l'Admin</a>
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <form action="index.php?action=update&billet=<?= $billet->id() ?>" method="post">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Auteur</label>
                        <input type="text" class="form-control" name="auteur" placeholder="Auteur" value="<?= htmlspecialchars($billet->auteur()) ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Titre</label>
                        <input type="text" class="form-control" name="titre" placeholder="Titre" value="<?= htmlspecialchars($billet->titre()) ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Corps de texte</label>
                        <textarea class="form-control" name="contenu" rows="10"><?= htmlspecialchars($billet->contenu()) ?></textarea>
                    </div>
                        <a href="index.php?action=update"><button type="submit" class="btn btn-dark">Modifier</button></a>
                        <a href="index.php?action=creation"><button type="button" class="btn btn-dark">Annuler</button></a>
                </form>
            </div>  
        </div>
    </div>
<?= $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
            