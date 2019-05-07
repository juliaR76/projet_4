
<?php ob_start(); ?>
 
<!-- Main Content -->

  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <div class="post-preview"> 
          <a href="index.php?action=post&billet=<?= $billet->id() ?>">
            <h2 class="post-title"><strong><?= htmlspecialchars($billet->titre()) ?></strong></h2>
          </a>
          <p><?= htmlspecialchars($billet->contenu())?></p>
          <p class="post-meta">Posted by <?= htmlspecialchars($billet->auteur()) ?>, le <?= htmlspecialchars($billet->date_ajout()) ?></p>
          <i class="far fa-comment-alt"></i><a href="index.php?action=post&billet=<?= $billet->id() ?>"> commentaires</a>
          <hr>
        </div>
      </div>
    </div>
  </div>

  <div class="clearfix">
    <a class="btn btn-dark float-right" href="billets.php">Plus d'articles &rarr;</a>
  </div>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>