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
<div id="profilVegetableProduct" class="container">
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
</div>

<?php include 'footer.php'; ?>