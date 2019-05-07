
<?php ob_start(); ?>
<?php foreach ($billets as $billet) { ?>  
    <div class="container">
        <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <div class="post-preview">
            <a href="post.php?billet=<?= $billet->id() ?>">
                <h2 class="post-title"><strong><?= htmlspecialchars($billet->titre()) ?></strong></h2>
            </a>
            <p><?= htmlspecialchars($billet->contenu()) ?></p>
            <p class="post-meta">Posted by <?= htmlspecialchars($billet->auteur()) ?>, le <?= htmlspecialchars($billet->date_ajout()) ?></p>
            <i class="far fa-comment-alt"></i><a href="post.php?billet=<?= $billet->id() ?>"> commentaire</a>
            <hr>
            </div>
        </div>
        </div>
    </div> 

<?php } ?>
    <?= $content = ob_get_clean(); ?>

<?php require('template.php'); ?>