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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>UPDATE</title>
</head>
<body>
    <header>
    <h1>Billet simple pour l'Alaska</h1>
    </header>

<?php while($donnee = $req->fetch()){ ?>
    <div>
        <form action="update.php?billet=<?= $_GET['billet'] ?>" method="post">
            <p><input type="text" name="titre" placeholder="titre" value="<?= htmlspecialchars($donnee['titre']) ?>"></p>
            <P><textarea name="contenu" id="" cols="30" rows="10"><?= htmlspecialchars($donnee['contenu'])?></textarea></p>
            <p>De <?= htmlspecialchars($donnee['auteur']) ?>, le <?= htmlspecialchars($donnee['date_ajout_fr']) ?> </p>
            <button type="submit">Enregistrer</button>
        </form>       
    </div>
<?php } ?>
</body>
</html>


            