<?php
session_start();

require("model/Billet.php");
require("model/BilletManager.php");
require("model/Commentaire.php");
require("model/CommentaireManager.php");
require("model/Member.php");
require("model/MemberManager.php");
require('controller/frontEnd.php');
require('controller/backEnd.php');



if(empty($_SERVER['QUERY_STRING']))
{
    
    home();
    
    
}else
{
    if (isset($_GET['action']))
    {
        if($_GET['action'] == 'billets')
        {  
                billets();
            
        }
        elseif($_GET['action'] == 'post')
        {
            if(isset($_GET['billet']) AND ($_GET['billet'] >= 50) AND ($_GET['billet'] <= 100) ){
                post();
            }else{
                erreur();
            }
            
            

        }
        elseif($_GET['action'] == 'connexion')
        {
            connexion();       
        }
        elseif($_GET['action'] == 'contact')
        {
            contact();
        }
        elseif($_GET['action'] == 'creation')
        {   
            
            creation();
            
        }
        elseif($_GET['action'] == 'afficheBillet')
        {
            afficheBillet();
        }
        elseif($_GET['action'] == 'update')
        {
            update();

        }
        elseif($_GET['action'] == 'commentaire')
        {
            
                commentaire();
            
        }
        elseif($_GET['action'] == 'delete')
        {
            delete();

        }
        elseif($_GET['action'] == 'inscription')
        {
            inscription();

        }
        elseif($_GET['action'] == 'deconnexion')
        {
            deconnexion();

        }elseif($_GET['action'] == 'erreur')
        {
            erreur();
        }else{
            erreur();
        }    
    }
    else
    {
        header('location: index.php?action=erreur');
    }
}




