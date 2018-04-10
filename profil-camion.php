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

<div  id="profilTrucks" class="row text-aligne">
    <div class="infoTrucks">
        <div class="col-xs-12 col-sm-4 col-lg-1 col-md-offset-1 col-md-2 ">
            <img src="assets/img/hauliersPictures/pic2.JPG" class="img-thumbnail" alt="photoId" > 
        </div>
        <div class="col-md-offset-1 col-md-2 ">         
            <p> <?= $trucks->name ?></p>        
            <p><?= $trucks->imageLink ?></p>                 
            <p><?= $trucks->volume ?></p> 
            <p><a class="btn-md" href="camions.php?trucksId=<?= $trucks->id ?>">Liste des camions</a></p>
            <p> <button type="button" class="btn btn-info">Modifier</button> </p>                 
            <p> <button type="button" class="btn btn-info">Supprimer</button> </p> 
            <form class="form-horizontal well col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1" action="upload.php" method="POST" enctype="multipart/form-data">
                <label for="fileToUpload" class="col-lg-2 control-label">Ajouter une image</label>
                <input type="file" name="fileToUpload" id="fileToUpload">
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
</div>
<?php include 'footer.php'; ?> 