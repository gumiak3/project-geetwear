$(document).ready(function(){

    getSort();
    $('.sortowanie_panel').click(function(){
       Sort(); 
    });

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

<<<<<<< HEAD
function Sort(){
    $.ajax({
        url: "php/productsDisplay/getProductsWSort.php",
        method: 'POST'
    }).done(function( data ) {
        $('#content').html(data);
    })
}
=======
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
>>>>>>> df4108025830e4060f6e8e9f035860c9da218cd9
