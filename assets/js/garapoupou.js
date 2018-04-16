
//Slide de présentation des activités du site

$(document).ready(function () {
    $('.carousel').carousel({interval: 2000});
});
//Slide de présentation des articleset leur prix

$(document).ready(function () {
    $('#myCarousel').carousel({
        interval: 10000
    });
});

//Fonction hide et show de modification du mot de passe
$(document).ready(function () {
    $("#hide").click(function () {
        $(".form1").hide();
    });
    $("#show").click(function () {
        $(".form1").show();
    });
});

//Fonction  hide et show de du formulaire d'insertion
//Je commence par hide tous les champs des formulaires
$(".trucks, .exploitations, .pDetails, .hauliers").hide();
//J'affecte la fonction click à l'id 'categorie' que j'ai donné à mon select   
$('#categorie').click(function () {
    //Et selon donc l'option que je choisi dans mon select, j'affecte la fonction show et ainsi de suite selon le choix       
    if ($('#trucks').is(':selected')) {
        $('.trucks').show();
        $('.exploitations').hide();
        $('.pDetails').hide();
        $('.hauliers').hide();
    } else if ($('#exploitations').is(':selected')) {
        $('.trucks').hide();
        $('.exploitations').show();
        $('.pDetails').hide();
        $('.hauliers').hide();
    } else if ($('#pDetails').is(':selected')) {
        $('.trucks').hide();
        $('.exploitations').hide();
        $('.pDetails').show();
        $('.hauliers').hide();
    } else if ($('#hauliers').is(':selected')) {
        $('.trucks').hide();
        $('.exploitations').hide();
        $('.pDetails').hide();
        $('.hauliers').show();
    }
});

