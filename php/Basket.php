<?php
session_start();
ob_start();
include('load_database.php');
class Product
{
    public $id;
    public $amount;
}
if (count($_SESSION['basket'])>0) {
    $basket = $_SESSION['basket'];
    $index=0;
    foreach ($basket as $product) {
        $id = $product->id;
        $amount = $product->amount;
        $stmt300 = $pdo->prepare('SELECT * FROM products WHERE id = :id');
        $stmt300->bindValue(':id', $id, PDO::PARAM_STR);
        $stmt300->execute();
        foreach ($stmt300 as $row300) {
        }

        $id_product = $row300['id_product'];
        $stmt301 = $pdo->prepare('SELECT * FROM gallery WHERE main = 1 AND id_product = :id_product');
        $stmt301->bindValue(':id_product', $id_product, PDO::PARAM_STR);
        $stmt301->execute();
        foreach ($stmt301 as $row301) {
        }

        $html = '';
        $html .= '<div class="produkt_koszyk row" name="'.$index.'">';
        $html .= '<div class="usuwanko col-1">';
        $html .= '<button id="usuwanko" class="przycisk_usuwania" name="usun"><img src="ikony/delete.png" class="ikona_delete" alt="alt"></button>';
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
        $html .= 'Męska Bluza to kwintesencja sportowej elegancji, co wpływa na fakt, że jest podstawowym elementem każdej garderoby. Czarny kolor bluzy pasuje do wszystkiego, a sama bluzy świetnie prezentuje się na sylwetce.';
        $html .= '</div>';
        $html .= '<div class="ustawienie_ilości col-xs-12 col-sm-2 col-lg-2">ILOŚĆ:';
        $html .= '<br>';
        $html .= '<input type="number" class="input_ilosci" min="1" max="100" value="' . $amount . '">';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '<div class="rozmiar_koszyk">ROZMIAR:' . $row300['size'];
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';
        echo $html;
        $index++;
    }
} else {
    echo "pusty elo";
}
?>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="/jscript/BasketDelete.js"></script> 