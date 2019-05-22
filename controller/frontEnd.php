<?php


function home(){

    $billetManager = new BilletManager; 
    $billet = $billetManager->getDate();
    
    $title = 'Billet simple pour l\'Alaska';
    $sousTitre = "de Jean Forteroche";
    ob_start();
    require('view/home.php');
    $content = ob_get_clean(); 
    require('template.php');
    
}

function billets()
{
   
    // recupere tout les billets
    
    $billetManager = new BilletManager;
    $billets = $billetManager->getList();

    $title = 'Tout vos épisodes !';
    $sousTitre = ' de Jean Forteroche';
    ob_start();
    require('view/billets.php');
    $content = ob_get_clean(); 
    require('template.php');
}

function post()
{
    // signaler 

    if(isset($_GET['confirm']) AND !empty($_GET['confirm'])) {
        $commentaireManager = new CommentaireManager;
        $commentaire = $commentaireManager->signal($_GET['confirm']);
        header ("Location: $_SERVER[HTTP_REFERER]" );
    }
    
  // inserer des commentaire
  
    if(isset($_POST['publier'])){
        if(!empty($_POST['auteur']) AND !empty($_POST['comment']))
        { 
            $commentaire = new Commentaire ([
                "id_billet" => $_GET['billet'],
                "auteur" => $_POST['auteur'],
                "comment" => $_POST['comment']
            ]);
            
            $commentaireManager = new CommentaireManager;
            $commentaire = $commentaireManager->add($commentaire);
        }else
        {
            $erreur ='<html>
                        <body>
                            <div class="alert alert-danger" role="alert">
                                Attention de bien remplir tout les champs de votre commentaire !
                            </div>
                        </body>
                        </html>';
        }
    }
  
    //recupere les commentaires
    
    $commentaireManager = new CommentaireManager;
    $commentaires = $commentaireManager->get($_GET['billet']);
   
    //recupere les  billets
    
    $billetManager = new BilletManager; 
    $billet = $billetManager->get($_GET['billet']);

    $title =  htmlspecialchars($billet->titre());
    $sousTitre = htmlspecialchars($billet->auteur());
    ob_start();
    require('view/post.php');
    $content = ob_get_clean(); 
    require('template.php');
}

function inscription()
{
    if(isset($_POST['creerCompte']))
    {
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $pass = sha1($_POST['pass']);
        $confirmationPass = sha1($_POST['confirmationPass']);
        $email = htmlspecialchars($_POST['email']);

        if(!empty($_POST['pseudo']) AND !empty($_POST['pass']) AND !empty($_POST['confirmationPass']) AND !empty($_POST['email']))
        {
            if($_POST['pass'] == $_POST['confirmationPass'])
            {
                if(filter_var($email, FILTER_VALIDATE_EMAIL))
                {
                    $user = new Member([
                    'pseudo' => $_POST['pseudo'],
                    'pass' => sha1($_POST['pass']),
                    'email' => $_POST['email']
                    ]);
                    $memberManager = new MemberManager;
                    $member = $memberManager->add($user);
                    header('location: index.php?action=connexion');
                }
                else
                {
                    $erreur ='<html>
                    <body>
                        <div class="alert alert-danger" role="alert">
                            Votre email est invalide!
                        </div>
                    </body>
                    </html>'; 
                }
            }
            else
            {
                $erreur ='<html>
                        <body>
                            <div class="alert alert-danger" role="alert">
                                Vos mots de pass ne corresponde pas!
                            </div>
                        </body>
                        </html>';
            }
        }
        else
            {
                $erreur ='<html>
                        <body>
                            <div class="alert alert-danger" role="alert">
                                Attention de bien remplir tout les champs !
                            </div>
                        </body>
                        </html>';
            }         
    }

    $title = "Inscrivez-vous";
    $sousTitre ="";
    ob_start();
    require('view/inscription.php');
    $content = ob_get_clean(); 
    require('template.php');
}

function connexion()
{
    
    if(isset($_POST['connecter']))
    {
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $pass = sha1($_POST['pass']);

            if(!empty($_POST['pseudo']) AND !empty($_POST['pass']))
            {
                $memberManager = new MemberManager;
                $member = $memberManager->get($_POST['pseudo'], sha1($_POST['pass']));
                $_SESSION['pseudo'] = $_POST['pseudo'];   
            } 
            else
            {
                $erreur ='<html>
                        <body>
                            <div class="alert alert-danger" role="alert">
                                Attention de bien remplir tout les champs!
                            </div>
                        </body>
                        </html>';                       
            }    
    }
 
    $title = "Se Connecter";
    $sousTitre ="";
    ob_start();
    require('view/connexion.php');
    $content = ob_get_clean(); 
    require('template.php');     
}


