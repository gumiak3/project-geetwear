<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="pl-PL">
    <head>
        <title>GETT-WEAR</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/odzyskiwanie_hasla.css" rel="stylesheet" type="text/css"/>
        <link rel="shortcut icon" type="image/png" href="ikony/ikona1.png">
        <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Amatic+SC&family=Domine&display=swap" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
        <div class="row" id="logo_zaw">
            <div class="help">   
            </div>    
            <div class="logo">
                <a href="index.html"><img src="photos/logo3.png" alt="logo"></a>
                
            </div>
            <div class="rightsite">
                <div class="logowanie">
                    <a href="logowanie.html"><p class="loguj"> ZALOGUJ SIĘ </p></a>
                </div>
                <div class="wyszukiwanie">
                    <a href="wyszukiwarka.html"><img class="lupa" src="ikony/lupa.png" alt="alt"/></a>
                </div>
                <div class="koszyk">
                    <a href="koszyk.html"><img class="koszy" src="ikony/koszyk.png" alt="alt"/></a>
                </div>
            </div>      
        </div>
        <script>
            $(function(){
                $(".toggle").on("click",function(){
                    if($(".kategoria").hasClass("active")){
                        $(".kategoria").removeClass("active");
                        $(".menu_cale").removeClass("active");
                    }
                    else{
                        $(".kategoria").addClass("active");
                        $(".menu_cale").addClass("active");
                    }
                });
            });
        </script>
        <nav class="nabar sticky-top" id="menu_cale">
            <div class="po_zmianie grid row gridcount">
                <div class="toggle col-4">
                    <span class="bars"></span>
                </div>
                <div class="logowanie_w_menu col-4">
                    <a href="logowanie.html"><p class="loguj"> ZALOGUJ SIĘ </p></a>
                </div>
                <div class="koszyk_w_menu col-4">
                    <a href="koszyk.html"><img class="koszy" src="ikony/koszyk.png" alt="alt"/></a>
                </div>
                
            </div>
           
            <?php
            include('php/getSubpages.php');
           ?> 
        </nav>
        <!-- reszta -->
        <div class="space_between_slider"> 
        </div> 
        <a href="logowanie.html" class="back_main_page">LOGOWANIE</a> 
        <div class="zawartosc">  
           
                <div class="odzysykiwanie_panel">
                    <h3 class="nap">Nie pamiętasz hasła?</h3>
                    <div class="napis_odzyskiwania">
                        Proszę podać email, na którym zarejestrowane jest konto. W ciągu 5 minut otrzymasz link do zresetowania hasła.
                    </div>
                    <div class="in_odz">
                        Email  
                        <input type="text" name="email" class="input_odzyskiwanie">
                        <button type="button" name="button" class="button_odzsykiwania">WYŚLIJ</button>
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
                        <img src="ikony/poczta.png" alt="alt" class="ikona_poczty"/>
                    </div>
                    <div class="mail col-6">
                        <span>435432543</span>
                    </div>
                    <div class="mail_ikona col-6">
                        <img src="ikony/telefon.png" alt="alt" class="ikona_poczty"/>
                    </div>
                    <div class="mail col-6">
                        <a class="twitter" href="https://twitter.com/gumiak_">@Gumiak_</a>
                    </div>
                    <div class="mail_ikona col-6">
                        <img src="ikony/twitter.png" alt="alt" class="ikona_poczty"/>
                    </div>
      
                    
                </div>
            </div>
                
            </div>
        </div>     
    </body>
</html>
