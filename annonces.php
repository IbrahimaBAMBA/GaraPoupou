<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<?php
if (!isset($_SESSION['lastName'])) {
    header('location: connexion.php');
    exit;
}
?>
<?php
include 'header.php';
include_once 'models/database.php';
include_once 'models/exploitationsModel.php';
include_once 'models/hauliersModel.php';
include_once 'models/productsDetailsModel.php';
include_once 'models/trucksModel.php';
include_once 'models/communesModel.php';
include_once 'controllers/annonceController.php';
?>



<div class="row">
    <form class="form-horizontal well col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1" action="#" method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>Votre annonce !</legend>
            <div class="form-group ">
                <label for="" class="col-lg-2 control-label">Catégories</label>
                <div class="col-lg-10">
                    <select id="categorie" class="form-control">
                        <option disabled selected>Choisissez une catégorie</option>
                        <option id="trucks" value="trucks">Camions</option>
                        <option id="exploitations" value="exploitations">Exploitations</option>
                        <option id="pDetails" value="productsDetails">Produits</option>
                        <option id="hauliers" value="hauliers">Transporteurs</option>
                    </select>
                </div>
            </div>
            <!--            section trucks, formulaire destinée aux camions et qui est hide par defauts et que je show au click-->
            <div class = "trucks">
                <div class="form-group <?= isset($formError['name']) ? 'has-error' : '' ?>">
                    <label for="name" class="col-lg-2 control-label">Nom du véhicule</label>
                    <div class="col-lg-10">
                        <!--                    Ici on fait en sorte de garder la valeur du champs même si on se trompe , au lieu de tout rettapper -->
                        <input type="text" class="form-control" name="name" value="<?= !empty($_POST['name']) ? $_POST['name'] : '' ?>" placeholder="Nom du véhicule" />
                    </div>
                </div>
                <div class="form-group <?= isset($formError['volume']) ? 'has-error' : '' ?>">
                    <label for="volume" class="col-lg-2 control-label <?= isset($formError['volume']) ? 'inputError' : '' ?>">Capacité du véhicule</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="volume" value="<?= !empty($_POST['volume']) ? $_POST['volume'] : '' ?>" placeholder="Capacité du véhicule" />
                    </div>                  
                </div>
                <div class="form-group">
                    <label for="monImage" class="col-lg-2 control-label ">Image à télécharger</label>
                    <div class="col-lg-10">
                        <input type="hidden" name="MAX_FILE_SIZE" value="500000" />
                        <input type="file" name="monImage" id="fileToUpload">
                    </div>
                </div>
                <div class="form-group ">
                    <label for="textArea" class="col-lg-2 control-label"></label>
                    <div class="col-lg-10">
                        <textarea class="form-control" rows="3" id="textArea"></textarea>
                        <span class="help-block">Decrivez en quelques mots vos activités.</span>
                    </div>
                </div>
            </div>
            <!--            informations pour les camions-->
            <!--            section exploitation, formulaire destinée aux exploitations et qui est hide par defauts et que je show au click-->
            <div class = "exploitations">
                <div class="form-group <?= isset($formError['name']) ? 'has-error' : '' ?>">
                    <label for="name" class="col-lg-2 control-label <?= isset($formError['name']) ? 'inputError' : '' ?>">Nom de votre entité</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="name" value="<?= !empty($_POST['name']) ? $_POST['name'] : '' ?>" placeholder="Nom de votre entité" />
                    </div>
                </div>
                <div class="form-group <?= isset($formError['phoneNumber']) ? 'has-error' : '' ?>">
                    <label for="phoneNumber" class="col-lg-2 control-label <?= isset($formError['phoneNumber']) ? 'inputError' : '' ?>">Téléphone</label>
                    <div class="col-lg-10">
                        <input type="tel" class="form-control" name="phoneNumber" value="<?= !empty($_POST['phoneNumber']) ? $_POST['phoneNumber'] : '' ?>" placeholder="Téléphone" />
                    </div>
                </div>
            </div>
            <!--            informations pour les exploitations-->
            <!--            section produit, formulaire destinée aux produits et qui est hide par defauts et que je show au click-->
            <div class = "pDetails">
                <div class="form-group <?= isset($formError['name']) ? 'has-error' : '' ?>">
                    <label for="name" class="col-lg-2 control-label <?= isset($formError['name']) ? 'inputError' : '' ?>">Nom du produit</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="name" value="<?= !empty($_POST['name']) ? $_POST['name'] : '' ?>" placeholder="Nom du produit" />
                    </div>
                </div>
                <div class="form-group <?= isset($formError['publicationDate']) ? 'has-error' : '' ?>">
                    <label for="publicationDate" class="col-lg-2 control-label <?= isset($formError['publicationDate']) ? 'inputError' : '' ?>">Date de publication</label>
                    <div class="col-lg-10">
                        <input type="datetime" class="form-control" name="publicationDate" value="<?= !empty($_POST['publicationDate']) ? $_POST['publicationDate'] : '' ?>" placeholder="Date de publication" />
                    </div>                  
                </div>
            </div>
            <!--informations pour les produits-->
            <!--            section transporteur, formulaire destinée aux transporteurs et qui est hide par defauts et que je show au click-->
            <div class = "hauliers">
                <div class="form-group <?= isset($formError['name']) ? 'has-error' : '' ?>">
                    <label for="name" class="col-lg-2 control-label <?= isset($formError['name']) ? 'inputError' : '' ?>">Nom de transporteur</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="name" value="<?= !empty($_POST['name']) ? $_POST['name'] : '' ?>" placeholder="Nom de transporteur" />
                    </div>
                </div>
                <div class="form-group <?= isset($formError['phoneNumber']) ? 'has-error' : '' ?>">
                    <label for="phoneNumber" class="col-lg-2 control-label <?= isset($formError['phoneNumber']) ? 'inputError' : '' ?>">Téléphone</label>
                    <div class="col-lg-10">
                        <input type="tel" class="form-control" name="phoneNumber" value="<?= !empty($_POST['phoneNumber']) ? $_POST['phoneNumber'] : '' ?>" placeholder="Téléphone" />
                    </div>
                </div>
            </div>
            <!--            informations pour les transporteurs-->
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
                    <button type="submit" value="Upload Image" class="btn btn-primary" name="submit">Valider</button>
                </div>
            </div>
        </fieldset>
    </form>
</div>
<?php include 'footer.php'; ?> 
