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
        <link href="css/produkt.css" rel="stylesheet" type="text/css"/>
        <link rel="shortcut icon" type="image/png" href="ikony/ikona1.png">
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="newjavascript.js"></script>
    </head>
    <body>
        <?php
            include('php/load_database.php') ;
            $id_product = $_POST['id_product'];
            $stmt = $pdo->query('SELECT * FROM products WHERE id_product='.$id_product);
            echo $_POST['id_product'];
            foreach ($stmt as $row) {
                
                $stmt2 = $pdo->query('SELECT * FROM gallery WHERE id_product='.$row['id_product']);
                foreach($stmt2 as $row2){
                }
                $stmt3 = $pdo->query('SELECT * FROM gallery WHERE main = 1 AND id_product='.$row['id_product']);
                foreach($stmt3 as $row3){
                }
            }
        ?>
        
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
                <li class="kategoria"><a href="nowosc.html">NOWOŚCI</a></li>
                <li class="kategoria"><a href="bluzy.html">BLUZY</a></li>
                <li class="kategoria"><a href="Koszulki.html">KOSZULKI</a></li>
                <li class="kategoria"><a href="Skarpety.html">SKARPETY</a></li>
                <li class="kategoria"><a href="Bielizna.html">BIELIZNA</a></li>
                <li class="kategoria"><a href="Gadżety.html">GADŻETY</a></li>
                <li class="kategoria"><a href="Inne.html">INNE</a></li>
               
            </ul>
        </nav>
        <!-- reszta -->
        <div class="space_between_slider"> 
            
        </div>
            <a href="index.php" class="back_main_page col-12">STRONA GŁÓWNA</a> 
        <div class="zawartosc">  



            <div class="calosc row grid ">
                <div class="zdjecie_produktu col-xs-12 col-sm-12 col-lg-6">
                    <img src="<?php echo $row3['foto']?>" alt="product" id="produkt">
                </div>
                <div class="nazwa_produktu col-xs-12 col-sm-12 col-lg-6">
                    <h1 id="nazwa_produktu_id"><?php echo $row['product_name']?></h1>
                    <div class="cena_produktu col-12">
                    <?php echo $row['price']?>
                    </div>
                    <div class="opis_produktu col-12">
                        <p>Męska koszulka polo to kwintesencja sportowej elegancji, co wpływa na fakt, że jest podstawowym elementem każdej garderoby. Czarny kolor koszulki pasuje do wszystkiego, a sama koszulka świetnie prezentuje się na sylwetce. Bezwarunkowo jest to podstawa w szafie, którą można nosić z wieloma rzeczami i zawsze wyglądać świetnie!</p>
                        <ul>
                            <li class="wypunktowane">Produkcja: Polska, z troską o naturalne środowisko.</li>
                            <li class="wypunktowane">Materiał: 100% bawełna, splot pique</li>
                            <li class="wypunktowane">Tkanina: wytrzymała, o gramaturze 210 g/m²</li>
                        </ul>                    
                    </div>    
                </div>
                <div class="zdjecia_pod col-xs-12 col-sm-12 col-lg-6" id="zdjecia_pod">
                   <img src="photos/produkty/koszulka_model.jpg" alt="product" class="zdjecie_produktu_small"> 
                   <img src="photos/produkty/koszulka.jpg" alt="product" class="zdjecie_produktu_small">
                   <img src="photos/produkty/koszulka_model_back.jpg" alt="product" class="zdjecie_produktu_small"> 
                </div>
                <div class="przyciski_pod col-xs-12 col-sm-12 col-lg-6 row">
                    <div class="ustawienie_rozmiaru col-xs-12 col-sm-3 col-lg-3">
                        ROZMIAR:
                        <br>
                        <select class="input_rozmiaru">
                      <option value="1" title="S">S</option>
                      <option value="2" title="M">M</option>
                      <option value="3" title="L">L</option>
                      <option value="4" title="XL" selected="selected">XL</option>
                      <option value="5" title="XXL">XXL</option>
                     </select>
                    </div>
                    <div class="ustawienie_ilości col-xs-12 col-sm-3 col-lg-3">
                        ILOŚĆ:
                        <br>
                        <input type="number" class="input_ilosci" min="1" max="100" value="<?php echo $row['amount']?>" >
                    </div>
                    <div class="przycisk_dodaj_do_koszyka col-xs-12 col-sm-6 col-lg-6">
                        <button class="przycisk_koszyk" type="button">DO KOSZYKA</button>
                    </div>
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