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
        <link href="css/podstrony_produktu.css" rel="stylesheet" type="text/css"/>
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
        <div class="panel_podstrony_2">
            <div class="linia_podstrony">
                
            </div>
                <div class="panel_podstrony "> 
                  <h1 class="title_of_product ">NOWOŚCI</h1>  
                  
                    <div class="sortowanie_panel col-12 row">
                        <div class="panel_rozmiarow col-xs-12 col-sm-6 col-lg-6">
                            <select class="select_rozmiarow ">
                                <option value="0">ROZMIAR</option>
                                <option value="1">S</option>
                                <option value="2">M</option>
                                <option value="3">L</option>
                                <option value="4">XL</option>
                                <option value="5">XXL</option>
                            </select>
                        </div>
                        <div class="panel_sortuj_wedlug col-xs-12 col-sm-6 col-lg-6">
                            <select class="select_sortuj">
                                <option value="0">SORTUJ</option>
                                <option value="1">Od najtańszych</option>
                                <option value="2">Od najdroższych</option>
                                <option value="3">A-Z</option>
                                <option value="4">Z-A</option>
                            </select>
                        </div>
                    </div>  
                </div>                
        </div>        
        <div class="zawartosc">               
                <div class="produkty">
                <ul id="produkt-grid" class="newproduct_grid product_list grid row gridcount">
                    <li class="col-xs-12 col-sm-6 col-md-6 col-lg-4" id="produkt_calosc">
                        <a href="produkt.html" ><img src="photos/produkty/koszulka.jpg" alt="product" class="produkt"></a>
                        <div class="product-description">
                            <span class="h3 product-title"><a href="produkt.html" class="produkt1">Czarna Koszulka</a></span>
                            <div class="product-price">
                                <span class="cena">19,99 zł</span>
                            </div>
                        </div>
                    </li>
                    <li class="product_item col-xs-12 col-sm-6 col-md-6 col-lg-4" id="produkt_calosc2">
                        <a href="produkt2.html" id="img_product" > <img src="photos/produkty/koszulka.jpg" alt="product" class="produkt"></a>
                        <div class="product-description">
                            <span class="h3 product-title"><a href="produkt2.html" class="produkt1">Czarna Koszulka</a></span>
                            <div class="product-price">
                                <span class="cena">19,99 zł</span>
                            </div>
                        </div>
                    </li>
                    <li class="product_item col-xs-12 col-sm-6 col-md-6 col-lg-4" id="produkt_calosc3">
                        <a href="produkt3.html" > <img src="photos/produkty/bluza_4.jpg" alt="product" class="produkt"></a>
                        <div class="product-description">
                            <span class="h3 product-title"><a href="produkt3.html" class="produkt1">Szara Bluza z długim rękawem</a></span>
                            <div class="product-price">
                                <span class="cena">89,99 zł</span>
                            </div>
                        </div>
                    </li>
                    <li class="product_item col-xs-12 col-sm-6 col-md-6 col-lg-4" id="produkt_calosc4">
                        <a href="produkt4.html" > <img src="photos/produkty/bluza_3.jpg" alt="product" class="produkt"></a>
                        <div class="product-description">
                            <span class="h3 product-title"><a href="produkt4.html" class="produkt1">Bluza Adias </a></span>
                            <div class="product-price">
                                <span class="cena">129,99 zł</span>
                            </div>
                        </div>
                    </li>
                    
                    <li class="product_item col-xs-12 col-sm-6 col-md-6 col-lg-4" id="produkt_calosc5">
                        <a href="produkt5.html" > <img src="photos/produkty/bluza_2.jpg" alt="product" class="produkt"></a>
                        <div class="product-description">
                            <span class="h3 product-title"><a href="produkt5.html" class="produkt1">Czarna Bluza z długim rękawem</a></span>
                            <div class="product-price">
                                <span class="cena">99,99 zł</span>
                            </div>
                        </div>
                    </li>
                    <li class="product_item col-xs-12 col-sm-6 col-md-6 col-lg-4" id="produkt_calosc6">
                        <a href="produkt6.html" > <img src="photos/produkty/bluza_1.jpg" alt="product" class="produkt"></a>
                        <div class="product-description">
                            <span class="h3 product-title"><a href="produkt6.html" class="produkt1">Czarna Bluza UFO</a></span>
                            <div class="product-price">
                                <span class="cena">219,99 zł</span>
                            </div>
                        </div>
                    </li>
                    
                    
                </ul>  
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
