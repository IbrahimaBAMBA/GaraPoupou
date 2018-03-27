$(function(){
  var panier = [];

  $('button[name=addToBasket]').click(function(){
    var ref = $(this).attr('id').toString();
    var articleTitle = $('#title-' + ref).text().toString();
    var description = $('#description-' + ref).text().toString();
    var price = $('#price-' + ref + ' span').text().toString();
    var imgSrc = $('#img-' + ref).attr('src').toString();
    // creation de l'objet
    eval('var ' + ref + ' ={ ref:ref, titre:articleTitle, img:imgSrc, desc:description, price:price, qt:1};');
    // ajout au panier
    panier.push(eval(ref));

    // tableau pour gestion des quantités
    var quantiteTableau = [];
    var prixTotal = 0;
    $.each( panier, function( i, val ) {
      prixTotal = prixTotal+parseFloat(val.price);
      prixTotal = Math.round(prixTotal*100)/100;
      $.each(quantiteTableau,function(j,val2){
        if(val.ref == val2.ref){
          val.qt++;
        }
      });
      quantiteTableau.push(eval(val));
    });
    // ajout à l'encart
    var indexArticle = panier.indexOf(eval(ref));
    if(panier[indexArticle].qt == 1){
      $('<li class="list-group-item" id="quantity' + ref + '"><span class="tag tag-default tag-pill float-xs-right"> ' + panier[indexArticle].qt + '</span>x ' + panier[indexArticle].titre + '.</li>').appendTo('#basket');
      $('<li style="text-align:center;" class="list-group-item" id="quantityModal' + ref + '"><span class="tag tag-default tag-pill float-xs-right">' + panier[indexArticle].qt + '</span>x ' + panier[indexArticle].titre + '. Prix : ' + panier[indexArticle].price + '€' + '<br/><img src="' + imgSrc +'"><br/>' + description + '<br/><button class="btn btn-primary moins">-</button>'+'<button class="btn btn-primary plus">+</button>' +'</li>').appendTo('#panier-modal');

    } else if(panier[indexArticle].qt >1 ){
      $('#quantity' + ref + ' span').html(panier[indexArticle].qt);
      $('#quantityModal' + ref + ' span').html(panier[indexArticle].qt);
    }

    // notif confirmation ajout
     $.notify({
     	title: '<h4>' + articleTitle + '</h4>',
     	message: 'article ajouté à votre panier'
     },{
     	type: 'success'
     });
    $('#bouttonCommander').click(function(){
            $('#divPrixTotal').html(prixTotal+' €');
   });
  });


  // $('#basketModal').click(function(){
  // });

});

$(function(){
  var panier = [];

  $('button[name=addToBasket]').click(function(){
    var ref = $(this).attr('id').toString();
  });
});
