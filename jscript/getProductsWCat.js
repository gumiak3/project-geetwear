$(document).ready(function(){
    
    getProducts();

});

function getProducts(){
    $.ajax({
        url: "php/getProductsWCat.php",
        method: 'POST',
        data: {
            id: id_cat
        }
    }).done(function( data ) {
        $('#productsData').html(data);
    })
}
