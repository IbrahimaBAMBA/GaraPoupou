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
include_once 'models/productTypeModel.php';
include_once 'models/productsDetailsModel.php';
include_once 'models/trucksModel.php';
include_once 'models/communesModel.php';
include_once 'controllers/annonceController.php';
?>

<div id="bgAnnonce" class="row">
    <form id="annonce" class="form-horizontal well col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1" action="#" method="POST" enctype="multipart/form-data">
        <fieldset>    
            <legend id="anLegend">Votre annonce !</legend>

            <div class="form-group ">
                <label for="" class="col-lg-2 control-label">Catégories</label>
                <div class="col-lg-10">
                    <select name="categorie" id="categorie" class="form-control">
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
                <div class="form-group ">
                    <label for="" class="col-lg-2 control-label">Sociétés</label>
                    <div class="col-lg-10">
                        <select name="société" id="société" class="form-control">
                            <option disabled selected>Choisissez une société</option>
                            <?php foreach ($hauliersList as $haulier) { ?>
                                <option value="<?= $haulier->id ?>"><?= $haulier->name ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group <?= isset($formError['nameTruck']) ? 'has-error' : '' ?>">
                    <label for="nameTruck" class="col-lg-2 control-label">Nom du véhicule</label>
                    <div class="col-lg-10">
                        <!--                    Ici on fait en sorte de garder la valeur du champs même si on se trompe , au lieu de tout rettapper -->
                        <input type="text" class="form-control" name="nameTruck" value="<?= !empty($_POST['nameTruck']) ? $_POST['nameTruck'] : '' ?>" placeholder="Nom du véhicule" />
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
                        <input type="file" name="monImage" id="fileToUpload">
                    </div>
                </div>
                <div class="form-group ">
                    <label for="textArea" class="col-lg-2 control-label">Description</label>
                    <div class="col-lg-10">
                        <textarea class="form-control" rows="3" id="textArea"></textarea>
                        <span class="help-block">Decrivez en quelques mots vos activités.</span>
                    </div>
                </div>
            </div>
            <!--            informations pour les camions-->
            <!--            section exploitation, formulaire destinée aux exploitations et qui est hide par defauts et que je show au click-->
            <div class = "exploitations">
                <div class="form-group <?= isset($formError['nameExploitation']) ? 'has-error' : '' ?>">
                    <label for="nameExploitation" class="col-lg-2 control-label <?= isset($formError['nameExploitation']) ? 'inputError' : '' ?>">Nom de votre entité</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="nameExploitation" value="<?= !empty($_POST['nameExploitation']) ? $_POST['nameExploitation'] : '' ?>" placeholder="Nom de votre entité" />
                    </div>
                </div>
                <div class="form-group <?= isset($formError['phoneNumberE']) ? 'has-error' : '' ?>">
                    <label for="phoneNumberE" class="col-lg-2 control-label <?= isset($formError['phoneNumberE']) ? 'inputError' : '' ?>">Téléphone</label>
                    <div class="col-lg-10">
                        <input type="tel" class="form-control" name="phoneNumberE" value="<?= !empty($_POST['phoneNumberE']) ? $_POST['phoneNumberE'] : '' ?>" placeholder="Téléphone" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="imgExploitation" class="col-lg-2 control-label ">Image à télécharger</label>
                    <div class="col-lg-10">
                        <input type="file" name="imgExploitation" id="fileToUpload">
                    </div>
                </div>
                <div class="form-group ">
                    <label for="textArea" class="col-lg-2 control-label">Description</label>
                    <div class="col-lg-10">
                        <textarea class="form-control" rows="3" id="textArea"></textarea>
                        <span class="help-block">Decrivez en quelques mots vos activités.</span>
                    </div>
                </div>
            </div>
            <!--            informations pour les exploitations-->
            <!--            section produit, formulaire destinée aux produits et qui est hide par defauts et que je show au click-->
            <div class = "pDetails">

                 <div class="form-group ">
                    <label for="" class="col-lg-2 control-label">Exploitation</label>
                    <div class="col-lg-10">
                        <select name="exploitation" id="société" class="form-control">
                            <option disabled selected>Choisissez une exploitation</option>
                            <?php foreach ($exploitationList as $exploitation) { ?>
                                <option value="<?= $exploitation->id ?>"><?= $exploitation->name ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                                <div class="form-group ">
                <label for="" class="col-lg-2 control-label">Type de produit</label>
                <div class="col-lg-10">
                    <select name="typeProduit" id="typeProduit" class="form-control">
                        <option disabled selected>Choisissez un type de produit</option>  
                                                    <?php foreach ($productTypeList as $productType) { ?>
                                <option value="<?= $productType->id ?>"><?= $productType->name ?></option>
                            <?php } ?>
                    </select>
                </div>
            </div>
                <div class="form-group <?= isset($formError['namePdetails']) ? 'has-error' : '' ?>">
                    <label for="namePdetails" class="col-lg-2 control-label <?= isset($formError['namePdetails']) ? 'inputError' : '' ?>">Nom du produit</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="namePdetails" value="<?= !empty($_POST['namePdetails']) ? $_POST['namePdetails'] : '' ?>" placeholder="Nom du produit" />
                    </div>
                </div>
            </div>
            <!--informations pour les produits-->
            <!--            section transporteur, formulaire destinée aux transporteurs et qui est hide par defauts et que je show au click-->
            <div class = "hauliers">
                <div class="form-group <?= isset($formError['nameHaulier']) ? 'has-error' : '' ?>">
                    <label for="nameHaulier" class="col-lg-2 control-label <?= isset($formError['nameHaulier']) ? 'inputError' : '' ?>">Nom de transporteur</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="nameHaulier" value="<?= !empty($_POST['nameHaulier']) ? $_POST['nameHaulier'] : '' ?>" placeholder="Nom de transporteur" />
                    </div>
                </div>
                <div class="form-group <?= isset($formError['phoneNumberH']) ? 'has-error' : '' ?>">
                    <label for="phoneNumberH" class="col-lg-2 control-label <?= isset($formError['phoneNumberH']) ? 'inputError' : '' ?>">Téléphone</label>
                    <div class="col-lg-10">
                        <input type="tel" class="form-control" name="phoneNumberH" value="<?= !empty($_POST['phoneNumberH']) ? $_POST['phoneNumberH'] : '' ?>" placeholder="Téléphone" />
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
