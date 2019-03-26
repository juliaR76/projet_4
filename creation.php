<?php
var_dump($_POST);

try
{
    //connexion base de donnee projet_4
$bdd = new PDO('mysql:host=localhost; dbname=projet_4;charset=utf8', 'root', '');
}
catch (exception $e)
{
    die('Erreur : '.$e->getMessage());
}

//insertion du billet dans la table

if(!empty($_POST)){
    $req = $bdd->prepare('INSERT INTO billet (id, titre, auteur, contenu, date_ajout)VALUES (:id, :titre, :auteur, :contenu, NOW())');
    $req->execute([
        "id" => $_GET['billet'],
        "titre" => $_POST['titre'],
        "auteur" => $_POST['auteur'],
        "contenu" => $_POST['contenu']
    
    ]);
}

//recuperer le contenue de la table 
$req = $bdd->prepare('SELECT id, titre, auteur, contenu, DATE_FORMAT(date_ajout, \'%d/%m/%Y à %Hh%imin\') 
AS date_ajout_fr
FROM billet ');
$req->execute();
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
    <div class="container">
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
                        <th scope="col"></th>
                        <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
<?php while($donnee = $req->fetch()){ ?>
                        <tr>
                            <td><?= $donnee['titre'] ?></td>
                            <td><?= $donnee['contenu'] ?></td>
                            <td><?= $donnee['auteur'] ?></td>
                            <td><?= $donnee['date_ajout_fr'] ?></td>
                            <td><a href="update.php?billet=<?= $donnee['id'] ?>"> Modifier </a></td>
                            <td><a href="delete.php?billet=<?= $donnee['id'] ?>"> Supprimer </a></td>
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
                        <label for="exampleFormControlTextarea1">Example textarea</label>
                        <textarea class="form-control" name="contenu" rows="10"></textarea>
                    </div>
                    <button type="submit" class="btn btn-dark">Publier</button>
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