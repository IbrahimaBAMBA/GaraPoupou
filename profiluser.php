<?php
include 'header.php';
include_once 'models/database.php';
include_once 'models/usersModel.php';
include_once 'models/exploitationsModel.php';
include_once 'models/hauliersModel.php';
include_once 'models/communesModel.php';
include_once 'models/trucksModel.php';
include_once 'controllers/profilUserController.php';
?>
<hr class="hr"/>
<div class="row idUser">
    <div class="col-xs-12 col-lg-2 col-sm-2 col-md-2 ">
        <img src="assets/img/img_profil_user/orange.jpg" alt="" class="img-responsive">
    </div>
    <div class="col-xs-10 col-lg-10 col-md-10">
        <form class="form-horizontal">
            <fieldset>
                <legend>Profil/.../</legend>
                <div class="form-group">
                    <label for="lastName" class="col-lg-2 control-label <?= isset($formError['lastName']) ? 'inputError' : '' ?>">Prénom : </label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="lastName" value="<?= $userDetails->lastName ?>" placeholder="Prénom" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="firstName" class="col-lg-2 control-label <?= isset($formError['firstName']) ? 'inputError' : '' ?>">Nom : </label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="lastName" value="<?= $userDetails->firstName ?>" placeholder="Nom" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="telephone" class="col-lg-2 control-label <?= isset($formError['phoneNumber']) ? 'inputError' : '' ?>">Téléphone : </label>
                    <div class="col-lg-10">
                        <input type="tel" class="form-control" name="telephone" value="<?= $userDetails->phoneNumber ?>" placeholder="Téléphone" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-lg-2 control-label <?= isset($formError['email']) ? 'inputError' : '' ?>">Adresse email : </label>
                    <div class="col-lg-10">
                        <input type="email" class="form-control" name="email" value="<?= $userDetails->email ?>" placeholder="Email" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="idCommunes" class="col-lg-2 control-label <?= isset($formError['communeName']) ? 'inputError' : '' ?>">Communes : </label>
                    <div class="col-lg-10">
                        <select name="idCommunes" class="form-control" id="select">

                            <option disabled selected>Choisissez votre commune</option>
                            <?php foreach ($communesList as $commune) { ?>
                                <!--Avec le foreach j'affiche dans le select la liste de mes communes y compris avec les ajouts automatiques-->
                                <option value="<?= $commune->id ?>"><?= $commune->name ?> </option>
                            <?php } ?>                
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <button type="reset" class="btn btn-default">Modifier</button>
                        <button type="submit" class="btn btn-default">Envoyer</button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>
<hr class="hr"/>
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
        <h4>Liste des camions</h4>
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
<?php include 'footer.php'; ?>  

