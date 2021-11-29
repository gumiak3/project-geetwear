<?php
ob_start();
session_start();
if($_SESSION['login']){

}else{
    header("location:logowanie.php");
}


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
        <link href="css/profile.css" rel="stylesheet" type="text/css"/>
        <link rel="shortcut icon" type="image/png" href="ikony/ikona1.png">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="newjavascript.js"></script>
    </head>
    <body>
        <?php
            include("./php/load_database.php");
        ?>
        <div class="row" id="logo_zaw">
            <div class="help">   
            </div>    
            
            <div class="logo">
                <a href="index.php"><img src="photos/logo3.png" alt="logo" class="logo_id"></a>
                
            </div>

            <div class="rightsite">
                <div class="logowanie">
                    <?php
                    if($_SESSION){
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
                            <a class="dropdown-item" href="#"><form method='POST'>
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
                        echo '<a href="logowanie.php"><p class="loguj"><img class="user_logo" src="./icons/user.png"></p></a>';
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
            include('php/getSubpages.php');
<<<<<<< HEAD
            ?>
=======
           ?> 
>>>>>>> 90433c978dbe26eb9021b5b0003ae1d790907ef9
        </nav>
        <!-- reszta -->
        <div class="space_between_slider"> 
        </div>
        <div class="zawartosc"> 
            <div class="profile-panel row">
                <div class='div-left-side-menu col-3'>
                    <ul class='left-side-menu'>
                        <li id='contact-details-btn'>Dane kontaktowe</li>
                        <li id='orders-btn'>Zamówienia</li>
                        <li></li>
                    </ul>
                </div>
                <div id='profile-content'class='profile-content col-9'>
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
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type='text/javascript'src='./jscript/profile_menu.js'></script>

<?php
    include("./php/logout.php");
?>

<?php
    if(isset($_POST['edit-submit'])){
        $id = $_SESSION['id_user'];
        $city = $_POST['city'];
        $street = $_POST['street'];
        $zip = $_POST['zip'];
        $house_number = $_POST['house_number'];
        $apartment_number = $_POST['apartment_number'];
        $stmt = $pdo->prepare("UPDATE users set city=?,street=?,zip=?,house_number=?,apartment_number=? where id_user='$id'");
        $stmt -> execute([$city,$street,$zip,$house_number,$apartment_number]);

    }
?>