$(document).ready(function(){
    
    getProducts();

});

$('input[name="filtr"]').on('click',function(e){
    e.preventDefault();
    getProductsSorted();
});


function getProducts(){
    $.ajax({
        url: "php/getProductsWCat.php",
        method: 'POST',
        data: {
            id: id_cat,
        }
    }).done(function( data ) {
        $('#productsData').html(data);
    })
}

function getProductsSorted(){
    $.ajax({
        url: "php/getProductsWCat.php",
        method: 'POST',
        data: {
            filtr: true,
            id: id_cat,
            sort_rest: $('.select_sort').val(),
            sort_size: $('.select_size').val()
        }
    }).done(function( data ) {
        $('#productsData').html(data);
    })
}