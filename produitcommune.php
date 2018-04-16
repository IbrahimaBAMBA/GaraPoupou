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
include_once 'models/productCommuneModel.php';
include_once 'controllers/productCommuneController.php';
?>
<div class="item-listing small-padding-bg">
    <div id="bgPdtCom" class="container">
        <div class="row">
            <?php foreach ($productCommuneList as $productCommune) { ?>
            <div class="col-md-2"><a href="profil-produit.php"><img src="assets/img/img_produits_vivriers/aubergines.jpg" alt="camion" ></a> </div>
                <div class="col-md-4 home-list-pop-desc inn-list-pop-desc"> 
                    <h1><?= $productCommune->productName ?></h1>
                    <p><?= $productCommune->exploitationName ?></p>
                    <p><?= $productCommune->communeName ?></p>
                    <p><?= $productCommune->publicationDate ?></p>
                    <p><a class="btn-md" href="#?productId=<?= $productCommune->proposalId ?>">Liste des produits par commune</a></p>
                    <div class="list-enquiry">
                        <ul>
                            <li class="btn btn-md btn-warning"><a href="#!"><i class="fa fa-star-o" aria-hidden="true"></i>+images!</a> </li>
                            <li class="btn btn-md btn-warning"><a href="#!"><i class="fa fa-commenting-o" aria-hidden="true"></i>SMS!</a> </li>
                            <li class="btn btn-md btn-warning"><a href="#!"><i class="fa fa-phone" aria-hidden="true"></i>Appeler!</a> </li>
                        </ul>
                    </div>
                </div>
            <?php } ?> 
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
