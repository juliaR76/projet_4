<?php

require("poo/Billet.php");
require("poo/BilletManager.php");
require("poo/Commentaire.php");
require("poo/CommentaireManager.php");

// inserer des commentaire

if(!empty($_POST)){ 
  $commentaire = new Commentaire ([
      "id_billet" => $_GET['billet'],
      "auteur" => $_POST['auteur'],
      "comment" => $_POST['comment']
  ]);
  
  $commentaireManager = new CommentaireManager;
  $commentaire = $commentaireManager->add($commentaire);
}

//recupere les  billets

$billetManager = new BilletManager; 
$billet = $billetManager->get($_GET['billet']);


//recupere les commentaires

$commentaireManager = new CommentaireManager;
$commentaires = $commentaireManager->get($_GET['billet']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 <title>Billet pour l'Alaska</title>
</head>

<body>

  <!-- Navigation -->
  <?php include("view/menu.php")?>

  <!-- Page Header -->
  <header class="masthead" style="background-image: url('img/alaska_4.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="post-heading">
            <h1><?= htmlspecialchars($billet->titre()) ?></h1>
            <span class="meta"><?= htmlspecialchars($billet->auteur()) ?></span>
          </div>
        </div>
      </div>
    </div> 
  </header>

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

<?php
  foreach ($commentaires as $commentaire) { ?>

              <div class="card card-body">
                 
                <p><strong><?= htmlspecialchars($commentaire->auteur()) ?></strong></p>
                <p><?= htmlspecialchars($commentaire->comment()) ?></p> 
                <p>le <?= $commentaire->date_comment() ?></p>
                <?php if($commentaire->confirm()){ ?>
                  <a href="post.php?type=commentaire&confirm=<?= $commentaire->id() ?>">Signaler</a>
                <?php } ?> 
              </div>

<?php  } ?>
            </div>
   
            <hr>         
<!--commentaire-->
            <div class="collapse" id="collapseExample">
              <div class="card card-body">  
                <form action= "post.php?billet=<?= $_GET['billet'] ?>" method= "post">
                  <div class="form-group">
                    <label for="formGroupExampleInput">Pseudo</label>
                    <input type="text" name= "auteur" class="form-control" id="formGroupExampleInput" placeholder="Example input">
                  </div>
                  <div class="form-group">
                    <label for="formGroupExampleInput2">Commentaire</label>
                    <input type="text" name= "comment"class="form-control" id="formGroupExampleInput2" placeholder="Another input">
                  </div>
                  <button type="submit" class="btn btn-primary">Publier</button>
                  <button type="button" class="btn btn-primary">Annuler</button>
                </form>  
              </div>
            </div>            
          </div>
        </div>
      </div>
    </div>
  </article>

  <!-- Bootstrap core JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>   


</body>
</html>