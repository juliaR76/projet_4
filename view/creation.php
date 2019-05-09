<?php 

ob_start(); 
?>

    <div class="container">
        <a href="index.php">Retour au site</a>
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <h2>Billet(s) publié(s)</h2>
                <br/>
                <table class="table table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col">Titre</th>
                        <th scope="col">Contenu</th>
                        <th scope="col">Auteur</th>
                        <th scope="col">Date</th>
                        <th scope="col">Commentaire</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
<?php foreach ($billets as $billet) { ?>
                        <tr>
                            <td><?= $billet->titre() ?></td>
                            <td class="contenu_billet"><?= substr($billet->contenu(),0,25) ?></td>
                            <td><?= $billet->auteur() ?></td>
                            <td><?= $billet->date_ajout() ?></td>
                            <td><i class="far fa-comment-alt"></i><a href="index.php?action=commentaire&billet=<?= $billet->id() ?>"> Voir </a></td>
                            <td><a href="index.php?action=update&billet=<?= $billet->id() ?>"> Modifier </a></td>
                            <td><a href="index.php?action=delete&billet=<?= $billet->id() ?>"> Supprimer </a></td>
                        </tr>
                    </tbody>
<?php }?>
                </table>
            </div>
        </div>
    </div> 
    <hr> 

    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <h2>Nouveau Billet</h2>
                <br/>
                <form action="index.php?action=creation" method="post">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Auteur</label>
                        <input type="text" class="form-control" name="auteur" placeholder="Auteur">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Titre</label>
                        <input type="text" class="form-control" name="titre" placeholder="Titre">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Corps de texte</label>
                        <textarea class="form-control" name="contenu" rows="10"></textarea>
                    </div>
                    <a href="index.php?action=creation"><button type="submit" class="btn btn-dark">Publier</button></a>
                </form>
            </div>  
        </div>
    </div>
    

<?php $content = ob_get_clean(); ?>
<?php require_once('template.php'); ?>
