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
include_once 'models/hauliersModel.php';
include_once 'controllers/profil-transporteurController.php';
?>
<!--<div id="profilHauliers" class="container">
    <div  class="row infoHauliers">
      
        <div class="col-xs-12 col-sm-12 col-md-7 col-lg-2">
            <img src="#" class="img-thumbnail" alt="" > 
        </div>
       <div class="col-xs-12 col-sm-12 col-md-7 col-lg-offset-1 col-lg-9">
            <p> <?= $hauliersList->name ?></p>        
            <p><?= $hauliersList->phoneNumber ?></p>                 
            <p> <button type="button" class="btn btn-info">Supprimer</button>
                <button type="button" class="btn btn-info">Modifier</button>
                <a class="btn-md" href="transporteurs.php?transporteursId=<?= $hauliersList->id ?>">Liste des transporteurs</a></p>
        </div>
       
    </div>
</div>-->
<div id="profilHauliers"  class="row">
    <form id="infoHauliers"action="#" method="POST" class="form-horizontal" enctype="multipart/form-data">
    <fieldset>
        <legend id="plLegend">Modifier les informations du transporteur</legend>
        <div class="form-group ">
            <label id="lbl" for="name" class="col-lg-2 control-label <?= isset($formError['name']) ? 'inputError' : '' ?>">Nom de votre société</label>
            <div class="col-lg-10">
                <input type="text" class="form-control" name="name" value="<?= $hauliersList->name ?>" placeholder="Nom du camion" />

            </div>
        </div>              
        <div class="form-group ">
            <label id="lbl" for="phoneNumber" class="col-lg-2 control-label <?= isset($formError['phoneNumber']) ? 'inputError' : '' ?>">Téléphone</label>
            <div class="col-lg-10">
                <p><input type="tel" class="form-control" name="phoneNumber" value="<?= $hauliersList->phoneNumber ?>" placeholder="Téléphone" />
                <a class="btn-md" href="transporteurs.php?transporteursId=<?= $hauliersList->id ?>">Liste des transporteurs</a>
                </p>
            </div>
        </div>
        <div class="form-group">
            <label id="lbl" for="monImage" class="col-lg-2 control-label ">Image du parc automobile</label>
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
                <p><input name="modifyTruckProfil" type="submit" value="Modifier" /> <a class="btn-md" href="camions.php?trucksId=<?= $trucks->id ?>">Liste des camions</a></p>
            </div>
        </div>
    </fieldset>
</form>
</div>

<?php include 'footer.php'; ?>
