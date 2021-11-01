
$(function(){
    

    var intrvl= setInterval(function(){znikanie()},10000);
    var i=0;
    var slides = $('#zdjecia');
    var width = window.screen.width;

    var arrow_next = $('#next');
    var arrow_prev = $('#prev');
    $('#zdjecia .zdjecie').width(width);
   $(window).resize(function(){
       
       if(i==2)
       {
           slides.animate({'margin-left':'+='+2*width},1200);
           i=0;
           
       }
       if(i==1)
       {
           slides.animate({'margin-left':'+='+width},1200);
           i=0;
       }   
        if($(this).width() != width){
            width = $(this).width();
            $('#zdjecia .zdjecie').width(width);
            
        }
    });
   $('.slider').hover(function(){
       clearInterval(intrvl);
   },function(){
       intrvl = setInterval(function(){znikanie()},10000);
       
   });
   
   $('#prev').click(function(){
       if(i==0)
       {
           slides.animate({'margin-left':'-='+2*width},1200);
           i=2;
       }
       else{
           slides.animate({'margin-left':'+='+width},1200);
           i--;
       }
        
   });
   
   $('#next').click(function(){
      if(i==2)
      {
          slides.animate({'margin-left':'+='+2*width},1200);
          i=0;
      }
      else{
          slides.animate({'margin-left':'-='+width},1200);
          i++;
      }
      
   });
    function znikanie(){
       if(i==0 || i==1)
       {
           slides.animate({'margin-left':'-='+width},1200);
           i++;
           
       }
       else
       {
           slides.animate({'margin-left':'+='+2*width},1200);
           i=0;
           
       }
    };
});