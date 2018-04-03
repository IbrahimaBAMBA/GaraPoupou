<?php
include 'header.php';
include_once 'models/database.php';
include_once 'models/usersModel.php';
include_once 'models/communesModel.php';
include_once 'controllers/inscriptionController.php';
?>
<div class="row">
    <form class="form-horizontal well col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1" action="#" method="POST">
        <fieldset>
            <legend>Inscription</legend>
            <div class="form-group <?= isset($formError['lastName']) ? 'has-error' : '' ?>">
                <label for="lastName" class="col-lg-2 control-label">Prénom</label>
                <div class="col-lg-10">
<!--                    Ici on fait en sorte de garder la valeur du champs même si on se trompe , au lieu de tout rettapper -->
                    <input type="text" class="form-control" name="lastName" value="<?= !empty($_POST['lastName']) ? $_POST['lastName'] : '' ?>" placeholder="Prénom" />
                </div>
            </div>
            <div class="form-group <?= isset($formError['firstName']) ? 'has-error' : '' ?>">
                <label for="firstName" class="col-lg-2 control-label <?= isset($formError['firstName']) ? 'inputError' : '' ?>">Nom</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" name="firstName" value="<?= !empty($_POST['firstName']) ? $_POST['firstName'] : '' ?>" placeholder="Nom" />
                </div>
            </div>
            <div class="form-group <?= isset($formError['phoneNumber']) ? 'has-error' : '' ?>">
                <label for="phoneNumber" class="col-lg-2 control-label <?= isset($formError['phoneNumber']) ? 'inputError' : '' ?>">Numero de téléphone</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" name="phoneNumber" value="<?= !empty($_POST['phoneNumber']) ? $_POST['phoneNumber'] : '' ?>" placeholder="téléphone" />
                </div>
            </div>
            <div class="form-group <?= isset($formError['email']) ? 'has-error' : '' ?>">
                <label for="email" class="col-lg-2 control-label <?= isset($formError['email']) ? 'inputError' : '' ?>">Adresse email</label>
                <div class="col-lg-10">
                    <input type="email" class="form-control" name="email" value="<?= !empty($_POST['email']) ? $_POST['email'] : '' ?>" placeholder="Email" />
                </div>
            </div>
            <div class="form-group <?= isset($formError['password']) ? 'has-error' : '' ?>">
                <label for="password" class="col-lg-2 control-label <?= isset($formError['password']) ? 'inputError' : '' ?>">Mot de passe</label>
                <div class="col-lg-10">
                    <input type="password" class="form-control" name="password" value="<?= !empty($_POST['password']) ? $_POST['password'] : '' ?>" placeholder="Mot de passe" />
                </div>
            </div>
            <div class="form-group <?= isset($formError['passwordConfirm']) ? 'has-error' : '' ?>">
                <label for="passwordConfirm" class="col-lg-2 control-label <?= isset($formError['passwordConfirm']) ? 'inputError' : '' ?>">Confirmez le mot de passe</label>
                <div class="col-lg-10">
                    <input type="password" class="form-control" name="passwordConfirm" value="<?= !empty($_POST['passwordConfirm']) ? $_POST['passwordConfirm'] : '' ?>" placeholder="Confirmation de mot de passe" />
                </div>
            </div>
            <div class="form-group ">
                <label for="idCommunes" class="col-lg-2 control-label <?= isset($formError['idCommunes']) ? 'inputError' : '' ?>">Communes</label>
                <div class="col-lg-10">
                    <select name="idCommunes" class="form-control" id="select">
                        Avec le foreach j'affiche dans le select la liste de mes communes y compris avec les ajouts automatiques
                        <option disabled selected>Choisissez votre commune</option>
                        <?php foreach ($communesList as $communes) { ?>
                            <option value="<?= $communes->id ?>"><?= $communes->name ?> </option>
                        <?php } ?>                
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                    <button type="submit" class="btn btn-primary" name="submit">Valider</button>
                </div>
            </div>
        </fieldset>
    </form>
</div>
<?php include 'footer.php'; ?>