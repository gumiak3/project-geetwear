
<?php
include('load_database.php') ;


$stmt = $pdo->query('SELECT * FROM products');

$html = '';

foreach ($stmt as $row){
    $html .= '<div><form method="post" action="produkt.php">'.$row['id_product']. $row['product_name']. $row['id_category']. $row['price']. $row['amount'];
    $stmt2 = $pdo->query('SELECT * FROM gallery WHERE main = 1 AND id_product='.$row['id_product']);
    foreach($stmt2 as $row2){
        $html .=$row2['id_foto'].'<input type="image" src="'.$row2['foto'].'" alt="Submit" class="produkt"><input type="hidden" name="id_product" value="'.$row['id_product'].'">';
    }
    $html .='</div></form>';
}
echo $html;
?>





