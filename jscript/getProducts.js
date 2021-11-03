$(document).ready(function(){
    
    getProducts();

});

function getProducts(){
    $.ajax({
        url: "php/getProducts.php",
        method: 'POST'
    }).done(function( data ) {
        $('#productsData').html(data);
    })
}
