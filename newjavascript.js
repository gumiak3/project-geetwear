$(function(){
    $('#zdjecia_pod img').click(function(){
        var src_zapis = $(this).attr('src');
        var src_duzego = $('#produkt').attr('src');
        if(src_zapis != src_duzego){ // zabezpieczenie dodalem, zeby nie móc klikać na obrazek ktory juz jest tym glownym.
          $('#produkt').fadeOut(500,function(){
           $(this).attr('src',src_zapis);
           $(this).fadeIn(500);
        });  
        }
        
    });
});

