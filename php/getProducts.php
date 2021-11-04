<div class="produkty">
<?php
include('load_database.php') ;


$stmt = $pdo->query('SELECT * FROM products');

$html = '';

foreach ($stmt as $row){
    $html .= '<div><form method="post" action="produkt.php">';
    $stmt2 = $pdo->query('SELECT * FROM gallery WHERE main = 1 AND id_product='.$row['id_product']);
    $html.= '<ul id="produkt-grid" class="newproduct_grid product_list grid row gridcount">';
    $html.= '<li class="col-xs-12 col-sm-6 col-md-6 col-lg-4" id="produkt_calosc">';
    foreach($stmt2 as $row2){
        $html .='<input type="image" src="'.$row2['foto'].'" alt="Submit" class="produkt"><input type="hidden" name="id_product" value="'.$row['id_product'].'">';
    }
    $html .='<div class="product-description">';
    $html .='<span class="h3 product-title"><a href="produkt.php" class="produkt1">'.$row['product_name'].'</a></span>';
    $html .='<div class="product-price">';
    $html .='<span class="cena">'. $row['price'].'</span>';
    $html .='</div></div></li></ul>';
    $html .='</div></form>';
}
echo $html;
?>
</div>




