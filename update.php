<?php
var_dump($_GET['billet']);
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
AS date_ajout_fr FROM billet');
$req->execute();


//mettre à jour les donnees
if(!empty($_POST)){
$req = $bdd->prepare('UPDATE billet SET titre = :titre, contenu = :contenu, date_ajout = NOW() WHERE id = :id');
$req->execute([
    "id" => $_GET['billet'],
    "titre" => $_POST['titre'],
    "contenu" => $_POST['contenu']
]);
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
    <header class="masthead" style="background-image: url('img/Anchorage_3.jpg')">
        <div class="overlay"></div>
        <div class="container">
          <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
              <div class="site-heading">
                <h1>Billet pour l'Alaska</h1>
                <span class="subheading">Modifier votre billet</span>
              </div>
            </div>
          </div>
        </div>
    </header>

<?php while($donnee = $req->fetch()){ ?>
    <div class="container">
        <a href="creation.php">Retour à l'Admin</a>
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <form action="update.php?billet=<?= $_GET['billet'] ?>" method="post">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Auteur</label>
                        <input type="text" class="form-control" name="auteur" placeholder="Auteur" value="<?= htmlspecialchars($donnee['auteur']) ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Titre</label>
                        <input type="text" class="form-control" name="titre" placeholder="Titre" value="<?= htmlspecialchars($donnee['titre']) ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Corps de texte</label>
                        <textarea class="form-control" name="contenu" rows="10"><?= htmlspecialchars($donnee['contenu'])?></textarea>
                    </div>
                    <button type="submit" class="btn btn-dark">Modifier</button>
                    <button type="button" class="btn btn-dark"><a href="creation.php">Annuler</a></button>
                </form>
            </div>  
        </div>
    </div>
    
<?php } ?>

    <!-- Bootstrap core JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>   

</body>
</html>


            