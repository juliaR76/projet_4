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
FROM billet');
$req->execute();
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CREATE</title>
</head>

<body>
    <p><a href="index.php">Retour au site</a></p>

    <div>
        <table BORDER=5 CELLPADDING=10 CELLSPACING=10 >
            <tr>
                <th>Titre</th>
                <th>Contenu</th>
                <th>Auteur</th>
                <th>Date de création</th>
            </tr>
<?php while($donnee = $req->fetch()){ ?>
            <tr>
                <td><?= $donnee['titre'] ?></td>
                <td><?= $donnee['contenu'] ?></td>
                <td><?= $donnee['auteur'] ?></td>
                <td><?= $donnee['date_ajout_fr'] ?></td>
                <td><a href="update.php?billet=<?= $donnee['id'] ?>"> Modifier </a></td>
                <td><a href="delete.php?billet=<?= $donnee['id'] ?>"> Supprimer </a></td>
            </tr>
<?php } ?>
        </table>
    </div>

    <h3>Nouveau billet</h3>
    <form action="creation.php" method="post">
        <p><input type="text" name="auteur" placeholder="auteur" id=""></p>
        <p><input type="text" name="titre" placeholder="titre"></p>
        <P><textarea name="contenu" placeholder="Tapez votre texte" id="" cols="30" rows="10"></textarea></p>
        <button type="submit">Envoyer</button>

    </form>
    
</body>
</html>