<?php

require("poo/Billet.php");
require("poo/BilletManager.php");


//recupere les donnees de la table
$billetManager = new BilletManager;
$billet = $billetManager->get($_GET['billet']);


//modifier le billet


if(!empty($_POST)){ 
    $billet = new Billet([
        "id"=> $_GET['billet'],
        "titre" => $_POST['titre'],
        "contenu" => $_POST['contenu']
    ]);
    
    $billetManager = new BilletManager;
    $billetManager->update($billet);
    
}

?>

<!DOCTYPE html>
<html lang="fr">
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
            <a class="navbar-brand" href="index.php">Jean Forteroche</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
             Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Retour au site</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="creation.php">Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="connexion.php">Connexion</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <header class="masthead" style="background-image: url('img/Anchorage_3.jpg')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="site-heading">
                        <h1>Billet simple pour l'Alaska</h1>
                        <span class="subheading">Admin</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container">
        <a href="creation.php">Retour à l'Admin</a>
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <form action="update.php?billet=<?= $billet->id() ?>" method="post">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Auteur</label>
                        <input type="text" class="form-control" name="auteur" placeholder="Auteur" value="<?= htmlspecialchars($billet->auteur()) ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Titre</label>
                        <input type="text" class="form-control" name="titre" placeholder="Titre" value="<?= htmlspecialchars($billet->titre()) ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Corps de texte</label>
                        <textarea class="form-control" name="contenu" rows="10"><?= htmlspecialchars($billet->contenu()) ?></textarea>
                    </div>
                        <a href="creation.php"><button type="submit" class="btn btn-dark">Modifier</button></a>
                        <a href="creation.php"><button type="button" class="btn btn-dark">Annuler</button></a>
                </form>
            </div>  
        </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>   

</body>
</html>


            