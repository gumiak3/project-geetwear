$(document).ready(function(){

    getSort();
    $('.sortowanie_panel').click(function(){
       Sort(); 
    });

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

function Sort(){
    $.ajax({
        url: "php/productsDisplay/getProductsWSort.php",
        method: 'POST'
    }).done(function( data ) {
        $('#content').html(data);
    })
}
