<div class="produkty">
<ul id="produkt-grid" class="newproduct_grid product_list grid row gridcount">
<?php
include('load_database.php') ;

if(isset($_POST['filtr'])){
    echo 'dupa';
    $sort_size = $_POST['sort_size'];
    $sort_rest = $_POST['sort_rest'];
    $idc = $_POST['id'];
    echo $sort_rest;
    $stmt = $pdo->prepare('SELECT DISTINCT id_product, product_name, price FROM products ORDER BY :sort_rest WHERE size = :sort_size AND id_category = '.$idc);
    $stmt->bindValue(':sort_size',$_POST['sort_size'],PDO::PARAM_STR);
    $stmt->bindValue(':sort_rest',$_POST['sort_rest'],PDO::PARAM_STR);
    $stmt->execute();

}else{
    $idc = $_POST['id'];
    $stmt = $pdo->prepare('SELECT DISTINCT id_product, product_name, price FROM products WHERE id_category = '.$idc);
    $stmt->execute();
}
            


$html = '';

foreach ($stmt as $row){
    $stmt2 = $pdo->query('SELECT * FROM gallery WHERE main = 1 AND id_product='.$row['id_product']);
    $html.= '<li class="col-xs-12 col-sm-6 col-md-6 col-lg-4" id="produkt_calosc">';
    $html .= '<form method="post" action="produkt.php">';
    foreach($stmt2 as $row2){
        $html .='<input type="image" src="'.$row2['foto'].'" alt="Submit" class="produkt"><input type="hidden" name="id_product" value="'.$row['id_product'].'">';
    }
    $html .='<div class="product-description">';
    $html .='<span class="product-title"><a href="produkt.php" class="produkt1">'.$row['product_name'].'</a></span>';
    $html .='<div class="product-price">';
    $html .='<span class="cena">'. $row['price'].' zł</span>';
    $html .='</div></div></form></li>';
}
echo $html;
?>
</ul>
</div>