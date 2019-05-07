
<?php ob_start(); ?>
  <!-- Post Content -->
  <article>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="post-preview">
            <a href="post.php?billet=<?= $billet->id() ?>">
              <h2 class="post-title"><?= htmlspecialchars($billet->titre()) ?></h2>
            </a>
            <p><?= htmlspecialchars($billet->contenu())?></p>
            <p class="post-meta">Posted by <?= htmlspecialchars($billet->auteur()) ?>, le <?= htmlspecialchars($billet->date_ajout()) ?></p>

<?php  foreach ($commentaires as $commentaire) { ?>

              <div class="card card-body">
                <p><strong><?= htmlspecialchars($commentaire->auteur()) ?></strong></p>
                <p><?= htmlspecialchars($commentaire->comment()) ?></p> 
                <p>le <?= $commentaire->date_comment() ?></p>
              <?php if($commentaire->confirm() == 0) { ?>
                <a href="post.php?commentaire&confirm=<?= $commentaire->id() ?>">Signaler</a>
              <?php } else { ?>
                <p>Ce commentaire a été signaler !</p>
              <?php } ?> 
              </div>

<?php  } ?>
            <hr>         
<!--commentaire-->
              <div class="card card-body">  
                <form action= "post.php?billet=<?= $billet->id() ?>" method= "post">
                  <div class="form-group">
                    <label for="formGroupExampleInput">Pseudo</label>
                    <input type="text" name= "auteur" class="form-control" id="formGroupExampleInput" placeholder="Pseudo">
                  </div>
                  <div class="form-group">
                    <label for="formGroupExampleInput2">Commentaire</label>
                    <input type="text" name= "comment"class="form-control" id="formGroupExampleInput2" placeholder="commentaire">
                  </div>
                  <a href="post.php?billet=<?= $billet->id() ?>"><button type="submit" class="btn btn-primary">Publier</button></a> 
                </form>  
              </div>            
          </div>
        </div>
      </div>
    </div>
  </article>

<?php $content = ob_get_clean(); ?>
<?php require('template.php') ?>