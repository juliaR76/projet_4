<?php

session_start();

try
{
//connexion base de donnee projet_4
$bdd = new PDO('mysql:host=localhost; dbname=projet_4;charset=utf8', 'root', '');
}
catch (exception $e)
{
    die('Erreur : '.$e->getMessage());
}

//moderation des commentaire
if(isset($_GET['confirm']) AND !empty($_GET['confirm'])) {
  $confirm = (int) $_GET['confirm'];
  $req = $bdd->prepare('UPDATE commentaire SET confirm = 0 WHERE id = :id');
  $req->execute([
     "id" => $confirm
  ]);
}


//recupere les donnees de la table
$req= $bdd->prepare('SELECT id, titre, auteur, contenu, DATE_FORMAT(date_ajout, \'%d/%m/%Y à %Hh%imin%ss\')
AS date_ajout_fr FROM billet WHERE id = :id');
$req->execute([
    "id" => $_GET['billet'] 
]);
$billet = $req->fetch();

//recupere les commentaire

$req=$bdd->prepare('SELECT id, id_billet, auteur, comment, DATE_FORMAT(date_comment, \'%d/%m/%Y à %Hh%imin%ss\')
AS date_comment_fr FROM commentaire WHERE id_billet=? ');
$req->execute([
    $_GET['billet']
]);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title>Billet simple pour l'Alaska</title>
</head>
<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="index.html">Jean Forteroche</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Accueil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="connexion.php">Connexion</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Header -->
  <header class="masthead" style="background-image: url('img/alaska_4.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="post-heading">
            <h1><?= htmlspecialchars($billet['titre']) ?></h1>
            <span class="meta"><?= htmlspecialchars($billet['auteur']) ?></span>
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
            <a href="post.php?billet=<?= $billet['id'] ?>">
              <h2 class="post-title"><?= htmlspecialchars($billet['titre']) ?></h2>
            </a>
            <p><?= htmlspecialchars($billet['contenu'])?></p>
            <p class="post-meta">Posted by <?= htmlspecialchars($billet['auteur']) ?>, le <?= htmlspecialchars($billet['date_ajout_fr']) ?></p>
            <p>
              <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                <i class="far fa-comment-alt"></i>
              </button>
            </p>

            <div class="collapse" id="collapseExample">
<?php while($comment = $req->fetch()){ ?>
              <div class="card card-body">
                 
                <p><strong><?= htmlspecialchars($comment['auteur']) ?></strong></p>
                <p><?= htmlspecialchars($comment['comment']) ?></p> 
                <p>le <?=$comment['date_comment_fr'] ?></p>
                <?php if($comment['confirm'] == 1) { ?>
                  <a href="commentaire.php?type=commentaire&confirm=<?= $comment['id'] ?>">Confirmer</a>
                 <?php } else if($comment['confirm'] == 0) { ?>
                  <a href="delete.php?billet=<?= $billet['id'] ?>"> Supprimer </a>
                 <?php } ?>
                <button><a href="delete.php?billet=<?= $comment['id'] ?>"> Supprimer </a></button>                  
              </div>
<?php } ?>
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