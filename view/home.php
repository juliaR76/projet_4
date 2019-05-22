 
<!-- Main Content -->

  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <div class="post-preview"> 
          <a href="index.php?action=post&billet=<?= $billet->id() ?>">
            <h2 class="post-title"><strong><?= htmlspecialchars($billet->titre()) ?></strong></h2>
          </a>
          <p><?= $billet->contenu()?></p>
          <p class="post-meta">Par <?= htmlspecialchars($billet->auteur()) ?>, le <?= htmlspecialchars($billet->date_ajout()) ?></p>
          <i class="fas fa-book-open"></i><a href="index.php?action=post&billet=<?= $billet->id() ?>"> Lire le chapitre</a>
          <hr>
        </div>
      </div>
    </div>
  </div>

  <div class="clearfix">
    <a class="btn btn-dark float-right" href="index.php?billets">Plus d'articles &rarr;</a>
  </div>
