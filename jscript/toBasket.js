$('input[name="przycisk_koszyk"]').on('click',function(e){
    e.preventDefault();
    getProductToBasket();
    var ilos = parseInt($('input[name="basket_number"]').val())+1;
    document.getElementById("basket_number").innerHTML = "("+ilos+")";
});
function getProductToBasket(){
    alert('Dodano Produkt do koszyka');
    $.ajax({
        url: "php/getProductToBasket.php",
        method: 'POST',
        data: {
            amount: $('.input_ilosci').val(),
            price: $('.input_ceny').val(),
            id: $('.input_rozmiaru').val()
        }
    })
}