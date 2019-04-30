<?php

require("model/Billet.php");
require("model/BilletManager.php");
require("model/Commentaire.php");
require("model/CommentaireManager.php");

// recupere tout les billets

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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title>Billet simple pour l'Alaska</title>
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
                    <div class="page-heading">
                        <h1>Tout vos episodes !</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
 
<!-- Main Content -->

<?php foreach ($billets as $billet) { ?>
    <div class="container">
        <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <div class="post-preview">
            <a href="post.php?billet=<?= $billet->id() ?>">
                <h2 class="post-title"><strong><?= htmlspecialchars($billet->titre()) ?></strong></h2>
            </a>
            <p><?= htmlspecialchars($billet->contenu()) ?></p>
            <p class="post-meta">Posted by <?= htmlspecialchars($billet->auteur()) ?>, le <?= htmlspecialchars($billet->date_ajout()) ?></p>
            <i class="far fa-comment-alt"></i><a href="post.php?billet=<?= $billet->id() ?>"> commentaire</a>
            <hr>
            </div>
        </div>
        </div>
    </div>
<?php } ?>
    <div class="clearfix">
        <a class="btn btn-dark float-right" href="index.php">Plus d'articles &rarr;</a>
    </div>

 
<!-- Bootstrap core JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> 
</body>
</html>