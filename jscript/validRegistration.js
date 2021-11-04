$(document).ready(function(){
    pushError();

});

function pushError(){
    $.ajax({
        url: "php/registration.php",
        method: 'POST'
    }).done(function( data ) {
        $('#error-div').html(data);
        console.log(data);
    })
}
