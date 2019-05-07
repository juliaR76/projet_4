<?php


function home(){

    // recupere les billets

    $billetManager = new BilletManager; 
    $billet = $billetManager->getDate();


    //compter les commentaire


    // $commentaireManager = new CommentaireManager;
    // $nbCommentaire = $commentaireManager->count($_GET['id']);
    // var_dump($nbCommentaire);

    $title = 'Billet simple pour l\'Alaska';

    require('view/home.php');

}

function billets()
{

    // recupere tout les billets
    
    $billetManager = new BilletManager;
    $billets = $billetManager->getList();
    $title = 'Tout vos épisodes !';

    require('view/billets.php');

}

function post()
{
    // signaler 

    if(isset($_GET['confirm']) AND !empty($_GET['confirm'])) {
        $commentaireManager = new CommentaireManager;
        $commentaire = $commentaireManager->signal($_GET['confirm']);
    }
    
  // inserer des commentaire
  
    if(!empty($_POST)){ 
        $commentaire = new Commentaire ([
            "id_billet" => $_GET['billet'],
            "auteur" => $_POST['auteur'],
            "comment" => $_POST['comment']
        ]);
        
        $commentaireManager = new CommentaireManager;
        $commentaire = $commentaireManager->add($commentaire);
    }
  
    //recupere les commentaires
    
    $commentaireManager = new CommentaireManager;
    $commentaires = $commentaireManager->get($_GET['billet']);
    
    //recupere les  billets
    
    $billetManager = new BilletManager; 
    $billet = $billetManager->get($_GET['billet']);

    $title =  htmlspecialchars($billet->titre());

    require('view/post.php');

}

function connexion()
{
    session_start();

    if(!empty($_POST)){

        $memberManager = new MemberManager;
        $member = $memberManager->get($_POST['pseudo']);
    
    
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

    $title = "Se Connecter";
    require('view/connexion.php');
}

function contact()
{
    $title = "Contactez-moi";
    require('view/contact.php');
}



