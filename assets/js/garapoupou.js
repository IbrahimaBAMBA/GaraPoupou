
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
$(document).ready(function(){
    $("#hide").click(function(){
        $(".form1").hide();
    });
    $("#show").click(function(){
        $(".form1").show();
    });
});
