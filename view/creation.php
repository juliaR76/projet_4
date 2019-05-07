<?php

require('model/Billet.php');
require('model/BilletManager.php');


//insertion du billet dans la table billet

if(!empty($_POST)){ 
$billet = new Billet([
    "titre" => $_POST['titre'],
    "auteur" => $_POST['auteur'],
    "contenu" => $_POST['contenu']
]);

$billetManager = new BilletManager;
$billetManager->add($billet);

}

//recuperer le contenue de la table billet

$billetManager = new BilletManager;
$billets = $billetManager->getList();

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
                        <a class="nav-link" href="deconnexion.php">Deconnexion</a>
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
        <a href="index.php">Retour au site</a>
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <h2>Billet(s) publié(s)</h2>
                <br/>
                <table class="table table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col">Titre</th>
                        <th scope="col">Contenu</th>
                        <th scope="col">Auteur</th>
                        <th scope="col">Date</th>
                        <th scope="col">Commentaire</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
<?php foreach ($billets as $billet) { ?>
                        <tr>
                            <td><?= $billet->titre() ?></td>
                            <td class="contenu_billet"><?= substr($billet->contenu(),0,25) ?></td>
                            <td><?= $billet->auteur() ?></td>
                            <td><?= $billet->date_ajout() ?></td>
                            <td><i class="far fa-comment-alt"></i><a href="commentaire.php?billet=<?= $billet->id() ?>"> Voir </a></td>
                            <td><a href="update.php?billet=<?= $billet->id() ?>"> Modifier </a></td>
                            <td><a href="delete.php?billet=<?= $billet->id() ?>"> Supprimer </a></td>
                        </tr>
                    </tbody>
<?php } ?>
                </table>
            </div>
        </div>
    </div> 
    <hr> 

    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <h2>Nouveau Billet</h2>
                <br/>
                <form action="creation.php" method="post">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Auteur</label>
                        <input type="text" class="form-control" name="auteur" placeholder="Auteur">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Titre</label>
                        <input type="text" class="form-control" name="titre" placeholder="Titre">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Corps de texte</label>
                        <textarea class="form-control" name="contenu" rows="10"></textarea>
                    </div>
                    <a href="creation.php"><button type="submit" class="btn btn-dark">Publier</button></a>
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