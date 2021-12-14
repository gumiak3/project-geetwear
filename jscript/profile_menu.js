$(document).ready(function(){
    getContactDetails();
    $('#contact-details-btn').click(function(){
        getContactDetails();
        $('#contact-details-btn').addClass("active");
    })
    $('#orders-btn').click(function(){
        getOrders();
        console.log('clicked');
    })


});
function getContactDetails(){
    $.ajax({
        url: "./php/contact_details.php",
        method: 'POST'
    }).done(function( data ) {
        $('#profile-content').html(data);
    })
}
function getOrders(){
    $.ajax({
        url:"./php/profile_orders.php",
        method: 'POST'
    }).done(function( data ){
        $("#profile-content").html(data);
    })
}
