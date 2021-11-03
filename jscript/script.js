$(document).ready(function(){

    getProducts();

});

function getProducts(){
    $.ajax({
        url: "getProducts.php",
        method: 'POST'
    }).done(function( data ) {
        $('#productsData').html(data);
    })
}
