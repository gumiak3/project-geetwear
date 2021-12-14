<?php
if(isset($_POST['id']))
{
    $order_id = $_POST['id'];
    include("../../php/load_database.php");
    $stmt_get_products = $pdo->query("SELECT product_name,basket.amount as product_amount,size FROM basket INNER JOIN products on basket.id=products.id where id_order=$order_id");
    echo "<table class='ordered_products_table'>";
    ?>
    <thead class="table-head">
        <tr>
        <th scope="col">PRODUKT</th>
        <th scope="col">ROZMIAR</th>
        <th scope="col">ILOŚĆ</th>      
        </tr>
    </thead>
    <tbody class="table-body">
    <?php
    foreach($stmt_get_products as $row_products){
        echo "<tr class='ordered-products'>";
        echo "<td>".$row_products['product_name']."</td>";
        echo "<td>".$row_products['size']."</td>";
        echo "<td>".$row_products['product_amount']."</td>";
        echo "</tr>";
    }
    echo "</tbody></table>";
}
?>
