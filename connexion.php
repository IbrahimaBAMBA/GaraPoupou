<?php
include_once 'models/database.php';
include_once 'models/usersModel.php';
include_once 'controllers/connexionController.php';
include_once 'header.php';
?>
<form class="form-horizontal" action="#" method="POST">
    <?= isset($formError['connection']) ? $formError['connection'] : '' ?>
    <fieldset>
        <legend>Connexion</legend>
        <div class="form-group">
            <label for="email" class="col-lg-2 control-label <?= isset($formError['email']) ? 'inputError' : '' ?>">Email</label>
            <div class="col-lg-10">
                <input type="email" class="form-control" name="email" value="<?= $users->email ?>" placeholder="Email" />
            </div>
        </div>
        <?= isset($formError['email']) ? $formError['email'] : '' ?>
        <div class="form-group">
            <label for="password" class="col-lg-2 control-label <?= isset($formError['password']) ? 'inputError' : '' ?>">Mot de passe</label>
            <div class="col-lg-10">
                <input type="password" class="form-control" name="password" value="<?= $users->password ?>" placeholder="Mot de passe" />
            </div>
        </div>
        <?= isset($formError['password']) ? $formError['password'] : '' ?>
        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </fieldset>
</form>
<div class="row">
    <div class="col-sm-12">
        <p>Pas encore inscrit, inscrit toi <a href="inscription.php" >ICI</a></p>
        
    </div>
</div>
<?php include 'footer.php'; ?>

