<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include_once 'models/database.php';
include_once 'models/usersModel.php';
include_once 'models/exploitationsModel.php';
include_once 'models/hauliersModel.php';
include_once 'models/communesModel.php';
include_once 'models/trucksModel.php';
include_once 'controllers/profilUserController.php';
include 'header.php';
?>
<?php 
if (!isset($_SESSION['lastName'])){
      header ('location: connexion.php');
      exit;
}
?>
<hr class="hr"/>
<div class="row idUser">
    <div class="col-xs-12 col-lg-2 col-sm-2 col-md-2 ">
        <img src="assets/img/img_profil_user/orange.jpg" alt="" class="img-responsive">
    </div>
    <div class="col-xs-10 col-lg-10 col-md-10">
        <form action="#" method="POST" class="form-horizontal">
            <fieldset>
                <legend>Modifier les informations de l'utilisateur</legend>
                <div class="form-group ">
                    <label for="lastName" class="col-lg-2 control-label <?= isset($formError['lastName']) ? 'inputError' : '' ?>">Prénom</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="lastName" value="<?= $usersList->lastName ?>" placeholder="Prénom" />

                    </div>
                </div>              
                <div class="form-group ">
                    <label for="firstName" class="col-lg-2 control-label <?= isset($formError['firstName']) ? 'inputError' : '' ?>">Nom</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="firstName" value="<?= $usersList->firstName ?>" placeholder="Nom" />
                    </div>
                </div>
                <div class="form-group ">
                    <label for="telephone" class="col-lg-2 control-label <?= isset($formError['phoneNumber']) ? 'inputError' : '' ?>">Téléphone</label>
                    <div class="col-lg-10">
                        <input type="tel" class="form-control" name="phoneNumber" value="<?= $usersList->phoneNumber ?>" placeholder="Téléphone" />
                    </div>
                </div>
                <div class="form-group ">
                    <label for="email" class="col-lg-2 control-label <?= isset($formError['email']) ? 'inputError' : '' ?>">Adresse email</label>
                    <div class="col-lg-10">
                        <input type="email" class="form-control" name="email" value="<?= $usersList->email ?>" placeholder="Email" />
                    </div>
                </div>


                <div class="form-group">
                    <label for="idCommunes" class="col-lg-2 control-label <?= isset($formError['communeName']) ? 'inputError' : '' ?>">Communes</label>
                    <div class="col-lg-10">
                        <select name="idCommunes" class="form-control" id="select">
                            <option disabled selected>Choisissez votre commune</option>
                            <?php foreach ($communesList as $commune) { ?>
                                Avec le foreach j'affiche dans le select la liste de mes communes y compris avec les ajouts automatiques
                                <option value="<?= $commune->id ?>"><?= $commune->name ?> </option>
                            <?php } ?>                
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <p><input name="modifyUser" type="submit" value="Valider" /></p>
                    </div>
                </div>
            </fieldset>
        </form>

    </div>
    <p class="formValid">
        <?php
        //Si l'envoi des infos est réussi, on anvoie un message
        if ($insertSuccess) {
            echo 'Envoi réussi !';
        }
        ?>
    </p>
    <div>
        <?php foreach ($formError as $Error) { ?>
            <!--Sinon un message d'erreur-->
            <p><?= $Error ?></p>
        <?php } ?>
    </div>
</div>

<hr class="hr1"/>

<div class="row modal1">
    <div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12   modal2">
        <!-- Trigger the modal with a button -->
        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Modification du mot de passe</button>
        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <!--                        <h4 class="modal-title">Modal Header</h4>-->
                    </div>
                    <div class="modal-body">
                        <form action="#" method="POST" class="form-horizontal form1">
                            <fieldset>
                                <legend>Modification du mot de passe</legend>
                                <div class="form-group <?= isset($formError['modifyPassword']) ? 'has-error' : '' ?>">
                                    <label for="modifyPassword" class="col-lg-2 control-label <?= isset($formError['modifyPassword']) ? 'inputError' : '' ?>">Mot de passe</label>
                                    <div class="col-lg-10">
                                        <input type="password" class="form-control" name="modifyPassword" value="<?= !empty($_POST['modifyPassword']) ? $_POST['modifyPassword'] : '' ?>" placeholder="Mot de passe" />
                                    </div>
                                </div>
                                <div class="form-group <?= isset($formError['passwordConfirm']) ? 'has-error' : '' ?>">
                                    <label for="passwordConfirm" class="col-lg-2 control-label <?= isset($formError['passwordConfirm']) ? 'inputError' : '' ?>">Confirmez le mot de passe</label>
                                    <div class="col-lg-10">
                                        <input type="password" class="form-control" name="passwordConfirm" value="<?= !empty($_POST['passwordConfirm']) ? $_POST['passwordConfirm'] : '' ?>" placeholder="Confirmation de mot de passe" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-10 col-lg-offset-2">
                                        <p><input name="modifyPasswordValidate" type="submit" value="Valider" /></p>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<hr class="hr1"/>

<div class="row activity">
    <div class="col-xs-12 col-lg-2 col-sm-2 col-md-2 ">
        <img src="assets/img/img_profil_user/coq.jpg" alt="" class="img-responsive">
    </div>
    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
        <h4>Liste des exploitations</h4>
        <table border="2" class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Nom de l'exploitation</th>                   
                    <th>Voir les exploitations</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($exploitationsList as $exploitation) { ?>
                    <tr class="info">
                        <td><?= $exploitation->name; ?></td>                       
                        <td><a class="btn btn-secondary" href="profil-exploitation.php?id=<?= $exploitation->id; ?>">Voir l'exploitation</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="col-xs-12 col-lg-5 col-sm-5 col-md-5">
        <h4>Liste des sociétés de transport</h4>
        <table border="2" class="table table-striped table-hover">
            <thead>
                <tr>                   
                    <th>Nom de la société</th>
                    <th>Voir la société</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($hauliersList as $haulier) { ?>
                    <tr class="info">
                        <td><?= $haulier->name; ?></td>
                        <td><a class="btn btn-secondary" href="profil-transporteur.php?id=<?= $haulier->id; ?>">Voir les infos</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<hr class="hr"/>
<div class="row activity">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <h4>Liste et spécificités des camions</h4>
        <table border="2" class="table table-striped table-hover">
            <thead>
                <tr>                   
                    <th>Nom du camion</th>
                    <th>Type de camion</th>
                    <th>Nom de la commune</th>
                    <th>Voir les camions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($trucksList as $trucks) { ?>
                    <tr class="info">
                        <td><?= $trucks->carBrand; ?></td>
                        <td><?= $trucks->volume; ?></td>
                        <td><?= $trucks->communeName; ?></td>
                        <td><a class="btn btn-secondary" href="profil-camion.php?id=<?= $trucks->id; ?>">Voir les camions</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<hr class="hr"/>
<div class="row present" >
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <h4 class="text-left">Présentation de mes activités</h4>
        <form>
            <div class="form-group ">
                <label for="textArea" class="col-lg-2 control-label"></label>
                <div class="col-lg-10">
                    <textarea class="form-control" rows="3" id="textArea"></textarea>
                    <span class="help-block">Decrivez en quelques mots vos activités.</span>
                </div>
            </div>
        </form>
    </div>
</div>
<hr class="hr1"/>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
        <form action="#" method="POST" >
            <button name="deleteUserProfil" type="submit" value="Valider" class="btn btn-info btn-lg">Suppression du profil d'utilisateur</button> 
        </form>
    </div>
</div>
<hr class="hr1"/>
<?php include 'footer.php'; ?>  

