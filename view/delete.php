
<?php ob_start(); ?>

    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">HEY !</h4>
        <p>Ce billet à bien été supprimé ! </p>
    <hr>
        <p class="mb-0"><a href="index.php?action=creation">Retour à l'admin</a></p>
    </div>
<?= $content = ob_get_clean(); ?>
<?php require('template.php'); ?>