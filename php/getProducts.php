<?php
include('load_database.php') ;


$stmt = $pdo->query('SELECT * FROM products');

$html = '';

foreach ($stmt as $row){
    $html .= '<div>'.$row['id_product']. $row['product_name']. $row['id_category']. $row['price']. $row['amount'];
    $stmt2 = $pdo->query('SELECT * FROM gallery WHERE main = 1 AND id_product='.$row['id_product']);
    foreach($stmt2 as $row2){
        $html .=$row2['id_foto'].'<img src="'.$row2['foto'].'" alt="product" class="produkt"></div>';
    }
}
echo $html;
?>



