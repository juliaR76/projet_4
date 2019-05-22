<?php 
if(!empty($_SESSION))
{
  $log = '<li class="nav-item">
            <a class="nav-link" href="index.php">Accueil du site</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Bonjour'.' '.$_SESSION['pseudo'].'</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="index.php?action=creation">Admin</a>
              <a class="dropdown-item" href="index.php?action=billets">Tout les billets</a>
              <a class="dropdown-item" href="index.php?action=deconnexion">Deconnexion</a>
            </div>
          </li>';
}else
{
  $log = '<li class="nav-item">
            <a class="nav-link" href="index.php">Accueil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?action=billets">Tout les billets</a>        
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?action=contact">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?action=connexion">Connexion</a>
          </li>';
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=2y78n40ius7vughan8q8sfql8nml9nmphby5042rx7rz77ox"></script>
    <script type="text/javascript">
      tinymce.init({
          selector: '#myTextarea',
      });
    </script>
    <title>Billet simple pour l'Alaska</title>
</head>
<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="index.php">Jean Forteroche</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <?= $log ?>
        </ul>
      </div>
    </div>
  </nav>
 
<!-- Page Header -->
  <header class="masthead" style="background-image: url('public/img/alaska_4.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1><?= $title ?></h1>
            <span class="subheading"><?= $sousTitre ?></span>
          </div>
        </div>
      </div>
    </div>
  </header>
  
      <?= $content ?>

  <!-- Bootstrap core JavaScript -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> 
        
  </body>
  </html>