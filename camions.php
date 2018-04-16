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
<?php include 'header.php' ?>
<?php
include_once 'models/database.php';
include_once 'models/trucksModel.php';
include_once 'controllers/camionsController.php';
?>

<div class="item-listing small-padding-bg">
    <div id="bgCam" class="container">
        <div class="row">
            <?php foreach ($trucksList as $trucks) { ?>
                <div class="col-md-2"><a href="profil-camion.php"><img src="assets/img/img_camions/img_camion.png" alt="camion" ></a> </div>
                <div class="col-md-4 home-list-pop-desc inn-list-pop-desc"> 
                    <h1><?= $trucks->name ?></h1>
                    <p><?= $trucks->volume ?></p>
                    <p><a class="btn btn-info btn-sm" href="profil-camion.php?trucksId=<?= $trucks->id ?>">Profil camion</a></p>
                    <div class="list-enquiry">
                        <ul>
                            <li class="btn btn-md btn-warning"><a href="#!"><i class="fa fa-star-o" aria-hidden="true"></i> +images!</a> </li>
                            <li class="btn btn-md btn-warning"><a href="#!"><i class="fa fa-commenting-o" aria-hidden="true"></i> SMS!</a> </li>
                            <li class="btn btn-md btn-warning"><a href="#!"><i class="fa fa-phone" aria-hidden="true"></i> Appeler!</a> </li>
                        </ul>
                    </div>
                </div>
            <?php } ?>  
            <?php foreach ($trucksList as $trucks) { ?>
                <div class="col-md-2"><a href="profil-camion.php"><img src="assets/img/img_camions/img_camion.png" alt="camion" ></a> </div>
                <div class="col-md-4 home-list-pop-desc inn-list-pop-desc"> 
                    <h1><?= $trucks->name ?></h1>
                    <p><?= $trucks->volume ?></p>
                    <p><a class="btn btn-info btn-sm" href="profil-camion.php?trucksId=<?= $trucks->id ?>">Profil camion</a></p>
                    <div class="list-enquiry">
                        <ul>
                            <li class="btn btn-md btn-warning"><a href="#!"><i class="fa fa-star-o" aria-hidden="true"></i> +images!</a> </li>
                            <li class="btn btn-md btn-warning"><a href="#!"><i class="fa fa-commenting-o" aria-hidden="true"></i> SMS!</a> </li>
                            <li class="btn btn-md btn-warning"><a href="#!"><i class="fa fa-phone" aria-hidden="true"></i> Appeler!</a> </li>
                        </ul>
                    </div>
                </div>
            <?php } ?>  
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>  