<?php


// ajouter un nouveau billet

function creation(){

    if(!empty($_POST)){ 
        $billet = new Billet([
            "titre" => $_POST['titre'],
            "auteur" => $_POST['auteur'],
            "contenu" => $_POST['contenu']
        ]);
        
        $billetManager = new BilletManager;
        $billetManager->add($billet);
        
        }
    
    require('view/creation.php');
}

//afficher en admin tout les billets

function afficheBillet(){
    $billetManager = new BilletManager;
    $billets = $billetManager->getList();
    $title = "Billet simple pour l'Alaska";
    $sousTitre = "Admin";

    require('view/creation.php');
}

function update()
{
    //recupere les donnees de la table
    $billetManager = new BilletManager;
    $billet = $billetManager->get($_GET['billet']);

    //modifier le billet

    if(!empty($_POST)){ 
        $billet = new Billet([
            "id"=> $_GET['billet'],
            "titre" => $_POST['titre'],
            "contenu" => $_POST['contenu']
        ]);
        
        $billetManager = new BilletManager;
        $billetManager->update($billet);    
    }

    $title = "Billet simple pour l'Alaska";
    $sousTitre = "Admin";

    require('view/update.php');
}

//supprimer en admin le(s) billet(s) ou le(s) commentaire(s)

function delete(){

    //recupere les donnees de la table billet

    $billetManager = new BilletManager;
    $billet = $billetManager->getList();

    //supprimer le billet en rapport avec l'id

    $billet = new BilletManager;
    $billet = $billetManager->delete($_GET['billet']);

    //recuper les donnees de table commentaire

    $commentaireManager = new CommentaireManager;
    $commentaires = $commentaireManager->get($_GET['billet']);

    //supprimer le commentaire en rapport avec l'id

    $commentaireManager = new CommentaireManager;
    $commentaires = $commentaireManager->delete($_GET['billet']);

    $title = "Billet simple pour l'Alaska";
    $sousTitre = "Admin";

    require('view/delete.php');
}

function commentaire(){

    //moderation de commentaire
    if(isset($_GET['confirm']) AND !empty($_GET['confirm'])) {
        $commentaireManager = new CommentaireManager;
        $commentaire = $commentaireManager->valider($_GET['confirm']);
      }
      
      //recupere le billet
      $billetManager = new BilletManager; 
      $billet = $billetManager->get($_GET['billet']);
      
      //recupere les commentaires du billet
      if(empty($_POST)){
        
        $commentaireManager = new CommentaireManager;
        $commentaires = $commentaireManager->get($_GET['billet']);
      }else{
          echo "Pas de commentaire pour ce billet";
      }
      $title = "Billet simple pour l'Alaska";
        $sousTitre = "Admin";

    require('view/commentaire.php');
      
}