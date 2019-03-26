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

//recuperer les donnees de la table
$req = $bdd->prepare('SELECT id, titre, auteur, contenu, DATE_FORMAT(date_ajout, \'%d/%m/%Y à %Hh%imin\') 
AS date_ajout_fr
FROM billet ORDER BY id DESC');
$req->execute();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>READ</title>
</head>
<body>
    <header>
    <h1>Billet simple pour l'Alaska</h1>
    </header>
    
<?php while($donnee = $req->fetch()){ ?>
    <div>
        <h2><?= htmlspecialchars($donnee['titre']) ?></h2>
        <p><?= htmlspecialchars($donnee['contenu'])?></p>
        <p>De <?= htmlspecialchars($donnee['auteur']) ?>, le <?= htmlspecialchars($donnee['date_ajout_fr']) ?> </p>
    </div>
<?php } ?>
</body>
</html>