<?php
    session_start();
    if($_SESSION && isset($_SESSION['login'])){
        header("location:profile.php");
    }
    ob_start();
?>
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
        <link href="css/logowanie_css.css" rel="stylesheet" type="text/css"/>
        <link rel="shortcut icon" type="image/png" href="ikony/ikona1.png">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
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
                    <input name="basket_number" type="hidden" value="<?php if(isset($_SESSION['basket'])){echo count($_SESSION['basket']);}else{echo 0;} ?>">
                    <span class='basket_number' id='basket_number'>
                    <?php
                            if(isset($_SESSION['basket'])){
                                echo '('.count($_SESSION['basket']).')';
                            }else{
                                echo '(0)';
                            }
                        ?>
                    </span>
                    
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
                    <a href="koszyk.php"><img class="koszy" src="ikony/koszyk.png" alt="alt"/></a>
                    <input name="basket_number" type="hidden" value="<?php if(isset($_SESSION['basket'])){echo count($_SESSION['basket']);}else{echo 0;} ?>">
                    <span class='basket_number' id='basket_number'>
                    <?php
                            if(isset($_SESSION['basket'])){
                                echo '('.count($_SESSION['basket']).')';
                            }else{
                                echo '(0)';
                            }
                        ?>
                    </span>
                </div>
                
            </div>
            <ul class="menu_cale">
                <li class="kategoria"><a href="bluzy.html">Bluzy</a></li>
                <li class="kategoria"><a href="Koszulki.html">Koszulki</a></li>
                <li class="kategoria"><a href="Skarpety.html">Skiety</a></li>
            </ul>
           
            
        </nav>
        <!-- reszta -->
        <div class="space_between_slider"> 
        </div>
        <div class="zawartosc">  
            <?php
                include("./php/load_database.php")
            ?>
            <h2 class="h1 title_of_product col-lg-12 ">LOGOWANIE</h2>
                <!-- logowanie -->
                <?php 
                    include("./php/login.php");
                ?>
                <form class="panel_logowania row" method='POST'>
                    <div class="login_napis col-xs-12 col-sm-12 col-lg-5">
                    Email:
                    </div>
                    <div class="login_pole col-xs-12 col-sm-12 col-lg-7">
                    <input class="input_logowanie" name="email" type="text" id="input_login" value="<?php if(isset($_POST['try-login']))echo $_POST['email']?>">
                    </div>
                    <div class="haslo_napis col-xs-12 col-sm-12 col-lg-5">
                    Hasło:
                    </div>
                    <div class="haslo_pole col-xs-12 col-sm-12 col-lg-7">
                    <input class="input_logowanie" name="password" type="password" id="input_haslo">
                    </div>
                    <div class="panel_logowanie_button col-12">
                        <button name="try-login" class="button_logowanie" type="submit">ZALOGUJ SIĘ</button>
                    </div>
                    <div class="napis_1 col-6">
                        <a href="rejestracja.php">Nie masz konta?</a>
                    </div>
                    <div class="napis_2 col-6">
                        <a href="odzyskiwanie_hasla.php">Odzyskaj konto</a>
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
