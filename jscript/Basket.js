$(document).ready(function(){

    getProductsInBasket();

});

function getProductsInBasket(){
    $.ajax({
        url: "php/Basket.php",
    }).done(function( data ) {
        $('.caly_koszyk').html(data);
        $('button[name="usun"]').on('click',function(e){
            
            var deleted_positionid = "#" + $(this).val();
            var deleted_position = $(this).val();
            
            DeleteProductFromBasket(deleted_position, deleted_positionid);
            
        });
    })
}
function DeleteProductFromBasket(deleted_position_number, deleted_positionid){
    $.ajax({
        url: "php/DeleteFromBasket.php",
        method: 'POST',
        data: {
            usun: true,
            ProductPosition: deleted_position_number
        }
    }).done(function(){

        // $(deleted_positionid).remove();
        getProductsInBasket();

    })
}