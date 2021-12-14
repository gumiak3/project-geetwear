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
        <link href="css/rejestracja.css" rel="stylesheet" type="text/css"/>
        <link rel="shortcut icon" type="image/png" href="ikony/ikona1.png">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
        <?php
            include("./php/load_database.php");
        ?>
        <div class="row" id="logo_zaw">
            <div class="help">   
            </div>    
            <div class="logo">
                <a href="index.php"><img src="photos/logo3.png" alt="logo"></a>  
            </div>
            <div class="rightsite">
                <div class="logowanie">
                    <a href="logowanie.php"><p class="loguj"> ZALOGUJ SIĘ </p></a>
                </div>
                <div class="wyszukiwanie">
                    <a href="wyszukiwarka.php"><img class="lupa" src="ikony/lupa.png" alt="alt"/></a>
                </div>
                <div class="koszyk">
                    <a href="koszyk.php"><img class="koszy" src="ikony/koszyk.png" alt="alt"/></a>
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
                    <a href="logowanie.php"><p class="loguj"> ZALOGUJ SIĘ </p></a>
                </div>
                <div class="koszyk_w_menu col-4">
                    <a href="koszyk.php"><img class="koszy" src="ikony/koszyk.png" alt="alt"/></a>
                </div>
                
            </div>
           
            <?php
            include('php/getSubpages.php');
           ?> 
        </nav>
        <!-- reszta -->
        <div class="space_between_slider"> 
        </div>
        <div class="zawartosc"> 
            <h2 class="h1 title_of_product col-lg-12 ">ZAŁÓŻ KONTO</h2>
                <!-- logowanie -->
               <?php include("./php/registration.php");?>
                <div id='error-div'></div>
                <form class="panel_logowania row " method="POST">
                    <div class="imie_napis col-xs-12 col-sm-12 col-lg-5">
                    Imię:
                    </div>
                    <div class="imie_pole col-xs-12 col-sm-12 col-lg-7">
                    <input class="input_logowanie" required name="firstname" type="text" id="input_imie" value="<?php if(isset($_POST['make_account']))echo $_POST['firstname']?>">
                    </div>
                    <div class="nazwisko_napis col-xs-12 col-sm-12 col-lg-5">
                    Nazwisko:
                    </div>
                    <div class="nazwisko_pole col-xs-12 col-sm-12 col-lg-7">
                    <input class="input_logowanie" required name="surname" type="text" id="input_nazwisko" value="<?php if(isset($_POST['make_account']))echo $_POST['surname']?>">
                    </div>
                    <div class="login_napis col-xs-12 col-sm-12 col-lg-5">
                    Email:
                    </div>
                    <div class="login_pole col-xs-12 col-sm-12 col-lg-7">
                    <input class="input_logowanie" type='text' requried name="email" type="email" id="input_login">
                    </div>
                    <div class="haslo_napis col-xs-12 col-sm-12 col-lg-5">
                    Hasło:
                    </div>
                    <div class="haslo_pole col-xs-12 col-sm-12 col-lg-7">
                    <input class="input_logowanie" required name="password" type="password" id="input_haslo">
                    </div>
                    <div class="akceptacja_regulaminu col-12">
                        <input type="checkbox" required name="checkbox_submit"> Akceptuje regulamin
                    </div>
                    <div class="panel_logowanie_button col-12">
                        <button class="button_logowanie" type="submit" name="make_account">ZAŁÓŻ KONTO</button>
                    </div>
                    <div class="napis_1 col-12">
                        <a href="logowanie.php">Posiadam już konto</a>
                    </div>
                </form>
        </div>     
        <div class="fotter">
            <div class='content-fotter container'>
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
    </body>
</html>
