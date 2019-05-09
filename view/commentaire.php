
<?php ob_start(); ?>
  <!-- Post Content -->
  <article>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="post-preview">
            <a href="index.php?action=post&billet=<?= $billet->id() ?>">
              <h2 class="post-title"><?= htmlspecialchars($billet->titre()) ?></h2>
            </a>
            <p><?= htmlspecialchars($billet->contenu()) ?></p>
            <p class="post-meta">Posted by <?= htmlspecialchars($billet->auteur()) ?>, le <?= htmlspecialchars($billet->date_ajout()) ?></p>
            <p>
              <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                <i class="far fa-comment-alt"></i>
              </button>
            </p>
<?php foreach ($commentaires as $commentaire) { ?>
            <div class="collapse" id="collapseExample">

              <div class="card card-body">     
                <p><strong><?= htmlspecialchars($commentaire->auteur()) ?></strong></p>
                <p><?= htmlspecialchars($commentaire->comment()) ?></p> 
                <p>le <?= $commentaire->date_comment() ?></p>
                <?php if($commentaire->confirm() == 1) { ?>
                  <a href="index.php?action=commentaire&confirm=<?= $commentaire->id() ?>">Confirmer</a>
                 <?php } else if($commentaire->confirm() == 0) { ?>
                    <p>Commentaire valider</p>
                    <a href="index.php?action=delete&billet=<?= $commentaire->id() ?>"> Supprimer </a>
                 <?php } ?>
              </div>
<?php } ?>
            </div>          
          </div>
        </div>
      </div>
    </div>
  </article>

 <?= $content = ob_get_clean(); ?>
 <?php require_once('template.php'); ?>
