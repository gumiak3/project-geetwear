$(document).ready(function(){
    ChangeContent();
    $('#contact-details-btn').click(function(){
        ChangeContent();
    })

});
function ChangeContent(){
    $.ajax({
        url: "./php/contact_details.php",
        method: 'POST'
    }).done(function( data ) {
        $('#profile-content').html(data);
    })
}