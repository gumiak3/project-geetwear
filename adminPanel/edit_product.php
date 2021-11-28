<?php
 if(isset($_POST['id']) && !empty($_POST['id'])) {
    $id = $_POST['id'];
    $result;
    include("../php/load_database.php");
    $stmt = $pdo->prepare("SELECT * FROM products where id_product=$id");
    $stmt->execute();
    echo "<label>Nazwa produktu</label>";
    foreach($stmt as $row)
    {
        $product_name = $row['product_name'];
        $id_category=$row['id_category'];
    }
    echo "<input name='product_name' value='$product_name'></input><br>";
    echo "<label>Kategoria</label>";
    ?>
    <select name='product_category'>
    <?php
    $get_categories = $pdo->query("SELECT * from categories");
    foreach($get_categories as $row_categories)
    {
        echo "<option value='".$row_categories['id_category']."'";
        if($id_category==$row_categories['id_category']) echo 'selected';
        echo ">".$row_categories['category_name']."</option>";
    }
    ?> 
    </select>
    <table id="MyTable" class="table table-striped">
    <thead class="table-head">
        <tr>
        <th scope="col">ROZMIAR</th>
        <th scope="col">ILOŚĆ</th> 
        <th scope="col">EDYCJA</th> 
        <th scope="col">USUWANIE</th> 
        </tr>
    </thead>
    <tbody class="table-body">
    <?php
        $stmt_get_sizes = $pdo->query("SELECT * from products where id_product=$id");
        foreach($stmt_get_sizes as $row_sizes)
        {
            echo "<tr>";
            echo "<td>".$row_sizes['size']."</td>";
            $size = $row_sizes['size'];
            echo "<td>".$row_sizes['amount']."</td>";
            $stmt_id = $pdo->query("SELECT * from products where id_product=$id and size='$size'"); // ID OF ACTUALL PRODUCT IT WILL BE HELPFUL FOR DELETE OR IN EDITTING OF SIZE
            foreach($stmt_id as $row_id)
            {
                $primary_id = $row_id['id'];
            }
            ?>
            <td><button name='edit_send' class="edit_data btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"  class='edit_record' data-toggle="modal" data-target="mymodal"id="<?=$row_products['id_product']?>" value="<?=$row_products['id_product']?>">EDYCJA</button></td>
            <form method="POST" onsubmit="return confirm('Czy na pewno chcesz usunąć ten rekord?');">
            <td><button type='submit' name='delete_send' class='delete_record' value="<?=$primary_id?>">USUŃ</button></td>
            </form>
            <?php
            echo "</tr>";
        }
    ?>
    </tbody>
    </table>  
    <?php
}
?>

