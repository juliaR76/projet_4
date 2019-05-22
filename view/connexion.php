<!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
            <?php if(isset($erreur)){ echo $erreur;} ?>
                <form action="index.php?action=connexion" method="post" name="sentMessage" id="contactForm" novalidate>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>Pseudo</label>
                            <input type="text" name="pseudo" class="form-control" placeholder="Pseudo" id="pseudo" >
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>Mot de pass</label>
                            <input type="password" name="pass" class="form-control" placeholder="Mot de pass" id="pass">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <br>
                    <div id="success"></div>
                        <div class="form-group">
                        <a href="index.php?action=connexion"><button type="submit" name="connecter" class="btn btn-dark">Connecter</button></a>
                        </div>
                </form>
            </div>
        </div>
    </div>

    <hr>
