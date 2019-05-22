    <div class="container">
        <a href="index.php">Retour au site</a>
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto table-responsive-sm">
                <h2>Billet(s) publié(s)</h2>
                <br/>
                
                <table class="table table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col">Titre</th>
                        <!-- <th scope="col">Contenu</th> -->
                        <th scope="col">Auteur</th>
                        <th scope="col">Date</th>
                        <th scope="col">Aperçu</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
<?php foreach ($billets as $billet) { ?>
                        <tr>
                            <td><?= $billet->titre() ?></td>
                            <!-- <td><?= substr($billet->contenu(),60,80) ?></td> -->
                            <td><?= $billet->auteur() ?></td>
                            <td><?= substr($billet->date_ajout(),0,10) ?></td>
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
                <h2>Commentaire(s) signalé(s) !</h2>
<?php foreach ($commentaires as $commentaire) : ?>
                <div class="card card-body">     
                    <p><strong><?= htmlspecialchars($commentaire->auteur()) ?></strong></p>
                    <p><?= htmlspecialchars($commentaire->comment()) ?></p> 
                    <p>le <?= $commentaire->date_comment() ?></p>
                    <?php if($commentaire->confirm() == 1) { ?>
                        <a href="index.php?action=commentaire&confirm=<?= $commentaire->id() ?>">Confirmer</a>
                        <a href="index.php?action=delete&billet=<?= $commentaire->id() ?>"> Supprimer </a>
                    <?php } ?>
                </div>
<?php endforeach  ?>
            </div>
        </div>
    </div>
    <hr>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
            <?php if(isset($erreur)){ echo $erreur;} ?>
                <h2>Nouveau Billet</h2>
                <br/>
                <form action="index.php?action=creation" method="post"> 
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Auteur</label>
                        <input type="text" class="form-control" name="auteur" placeholder="Auteur" value="<?= $_SESSION['pseudo'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Titre</label>
                        <input type="text" class="form-control" name="titre" placeholder="Titre">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Corps de texte</label>
                        <textarea id="myTextarea" class="form-control" name="contenu" rows="10"></textarea>
                    </div>
                    <a href="index.php?action=creation"><button  type="submit" name="publier" class="btn btn-dark">Publier</button></a>
                </form>
            </div>  
        </div>
    </div>
