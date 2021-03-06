<?php
session_start();
ob_start();
include('load_database.php');

class Product
{
    public $id;
    public $amount;
    public $price;
}
$html = '';
$html .= '<div class="tabela_koszyka  col-xs-5 col-lg-9 row">';
$html .= '<div class="napis_koszyk col-12">KOSZYK</div>';
$html .= '<div class="srodek_koszyk">';
$_SESSION['price'] = 0;
if (isset($_SESSION['basket'])) {
    if (count($_SESSION['basket']) > 0) {
        $basket = $_SESSION['basket'];
        foreach ($basket as $product) {
            $index = array_search($product, $basket);
            $id = $product->id;
            $amount = $product->amount;

            $stmt300 = $pdo->prepare('SELECT * FROM products WHERE id = :id');
            $stmt300->bindValue(':id', $id, PDO::PARAM_STR);
            $stmt300->execute();
            foreach ($stmt300 as $row300) {
                $price = $row300['price'] * $amount;
            }


            $id_product = $row300['id_product'];
            $stmt301 = $pdo->prepare('SELECT * FROM gallery WHERE main = 1 AND id_product = :id_product');
            $stmt301->bindValue(':id_product', $id_product, PDO::PARAM_STR);
            $stmt301->execute();
            foreach ($stmt301 as $row301) {
            }
            $_SESSION['price'] += (float)$price;

            $html .= '<div class="produkt_koszyk row" id="' . $index . '">';
            $html .= '<div class="usuwanko col-1">';
            $html .= '<input type="hidden" id="index" value="' . $index . '"><button id="usuwanko" value="' . $index . '" class="przycisk_usuwania" name="usun"><img src="ikony/delete.png" class="ikona_delete" alt="alt"></button>';
            $html .= '</div>';
            $html .= '<div class="zdjecie_produktu_koszyk col-xs-12 col-sm-3 col-lg-3 ">';
            $html .= '<img src="' . $row301['foto'] . '" id="zdjecie_w_koszyku" alt="alt" />';
            $html .= '</div>';
            $html .= '<div class="opis_produktu_koszyk  col-xs-12 col-sm-8 col-lg-7 row">';
            $html .= '<div class="nazwa_produktu col-12 row">';
            $html .= '<div class="nazwa">';
            $html .= $row300['product_name'];
            $html .= '</div>';
            $html .= '<div class="opis_produktu col-xs-12 col-sm-10 col-lg-10">';
            $html .= 'M??ska Bluza to kwintesencja sportowej elegancji, co wp??ywa na fakt, ??e jest podstawowym elementem ka??dej garderoby. Czarny kolor bluzy pasuje do wszystkiego, a sama bluzy ??wietnie prezentuje si?? na sylwetce.';
            $html .= '</div>';
            $html .= '<div class="ustawienie_ilo??ci col-xs-12 col-sm-2 col-lg-2">ILO????:' . $amount;
            $html .= '<br>';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '<div class="rozmiar_koszyk">ROZMIAR:' . $row300['size'];
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</div>';
            $index++;
        }
    } else {
        $html .= 'pusty elo';
    }
} else {
    $html .= 'pusty elo';
}

$html .= '</div>';
$html .= '</div>';
$html .= '<div class="zestawienie_platnosci col-xs-12 col-lg-3 row">';
$html .= '<div class="kwota col-6">KWOTA</div>';
$html .= '<div class="kwota_z?? col-6">' . $_SESSION['price'] . ' z??' . '</div>';
$html .= '<div class="wysy??ka col-6">WYSY??KA</div>';
$html .= '<div class="wysy??ka_z?? col-6">8,99 z??</div>';
$html .= '<div class="linia "></div>';
$html .= '<div class="razem col-6">RAZEM</div>';
$html .= '<div class="razem_z?? col-6">' . $_SESSION['price'] + 8.99 . ' z??' . '</div>';
$html .= '<div class="linia "></div>';
$html .= '<div class="zakonczenie_platnosci_przycisk col-12">';
if($_SESSION['price']==0){
    $dupa="disabled";
}else{
    $dupa="";
}
$html .= '<a href="order.php"><button class="przycisk_zakonczenia" type="button" name="zrealizuj" '.$dupa.'>ZREALIZUJ ZAM??WIENIE</button></a>';
$html .= '</div>';
$html .= '</div>';

echo $html;
$_SESSION['alert']=true;