$(document).ready(function(){
    getDashBoard();
    $('.dashboard').click(function(){
       getDashBoard(); 
    });
    $('.categories').click(function(){
        getCategories();
    });
    $('.users').click(function(){
        getUsers();
    });
    $('.pages').click(function(){
        getPages();
    });

});

function getDashBoard(){
    $.ajax({
        url: "php/adminPanel/DashBoard.php",
        method: 'POST'
    }).done(function( data ) {
        $('#content').html(data);
    })
}
function getCategories(){
    $.ajax({
        url: "php/adminPanel/categoriesManagement.php",
        method: 'POST'
    }).done(function( data ) {
        $('#content').html(data);
    })
}
function getUsers(){
    $.ajax({
        url: "php/adminPanel/userManagement.php",
        method: 'POST'
    }).done(function( data ) {
        $('#content').html(data);
    })
}
function getPages(){
    $.ajax({
        url: "php/adminPanel/pageManagement.php",
        method: 'POST'
    }).done(function( data ) {
        $('#content').html(data);
    })
}