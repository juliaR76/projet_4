<?php

require("model/Member.php");
require("model/MemberManager.php");


// ajout membre

if(!empty($_POST)){

    $user = new Member([
        'pseudo' => $_POST['pseudo'],
        'pass' => password_hash($_POST['pass'], PASSWORD_DEFAULT),
        'email' => $_POST['email']
    ]);

    $memberManager = new MemberManager;
    $member = $memberManager->add($user);
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
    <h2>Inscription</h2>
        <form action="inscription.php" method="post">
                <p>Pseudo: <input id="pseudo" type="text" name="pseudo"placeholder="pseudo"></p>
                <p>Mot de passe: <input type="password" name="pass" placeholder="mot de passe"></p>
                <p>confirmer: <input id ="confirm" type="password" name="confimation_pass" placeholder="confirmer mot de passe"></p>
                <p>Email: <input id="email" type="email" name="email" placeholder="email"></p>
                <p><a href="connexion.php"><button type="submit">Envoyer</button></a></p>
        </form>
</body>
</html>