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
    <h3>ROZMIARY</h3>
    <?php
        $stmt_get_sizes = $pdo->query("SELECT * from products where id_product=$id");
        foreach($stmt_get_sizes as $row_sizes)
        {
            echo "<div class='div-of-size'><form class='edit-size'method='POST'>";
            echo "<input class='input-size' name='input-size' type='text' value='".$row_sizes['size']."'></input>";
            $size = $row_sizes['size'];
            echo "<input class='input-size' name='input-amount' type='number' value='".$row_sizes['amount']."'>";
            $stmt_id = $pdo->query("SELECT * from products where id_product=$id and size='$size'"); // ID OF ACTUALL PRODUCT IT WILL BE HELPFUL FOR DELETE OR IN EDITTING OF SIZE
            foreach($stmt_id as $row_id)
            {
                $primary_id = $row_id['id'];
            }
            ?> 
            <button name='edit-size-send' type='submit' class='edit_record' value="<?=$primary_id?>">ZAPISZ</button></form> 
            <form method="POST" class='delete-size'onsubmit="return confirm('Czy na pewno chcesz usunąć ten rekord?');">
        <td><button type='submit' name='delete-size-send' class='delete_record' value="<?=$primary_id?>">USUŃ</button></td>
        </form>      
            <?php
        }
        echo "<div class='div-of-size'><form class='add-size'method='POST'>";
        echo "<input class='input-size' name='input-size' type='text'></input>";
        echo "<input class='input-size' name='input-amount' type='text'></input>";
        echo "<button name='add-size-send' type='submit' value=$id class='edit_record'>DODAJ</button></form>";
    ?>
    <?php
}
?>

