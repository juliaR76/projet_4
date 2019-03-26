<?php

try
{
//connexion base de donnee projet_4
$bdd = new PDO('mysql:host=localhost; dbname=projet_4;charset=utf8', 'root', '');
}
catch (exception $e)
{
    die('Erreur : '.$e->getMessage());
}

//recupere les donnees de la table
$req = $bdd->prepare('SELECT id, titre, auteur, contenu, DATE_FORMAT(date_ajout, \'%d/%m/%Y à %Hh%imin\') 
AS date_ajout_fr FROM billet WHERE id = :id');
$req->execute([
    "id" => $_GET['billet']
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
 <title>Billet pour l'Alaska</title>
</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="index.html">Jean Fastoche</a>
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
            <a class="nav-link" href="post.php">Articles</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.html">contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="connexion.html">Connexion</a>
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
            <h1>Man must explore, and this is exploration at its greatest</h1>
            <h2 class="subheading">Problems look mighty small from 150 miles up</h2>
            <span class="meta">Posted by
              <a href="#">Start Bootstrap</a>
              on August 24, 2019</span>
          </div>
        </div>
      </div>
    </div> 
  </header>

  <!-- Post Content -->
  <article>
<?php while($donnee = $req->fetch()){ ?>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <h2 class="section-heading"><?= htmlspecialchars($donnee['titre']) ?></h2>
          <P><?= htmlspecialchars($donnee['contenu'])?></p>
          <p>De <?= htmlspecialchars($donnee['auteur']) ?>, le <?= htmlspecialchars($donnee['date_ajout_fr']) ?> </p> 
<?php } ?>
        </div>
      </div>
    </div>
  </article>
  <hr>

  <!-- Bootstrap core JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>   


</body>
</html>