<?php


require("model/Billet.php");
require("model/BilletManager.php");
require("model/Commentaire.php");
require("model/CommentaireManager.php");
require("model/Member.php");
require("model/MemberManager.php");
require('controller/frontEnd.php');

if(empty($_SERVER['QUERY_STRING']))
{
    home();
}else{
    if (isset($_GET['action'])) {
        if($_GET['action'] == 'billets')
        {
            billets();
        }
        elseif($_GET['action'] == 'post')
        {
            post();
        }
        elseif($_GET['action'] == 'connexion')
        {
            connexion();
        }
        elseif($_GET['action'] == 'contact')
        {
            contact();
        }

    }
}

