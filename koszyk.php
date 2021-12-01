<?php
session_start();
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
    <link href="css/koszyk.css" rel="stylesheet" type="text/css" />
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
                <a href="logowanie.php">
                    <p class="loguj"> ZALOGUJ SIĘ </p>
                </a>
            </div>
            <div class="wyszukiwanie">
                <a href="wyszukiwarka.html"><img class="lupa" src="ikony/lupa.png" alt="alt" /></a>
            </div>
            <div class="koszyk">
                <a href="koszyk.php"><img class="koszy" src="ikony/koszyk.png" alt="alt" /></a>
            </div>
        </div>
    </div>
    <script>
        $(function() {
            $(".toggle").on("click", function() {
                if ($(".kategoria").hasClass("active")) {
                    $(".kategoria").removeClass("active");
                    $(".menu_cale").removeClass("active");
                } else {
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
                <a href="logowanie.php">
                    <p class="loguj"> ZALOGUJ SIĘ </p>
                </a>
            </div>
            <div class="koszyk_w_menu col-4">
                <a href="koszyk.php"><img class="koszy" src="ikony/koszyk.png" alt="alt" /></a>
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

        <div class="caly_koszyk ">
            <div class="tabela_koszyka  col-xs-5 col-lg-9 row">
                <div class="napis_koszyk col-12">
                    KOSZYK
                </div>
                <?php
                include('php/load_database.php');
                class Product{
                    public $id;
                    public $amount;
                }

                

                if(isset($_SESSION['basket'])){
                    $basket = $_SESSION['basket'];
                    foreach($basket as $product){
                        $id = $product->id;
                        $amount = $product->amount;
                        $stmt300 = $pdo->prepare('SELECT * FROM products WHERE id = :id');
                        $stmt300->bindValue(':id',$id,PDO::PARAM_STR);
                        $stmt300->execute();
                        foreach($stmt300 as $row300){}

                        $id_product=$row300['id_product'];
                        $stmt301 = $pdo->prepare('SELECT * FROM gallery WHERE main = 1 AND id_product = :id_product');
                        $stmt301->bindValue(':id_product',$id_product,PDO::PARAM_STR);
                        $stmt301->execute();
                        foreach($stmt301 as $row301){}
                        
                        $html = '';
                        $html .= '<div class="produkt_koszyk row">';
                        $html .= '<div class="usuwanko col-1">';
                        $html .= '<button type="button" class="przycisk_usuwania" name="button"><img src="ikony/delete.png" class="ikona_delete" alt="alt"></button>';
                        $html .= '</div>';
                        $html .= '<div class="zdjecie_produktu_koszyk col-xs-12 col-sm-3 col-lg-3 ">';
                        $html .= '<img src="'.$row301['foto'].'" id="zdjecie_w_koszyku" alt="alt" />';
                        $html .= '</div>';
                        $html .= '<div class="opis_produktu_koszyk  col-xs-12 col-sm-8 col-lg-7 row">';
                        $html .= '<div class="nazwa_produktu col-12 row">';
                        $html .= '<div class="nazwa">';
                        $html .= $row300['product_name'];
                        $html .= '</div>';
                        $html .= '<div class="opis_produktu col-xs-12 col-sm-10 col-lg-10">';
                        $html .= 'Męska Bluza to kwintesencja sportowej elegancji, co wpływa na fakt, że jest podstawowym elementem każdej garderoby. Czarny kolor bluzy pasuje do wszystkiego, a sama bluzy świetnie prezentuje się na sylwetce.';
                        $html .= '</div>';
                        $html .= '<div class="ustawienie_ilości col-xs-12 col-sm-2 col-lg-2">ILOŚĆ:';
                        $html .= '<br>';
                        $html .= '<input type="number" class="input_ilosci" min="1" max="100" value="'.$amount.'">';
                        $html .= '</div>';
                        $html .= '</div>';
                        $html .= '<div class="rozmiar_koszyk">ROZMIAR:'.$row300['size'];
                        $html .= '</div>';
                        $html .= '</div>';
                        $html .= '</div>';
                        echo $html;
                        
                    }
                    
                }else{
                    echo "pusty elo";
                }

                
                ?>

            </div>
            <div class="zestawienie_platnosci col-xs-12 col-lg-3 row">
                <div class="kwota col-6">
                    KWOTA
                </div>
                <div class="kwota_zł col-6">
                    219,99 zł
                </div>
                <div class="wysyłka col-6">
                    WYSYŁKA
                </div>
                <div class="wysyłka_zł col-6">
                    8,99 zł
                </div>
                <div class="linia ">
                </div>
                <div class="razem col-6">
                    RAZEM
                </div>
                <div class="razem_zł col-6">
                    228,98zł
                </div>
                <div class="linia ">
                </div>
                <div class="zakonczenie_platnosci_przycisk col-12">
                    <button class="przycisk_zakonczenia" type="button" name="button">ZREALIZUJ ZAMÓWIENIE</button>
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
                        <img src="ikony/poczta.png" alt="alt" class="ikona_poczty" />
                    </div>
                    <div class="mail col-6">
                        <span>435432543</span>
                    </div>
                    <div class="mail_ikona col-6">
                        <img src="ikony/telefon.png" alt="alt" class="ikona_poczty" />
                    </div>
                    <div class="mail col-6">
                        <a class="twitter" href="https://twitter.com/gumiak_">@Gumiak_</a>
                    </div>
                    <div class="mail_ikona col-6">
                        <img src="ikony/twitter.png" alt="alt" class="ikona_poczty" />
                    </div>


                </div>
            </div>

        </div>
    </div>
</body>

</html>