
<?php ob_start(); ?>

<!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <form action="connexion.php" method="post" name="sentMessage" id="contactForm" novalidate>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>Pseudo</label>
                            <input type="text" class="form-control" placeholder="Pseudo" id="pseudo" required data-validation-required-message="Veuillez saisir votre Pseudo.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>Mot de pass</label>
                            <input type="password" class="form-control" placeholder="Mot de pass" id="pass" required data-validation-required-message="Veuillez saisir votre mot de pass.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <br>
                    <div id="success"></div>
                        <div class="form-group">
                        <button class="btn btn-primary"><a href="creation.php">Connecter</a></button>
                        </div>
                </form>
            </div>
        </div>
    </div>

    <hr>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>