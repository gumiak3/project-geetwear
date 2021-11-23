<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pl-PL">
    <head>
        <title>GEET-WEAR</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/podstrony_produktu.css" rel="stylesheet" type="text/css"/>
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
                <?php
                    if($_SESSION && $_SESSION['login']){
                        ?>
                        <div class="dropdown show">
                        <a href="logowanie.php"role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <p class="loguj"><img class="user_logo" src="./icons/user.png"></p>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="./profile.php">Profil</a>
                            <?php
                            if($_SESSION['user-type']=='admin'){
                                echo "<a class='dropdown-item' href='./admin_panel.php'>Zarządzaj</a>";
                            }
                            ?>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#"><form method='POST' action='./php/logout.php'>
                            <button name='log_out' type='submit' class='log-out'>Wyloguj się</button>
                            </form></a>
                        </div>
                        </div>
                      <?php
                    }else{
                        echo '<a href="logowanie.php"><p class="loguj"> ZALOGUJ SIĘ </p></a>';
                    }
                    ?>
                    
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
                    <?php
                    if($_SESSION){

                        echo '<a href="logowanie.php"><p class="loguj"><img src="./icons/user.png"></p></a>';
                    }else{
                        echo '<a href="logowanie.php"><p class="loguj"> ZALOGUJ SIĘ </p></a>';
                    }
                    ?>
                </div>
                <div class="koszyk_w_menu col-4">
                    <a href="koszyk.php"><img class="koszy" src="icons/koszyk.png" alt="alt"/></a>
                </div>
                
            </div>
           <?php
            include('php/getCategories.php');
           ?>
            
        </nav>
        <!-- reszta -->
        <div class="panel_podstrony_2">
            <div class="linia_podstrony">
            </div>
            <div class="panel_podstrony "> 
                <h1 class="title_of_product ">
                    <?php 
                        $idc = $_GET['idc'];
                        $stmt10 = $pdo->query('SELECT * FROM categories WHERE id_category = '.$idc);
                        foreach($stmt10 as $row10){}
                        echo $row10['category_name']
                    ?>
                </h1>
<<<<<<< HEAD
                <form method="post">
                    <div class="sortowanie_panel col-12 row">
                        <div class="panel_rozmiarow col-xs-12 col-sm-6 col-lg-6">
                            <label>Rozmiar:</label>
                            <select class="select_rozmiarow" name="sort_size">
                                <option value="0">WSZYSTKO</option>
                                <option value="1">S</option>
                                <option value="2">M</option>
                                <option value="3">L</option>
                                <option value="4">XL</option>
                                <option value="5">XXL</option>
                            </select>
                        </div>
                        <div class="panel_sortuj_wedlug col-xs-12 col-sm-6 col-lg-6">
                            <label>SORTUJ:</label>
                            <select class="select_sortuj">
                                <option value="1">A-Z</option>
                                <option value="2">Z-A</option>
                                <option value="3">Od najtańszych</option>
                                <option value="4">Od najdroższych</option>
                            </select>
                            <input type="button" name="filtr" value="FILRTUJ">
                        </div>
                    </div>
                </form>     
=======
                <from class="filtr" method="post">          
                    <div class="sortowanie_panel col-12 row">
                        <div class="panel_rozmiarow col-xs-12 col-sm-6 col-lg-6">
                            <label>ROZMIAR:</label>
                            <select name="sort_size" class="select_size">
                                <option value="0">WSZYSTKIE</option>
                                <option value="S">S</option>
                                <option value="M">M</option>
                                <option value="L">L</option>
                                <option value="XL">XL</option>
                                <option value="XXL">XXL</option>
                            </select>
                        </div>
                        <div class="panel_sortuj_wedlug col-xs-12 col-sm-6 col-lg-6">
                            <select name="sort_rest" class="select_sort">
                                <option value="product_name ASC">A-Z</option>
                                <option value="product_name DESC">Z-A</option>
                                <option value="PRICE DESC">Od najtańszych</option>
                                <option value="PRICE ASC">Od najdroższych</option>
                            </select>
                        </div>
                        
                        <input type="submit" name="filtr">
                    </div>
                </form>  
>>>>>>> df4108025830e4060f6e8e9f035860c9da218cd9
            </div>             
        </div>
        <div class="zawartosc">  
            <!--Wyświetlane produkty-->
            <?php
<<<<<<< HEAD
            echo $_POST["sort_size"];
                    $idc = $_GET['idc'];
                    echo '<script>var id_cat = '.$idc.'</script>';
=======
                $idc = $_GET['idc'];
                echo '<script>var id_cat = '.$idc.'</script>';
>>>>>>> df4108025830e4060f6e8e9f035860c9da218cd9
            ?>
            <div id="productsData"></div>
            <!-- Dół -->
                
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
        <script type="text/javascript" src="./jscript/getProductsWCat.js"></script>         
    </body>
</html>
