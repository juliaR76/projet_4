<!-- Main Content -->

<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
        <?php if(isset($erreur)){ echo $erreur;} ?>
            <form method="POST" action = ""  id="contactForm" novalidate>
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                        <label>Nom</label>
                        <input type="text" name="nom" class="form-control" placeholder="Nom" id="Nom" value="<?php if(isset($_POST['nom'])){ echo $_POST['nom']; } ?>">
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Email" id="email"value="<?php if(isset($_POST['email'])){ echo $_POST['email']; } ?>">
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                        <label>Message</label>
                        <textarea rows="5" type="text" name="message" class="form-control" placeholder="Message" id="mytextarea"><?php if(isset($_POST['message'])){ echo $_POST['message']; } ?></textarea>
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <br>
                <div id="success"></div>
                    <div class="form-group">
                        <button type="submit" name="envoyerMail" id="sendMessageButton" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Envoyer</button>
                    </div>
            </form>
        </div>
    </div>
</div>
<hr>
