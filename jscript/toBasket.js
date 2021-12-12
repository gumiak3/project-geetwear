$('input[name="przycisk_koszyk"]').on('click',function(e){
    e.preventDefault();
    getProductToBasket();
});
function getProductToBasket(){
    $.ajax({
        url: "php/getProductToBasket.php",
        method: 'POST',
        data: {
            amount: $('.input_ilosci').val(),
            id: $('.input_rozmiaru').val()
        }
    })
}