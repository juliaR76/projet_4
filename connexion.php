<?php 

try{
    $bdd = new PDO('mysql:host=localhost; dbname=projet_4;charset=utf8', 'root', '');
}
catch (exception $e){
    die('Erreur : '.$e->getMessage());
}

//  Récupération de l'utilisateur et de son pass hashé
if(!empty($_POST)){

$req = $bdd->prepare('SELECT id, pass FROM membre WHERE pseudo = :pseudo');
$req->execute([
'pseudo' => $_POST['pseudo']
]);   
$resultat = $req->fetch();


$PasswordCorrect = password_verify($_POST['pass'], $resultat['pass']);

if (!$resultat){
    echo 'Mauvais identifiant ou mot de passe !';
}else {
    if ($PasswordCorrect) {
        session_start();
        $_SESSION['id'] = $resultat['id'];
        $_SESSION['pseudo'] = $_POST['pseudo'];
        echo 'Vous êtes connecté !';
    }else {
        echo 'Mauvais identifiant ou mot de passe !';
    }
}
}

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
                        <a class="nav-link" href="index.html">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="post.html">Articles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.html">Contact</a>
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
                    <div class="page-heading">
                        <h1>Se Connecter</h1>
                        <span class="subheading">espace membre</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

<!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <form action="connexion.php" method="post" name="sentMessage" id="contactForm" novalidate>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>Pseudo</label>
                            <input type="text" class="form-control" placeholder="Pseudo" id="pseudo" required data-validation-required-message="Veuillez saisir votre Pseudo.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>Mot de pass</label>
                            <input type="password" class="form-control" placeholder="Mot de pass" id="pass" required data-validation-required-message="Veuillez saisir votre mot de pass.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <br>
                    <div id="success"></div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" id="sendMessageButton"><a href="creation.php">Connecter</a></button>
                        </div>
                </form>
            </div>
        </div>
    </div>

    <hr>

 <!-- Bootstrap core JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> 
</body>
</html>