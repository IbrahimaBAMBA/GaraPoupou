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
include_once 'controllers/transporteursController.php';
?>
<div class="item-listing small-padding-bg">
    <div class="container">
        <div class="row">
            <?php foreach ($hauliersList as $hauliers) { ?>
            <div class="col-md-2"><a href="profil-camion.php"><img src="assets/img/img_transporteurs/transporteur.JPG" alt="camion" ></a> </div>
                <div class="col-md-4 home-list-pop-desc inn-list-pop-desc"> 
                        <h1><?= $hauliers->name ?></h1>
                    <p><?= $hauliers->phoneNumber ?></p>
                    <p><a href="profil-transporteur.php?hauliersId=<?= $hauliers->id ?>">Profil</a></p>
                    <div class="list-enquiry">
                        <ul>
                            <li class="btn btn-md btn-warning"><a href="#!"><i class="fa fa-star-o" aria-hidden="true"></i>+images!</a> </li>
                            <li class="btn btn-md btn-warning"><a href="#!"><i class="fa fa-commenting-o" aria-hidden="true"></i>SMS!</a> </li>
                            <li class="btn btn-md btn-warning"><a href="#!"><i class="fa fa-phone" aria-hidden="true"></i>Appeler!</a> </li>
                        </ul>
                    </div>
                </div>
            <?php } ?>  
            <?php foreach ($hauliersList as $hauliers) { ?>
            <div class="col-md-2"><a href="profil-camion.php"><img src="assets/img/img_transporteurs/transporteur.JPG" alt="camion" ></a> </div>
                <div class="col-md-4 home-list-pop-desc inn-list-pop-desc"> 
                        <h1><?= $hauliers->name ?></h1>
                    <p><?= $hauliers->phoneNumber ?></p>
                    <p><a href="profil-transporteur.php?hauliersId=<?= $hauliers->id ?>">Profil</a></p>
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