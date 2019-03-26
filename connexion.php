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
<html>
<head>
    <meta charset="utf-8">
    <title>Espace membre</title>
    <link href="style.css" rel="stylesheet">
    
<body>

    <h1>Espace membres</h1>
    <h2>Connexion</h2>
        <form action="connexion.php" method="post">
                <p>Pseudo: <input id="pseudo" type="text" name="pseudo"placeholder="pseudo"></p>
                <p>Mot de passe: <input id="mdp" type="password" name="pass" placeholder="mot de passe"></p>
                <p>Connexion automatique<input type="checkbox" name="connexion_auto"></p>
                <p><button type="submit"> <a href="creation.php">Connexion</a></button></p>
        </form>
</body>
</html>