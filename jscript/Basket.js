$(document).ready(function(){

    getProductsInBasket();

});

function getProductsInBasket(){
    $.ajax({
        url: "php/Basket.php",
    }).done(function( data ) {
        $('.srodek_koszyk').html(data);
        $('#usuwanko').on('click',function(e){
            alert("dupa");
            //DeleteProductFromBasket();
        
        });
    })
}
