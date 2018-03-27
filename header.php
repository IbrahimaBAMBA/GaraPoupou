<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/bootstrap.css">
        <link rel="icon" href="assets/img/favicon2.png">
        <link href="https://fonts.googleapis.com/css?family=Didact+Gothic" rel="stylesheet"> 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Accueil</title>
    </head>
    <body>           
        <nav class="navbar navbar-default">
            <div class="navbar">
                <!-- Permet un meilleur affichage sur mobile -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="brand1" href="#"><img alt="Brand" src="assets/img/favicon.png"></a>
                    <a class="brand2" href="#">Gara Poupou</a>
                </div>
                <!-- affiche les liens de la nav -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index.php">Accueil <span class="sr-only">(current)</span></a></li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="produits.php">Produits vivriers et avicoles</a></li>
                                <li><a href="exploitations.php">Exploitations vivrières et avicoles</a></li>
                                <li><a href="transporteurs.php">Transporteurs</a></li>
                                <li><a href="camions.php">Camions</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#">One more separated link</a></li>
                            </ul>
                        </li>
                    </ul>
                    <?php if (isset($_SESSION['id'])) { ?>
                        <ul class="nav navbar-nav navbar-right">                      
                            <li></span>Bon retour parmi nous, <a href="profiluser.php"><?= $_SESSION['firstName'] ?>!</a></li>
                            <li><a href="deconnexion.php"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span>Déconnexion</a></li>

                        </ul>
                    <?php } else { ?>
                        <ul class="nav navbar-nav navbar-right">                      
                            <li><a href="inscription.php"><span class="glyphicon glyphicon-open" aria-hidden="true"></span>Inscription</a></li>
                            <li><a href="connexion.php"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span>Connexion</a></li>
                        </ul>
                    <?php } ?>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container -->
        </nav>
        <div class="container">
            <div id="flashinfo" class="row">
                <div class="col-xs-12 col-sm-10 col-md-6col-lg-2 effet">FLASH INFO !</div>
                <div class="col-lg-10">
                    <marquee class="back" scrollamount="3">Arrivage de deux camions de manioc doux et d'ignames bètèbètè au marché gouro d'Adjamé.</marquee> 
                </div>       
            </div>
        


