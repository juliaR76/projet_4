<?php



function creation(){

    //moderation de commentaire
    if(isset($_GET['confirm']) AND !empty($_GET['confirm']))
    {
        $commentaireManager = new CommentaireManager;
        $commentaire = $commentaireManager->valider($_GET['confirm']);
        header ("Location: $_SERVER[HTTP_REFERER]" );
    }


    $billetManager = new BilletManager;
    $billets = $billetManager->getList();

    
    $commentManager = new CommentaireManager;
    $commentaires = $commentManager->comList();

    
    // ajouter un nouveau billet

    if(isset($_POST['publier'])){
        if(!empty($_POST['auteur']) AND !empty($_POST['titre']) AND !empty($_POST['contenu']))
        {
        $billet = new Billet([
            "titre" => $_POST['titre'],
            "auteur" => $_POST['auteur'],
            "contenu" => $_POST['contenu']
        ]);
        
        $billetManager = new BilletManager;
        $billetManager->add($billet); 
        header('Refresh: 0'); 
        }else
        {
            $erreur ='<html>
                        <body>
                            <div class="alert alert-danger" role="alert">
                                Attention de bien remplir tout les champs de votre billet !
                            </div>
                        </body>
                        </html>';
            
        }  
    }

    $title = "Billet simple pour l'Alaska";
    $sousTitre = "Admin";
    ob_start();
    require('view/creation.php');
    $content = ob_get_clean(); 
    require('template.php');
}

function update()
{
    //recupere les donnees de la table
    $billetManager = new BilletManager;
    $billet = $billetManager->get($_GET['billet']);

    //modifier le billet
    if(isset($_POST['modifier']))
    {
        if(!empty($_POST['auteur']) AND !empty($_POST['titre']) AND !empty($_POST['contenu']))
        { 
            $billet = new Billet([
                "id"=> $_GET['billet'],
                "titre" => $_POST['titre'],
                "contenu" => $_POST['contenu']
            ]);
            
            $billetManager = new BilletManager;
            $billetManager->update($billet);  
            header('location: index.php?action=creation');  
        }else
        {
            $erreur ='<html>
                            <body>
                                <div class="alert alert-danger" role="alert">
                                    Attention de bien remplir tout les champs de votre billet !
                                </div>
                            </body>
                        </html>';
        }
    }

    $title = "Billet simple pour l'Alaska";
    $sousTitre = "Admin";
    ob_start();
    require('view/update.php');
    $content = ob_get_clean(); 
    require('template.php');
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

    ob_start();
    require('view/delete.php');
    $content = ob_get_clean(); 
    require('template.php');
}


function commentaire(){

      
      //recupere le billet
      $billetManager = new BilletManager; 
      $billet = $billetManager->get($_GET['billet']);
      
      
    if(empty($_POST))
    {    
        //recupere les commentaires du billet    
        $commentaireManager = new CommentaireManager;
        $commentaires = $commentaireManager->get($_GET['billet']);
    }else
    {
        echo "Pas de commentaire pour ce billet";
    }

    $title = "Billet simple pour l'Alaska";
    $sousTitre = "Admin";
    ob_start();
    require('view/commentaire.php');
    $content = ob_get_clean(); 
    require('template.php');     
}

//formulaire de contact

function contact(){
    
    if(isset($_POST['envoyerMail']))
    {
        if(!empty($_POST['nom']) AND !empty($_POST['email']) AND !empty($_POST['message']))
        {
            $header="MIME-version: 1.0\r\n";
            $header.='From:"PrimFX.com"<support@jeanf.com>'."\n";
            $header.='Content-Type:text/html; charset="utf-8"'."\n";
            $header.='Content-Transfer-Encoding: 8bit';

            $message=
                '<html>
                    <body>
                        <div align="center">   
                            <u>Nom de l\'expéditeur :</u>'.$_POST['nom'].'<br />
                            <u>Mail de l\'expéditeur :</u>'.$_POST['email'].'<br />
                            <br />
                            '.nl2br($_POST['message']).'
                        </div>
                    </body>
                </html>';

             mail("julia.ristic@gmail.com", "Contact - Mon site", $message, $header);
             echo "<script>window.alert(\"Votre message a bien été envoyé !\")</script>";
        }
        else
        {
            $erreur ='<html>
                        <body>
                            <div class="alert alert-danger" role="alert">
                                Attention de bien remplir tout les champs de votre billet !
                            </div>
                        </body>
                        </html>';
        }
    } 
    $title = "Contactez-moi";
    $sousTitre ="";
    ob_start();
    require('view/contact.php');
    $content = ob_get_clean(); 
    require('template.php');
}

function deconnexion()
{
    session_start();
    $_SESSION = array();
    session_destroy();
    header('location: index.php?action=connexion');
}

function erreur()
{
    $title = "ERREUR !";
    $sousTitre ="";
    ob_start();
    require('view/erreur.php');
    $content = ob_get_clean(); 
    require('template.php');
}