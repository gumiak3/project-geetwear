<!DOCTYPE html>
<html lang="pl-PL">
    <head>
        <title>GEET-WEAR</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/css.css" rel="stylesheet" type="text/css"/>
        <link rel="shortcut icon" type="image/png" href="icons/ikona1.png">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="slider_javascript.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
        <div class="row" id="logo_zaw">
            <div class="help">   
            </div>    
            
            <div class="logo">
                <a href="index.php"><img src="photos/logo3.png" alt="logo" class="logo_id"></a>
                
            </div>

            <div class="rightsite">
                <div class="logowanie">
                    <a href="logowanie.php"><p class="loguj"> ZALOGUJ SIĘ </p></a>
                    
                </div>
                <div class="wyszukiwanie">
                    <a href="wyszukiwarka.php"><img class="lupa" src="icons/lupa.png" alt="alt"/></a>
                </div>
                <div class="koszyk">
                    <a href="koszyk.php"><img class="koszy" src="icons/koszyk.png" alt="alt"/></a>
                </div>
            </div>      
        </div>
        <script>
            $(function(){
                let deviceWidth;
                $(window).resize(function(){
                    
                    deviceWidth = $(window).width();
                    if(deviceWidth>=951)
                    {
                    if($(".kategoria").hasClass("active")){
                        $(".kategoria").removeClass("active");
                        $(".menu_cale").removeClass("active");
                        $(".bar1").removeClass('active');
                        $(".bar2").removeClass('active');
                        $(".bar3").removeClass('active');
                        console.log(deviceWidth);
                    }
                    }
                });
                $(".toggle").on("click",function(){             
                    if($(".kategoria").hasClass("active")){
                        $(".kategoria").removeClass("active");
                        $(".menu_cale").removeClass("active");
                        $(".bar1").removeClass("active");
                        $(".bar2").removeClass("active");
                        $(".bar3").removeClass("active");
                    }
                    else{
                        $(".kategoria").addClass("active");
                        $(".menu_cale").addClass("active");
                        $(".bar1").addClass("active");
                        $(".bar2").addClass("active");
                        $(".bar3").addClass("active");
                    }
                });
                
            });
        </script>
        <nav class="nabar sticky-top" id="menu_cale">
            <div class="po_zmianie grid row gridcount">
                <div class="toggle col-4">
                    <span class="bar1"></span>
                    <span class="bar2"></span>
                    <span class="bar3"></span>

                </div>
                <div class="logowanie_w_menu col-4">
                    <a href="logowanie.php"><p class="loguj"> ZALOGUJ SIĘ </p></a>
                </div>
                <div class="koszyk_w_menu col-4">
                    <a href="koszyk.php"><img class="koszy" src="icons/koszyk.png" alt="alt"/></a>
                </div>
                
            </div>
           
            <ul class="menu_cale">
                <li class="kategoria"><a href="nowosc.php">NOWOŚCI</a></li>
                <li class="kategoria"><a href="bluzy.html">BLUZY</a></li>
                <li class="kategoria"><a href="Koszulki.html">KOSZULKI</a></li>
                <li class="kategoria"><a href="Skarpety.html">SKARPETY</a></li>
                <li class="kategoria"><a href="Bielizna.html">BIELIZNA</a></li>
                <li class="kategoria"><a href="Gadżety.html">GADŻETY</a></li>
                <li class="kategoria"><a href="Inne.html">INNE</a></li>
            </ul>
        </nav>
        <!-- reszta -->
   
        <div class="slider">            
            <ul id="zdjecia">
                <li><img src="photos/slider.png" alt="alt" class="zdjecie"/></li>
                <li><img src="photos/slider2.png" alt="alt" class="zdjecie"/></li>
                <li><img src="photos/slider3.png" alt="alt" class="zdjecie"/></li>
            </ul>
            <img src="photos/left-arrow.png" alt="alt" id="prev" class="arrows">
            <img src="photos/right-arrow.png" alt="alt" id="next" class="arrows">
        </div>
        <div class="space_between_slider"> 
        </div> 
        <div class="zawartosc">  
            <h2 class="title_of_product col-lg-12 ">POLECANE</h2>
            
            <div id="productsData"></div>

                <div class="under_products">
                    <div class="fast_delivery  ">
                        <img class="margin" src="icons/delivery.png" alt="alt">
                        <div class="fast">SZYBKA DOSTAWA</div>   
                        <div class="podpis">Przesyłka dotrze do Ciebie w przeciągu 3 dni roboczych od zaksięgowania płatności</div>
                    </div>
                    <div  class="safety ">
                        <img class="margin" src="icons/safety.png" alt="alt">
                        <div class="safe">BEZPIECZNY ZAKUP</div>
                        <div class="podpis">Każdą paczkę dokładnie pakujemy żeby podczas podróży pod Twoje drzwi nic jej się nie stało</div>
                    </div>
                    <div class="secured  ">
                        <img class="margin" src="icons/secured.png" alt="alt">
                        <div class="bez">ZABEZPIECZONA PACZKA</div>
                        <div class="podpis">W naszym sklepie korzystamy z bezpiecznych systemów płatności</div>
                    </div>
                </div>
            <div class="fotter">
            <div class="newsletter row " id="newsletter">
                <div class="napis col-xs-12 col-sm-12 col-lg-6">
                    Chcesz otrzymywać powiadomienia o nowościach?
                </div>
                <div class="form col-xs-12 col-sm-12 col-lg-6">
                    <div class="newsletter-form">
                    <input class="input" name="email" type="text" value="" placeholder="Twój adres e-mail">
                    <button class="btn" type="button" name="button">Zapisz się</button>
                </div>
                </div>
            </div>
            <div class="zawartosc_fotter row">
                <div class="obsluga_klienta col-lg-6">
                    <h3 class="napis_obsluga col-lg-12">OBSŁUGA KLIENTA</h3>
                    <div class="polityka col-lg-6">
                        <span>Polityka prywatności</span>
                    </div>
                    <div class="polityka col-lg-6">
                        <span>Regulamin zwrotu</span>
                    </div>
                    <div class="polityka col-lg-6">
                        <span>Tabela rozmiarów</span>
                    </div>
                </div>
                
                <div class="kontakt col-lg-6 row">
                    <h3 class="napis_kontakt col-lg-12">KONTAKT</h3>
                    <div class="mail col-6">
                        <span>geetwear@gmail.com</span>
                    </div>
                    <div class="mail_ikona col-6">
                        <img src="icons/poczta.png" alt="alt" class="ikona_poczty"/>
                    </div>
                    <div class="mail col-6">
                        <span>435432543</span>
                    </div>
                    <div class="mail_ikona col-6">
                        <img src="icons/telefon.png" alt="alt" class="ikona_poczty"/>
                    </div>
                    <div class="mail col-6">
                        <a class="twitter" href="https://twitter.com/gumiak_">@Gumiak_</a>
                    </div>
                    <div class="mail_ikona col-6">
                        <img src="icons/twitter.png" alt="alt" class="ikona_poczty"/>
                    </div>
      
                    
                </div>
            </div>     
                
        </div>    
        </div>  
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script type="text/javascript" src="./jscript/getProducts.js"></script>         
    </body>
</html>