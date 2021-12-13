$('button[name="add_order"]').on('click',function(e){
    if($('input[name="ceena"]').val()==0){
        alert('mordo ale nic nie zamówiłeś')
    }else{
        DeleteProductFromBasket();
    }
    
    
});
function DeleteProductFromBasket(){
    $.ajax({
        url: "php/OrderToDatabase.php",
        method: 'POST',
        data: {
            fname: $('input[name="firstname"]').val(),
            sname: $('input[name="surname"]').val(),
            city: $('input[name="city"]').val(),
            street: $('input[name="street"]').val(),
            zip: $('input[name="zip"]').val(),
            house_number: $('input[name="house_number"]').val(),
            apartment_number: $('input[name="apartment_number"]').val()
        }
    }).done(function(){
        alert('Dodano nowe zamównienie :)')
    })
}