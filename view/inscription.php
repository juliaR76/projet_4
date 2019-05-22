<!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
            <?php if(isset($erreur)){ echo $erreur;} ?>
                <form action="index.php?action=inscription" method="post" name="sentMessage" id="contactForm" novalidate>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>Pseudo</label>
                            <input type="text" name="pseudo" class="form-control" placeholder="Pseudo" id="pseudo" value="<?php if(isset($pseudo)){ echo $pseudo; } ?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>Mot de pass</label>
                            <input type="password" name="pass" placeholder="mot de passe" class="form-control" id="pass">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>Confirmer votre mot de pass</label>
                            <input type="password" name="confirmationPass" placeholder="confirmer mot de passe" class="form-control" id="pass">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Email" id="Email" value="<?php if(isset($email)){ echo $email; } ?>">
                        </div>
                    </div>
                    <br>
                    <div id="success"></div>
                        <div class="form-group">
                        <a href="index.php?action=connexion"><button type="submit" name="creerCompte" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Créer un compte</button></a>
                        </div>
                </form>
            </div>
        </div>
    </div>
