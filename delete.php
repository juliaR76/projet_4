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


//supprimer la donnes en rapport avec l'id
$req = $bdd->prepare('DELETE FROM billet WHERE id = :id');
$req->execute([
    "id" => $_GET['billet'],
]);

?>