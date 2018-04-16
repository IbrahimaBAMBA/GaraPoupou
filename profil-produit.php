<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<?php
if (!isset($_SESSION['lastName'])){
      header ('location: connexion.php');
      exit;
}
?>
<?php include 'header.php' ?>
<?php
include_once 'models/database.php';
include_once 'models/productsDetailsModel.php';
include_once 'controllers/profil-produitController.php';
?>
<!--<div id="profilVegetableProduct" class="container">
    <div  class="row infoVegetableProduct">
        
        <div class="col-xs-12 col-sm-12 col-md-7 col-lg-2">
            <img src="#" class="img-thumbnail" alt="" > 
        </div>
        <div class="col-xs-12 col-sm-12 col-md-7 col-lg-offset-1 col-lg-9">
            <p> <?= $productsDetails->name ?></p>        
            <p><?= $productsDetails->publicationDate ?></p>                  
            <p> <button type="button" class="btn btn-info">Supprimer</button>
                <button type="button" class="btn btn-info">Modifier</button>
                <a class="btn-md" href="produits.php?produitsId=<?= $productsDetails->id ?>">Liste des produits</a></p>
        </div>
      
    </div>
</div>-->
<div id="profilVegetableProduct"  class="row">
    <form id="infoVegetableProduct"action="#" method="POST" class="form-horizontal col-lg-offset-1 col-lg-10" enctype="multipart/form-data">
    <fieldset>
        <legend id="plpLegend">Modifier les informations du produit</legend>
        <div class="form-group ">
            <label id="lbl" for="name" class="col-lg-2 control-label <?= isset($formError['name']) ? 'inputError' : '' ?>">Nom du produit</label>
            <div class="col-lg-10">
                <input type="text" class="form-control" name="name" value="<?= $productsDetails->name ?>" placeholder="Nom du produit" />

            </div>
        </div>              
        <div class="form-group ">
            <label id="lbl" for="publicationDate" class="col-lg-2 control-label <?= isset($formError['publicationDate']) ? 'inputError' : '' ?>">Date de publication</label>
            <div class="col-lg-10">
                <p><input type="date" class="form-control" name="publicationDate" value="<?= $productsDetails->publicationDate ?>" placeholder="Date de publication" />
                <a class="btn-md" href="produits.php?produitsId=<?= $productsDetails->id ?>">Liste des produits</a>
                </p>
            </div>
        </div>
        <div class="form-group">
            <label id="lbl" for="monImage" class="col-lg-2 control-label ">Image du produit</label>
            <div class="col-lg-10">
                <input type="file" name="monImage" id="fileToUpload">
            </div>
        </div>
        <div class="form-group ">
            <label id="lbl" for="textArea" class="col-lg-2 control-label">Description</label>
            <div class="col-lg-10">
                <textarea class="form-control" rows="3" id="textArea"></textarea>
                <span class="help-block">Decrivez en quelques mots vos activités.</span>
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
                <p><input name="modifyProductProfil" type="submit" value="Modifier" /> <a class="btn-md" href="produits.php?produitsId<?= $productsDetails->id ?>">Liste des produits</a></p>
            </div>
        </div>
    </fieldset>
</form>
</div>

<?php include 'footer.php'; ?>