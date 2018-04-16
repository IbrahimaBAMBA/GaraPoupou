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
<?php include 'header.php'; ?>
<?php
include_once 'models/database.php';
include_once 'models/trucksModel.php';
include_once 'controllers/profil-camionController.php';
?>

<div id="profilTrucks" class="row">
    <form id="pltrucks"action="#" method="POST" class="form-horizontal col-lg-offset-1 col-lg-10" enctype="multipart/form-data">
    <fieldset>
        <legend id="ptLegend">Modifier les informations du camion</legend>
        <div class="form-group ">
            <label id="lbl" for="name" class="col-lg-2 control-label <?= isset($formError['name']) ? 'inputError' : '' ?>">Nom du camion</label>
            <div class="col-lg-10">
                <input type="text" class="form-control" name="name" value="<?= $trucks->name ?>" placeholder="Nom du camion" />

            </div>
        </div>              
        <div class="form-group ">
            <label id="lbl" for="volume" class="col-lg-2 control-label <?= isset($formError['volume']) ? 'inputError' : '' ?>">Capacité du camion</label>
            <div class="col-lg-10">
                <input type="text" class="form-control" name="volume" value="<?= $trucks->volume ?>" placeholder="capacité du camion" />
            </div>
        </div>
        <div class="form-group">
            <label id="lbl" for="monImage" class="col-lg-2 control-label ">Image du camion</label>
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
                <p><input name="modifyTruckProfil" type="submit" value="Modifier" class="btn btn-info btn-md" /> <a class="btn btn-info btn-md" href="camions.php?trucksId=<?= $trucks->id ?>">Liste des camions</a>
                <button name="deleteTruckProfil" type="submit" value="Valider" class="btn btn-info btn-md">Suppression du profil du camion</button> 
                </p>
            </div>
        </div>
    </fieldset>
</form>
</div>
<?php include 'footer.php'; ?> 