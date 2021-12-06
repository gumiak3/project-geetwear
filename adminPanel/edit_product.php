<?php
 if(isset($_POST['id']) && !empty($_POST['id'])) {
    $id = $_POST['id'];
    $result;
    include("../php/load_database.php");
    $stmt = $pdo->prepare("SELECT * FROM products where id_product=$id");
    $stmt->execute();
    $get_main_img = $pdo->prepare("SELECT * FROM gallery where id_product=$id and main=1");
    $get_main_img->execute();
    foreach($get_main_img as $row_gallery)
    {
        $main_path = $row_gallery['foto'];
    }
    $get_extra_img = $pdo->prepare("SELECT foto FROM gallery where id_product=$id and main IN (2,3)");
    $get_extra_img->execute();  
    $extra_img_path = $get_extra_img->fetchALL(PDO::FETCH_COLUMN, 0);
    ?>
    <div class='images'>
        <div class='main-image'>
            <label class='col-12'>Główne zdjęcie</label>
            <img class='main_img col-12' id="main_img_edit" src='../<?=$main_path?>'></img>
            <input style='display:none' onchange="readURL(this);" class='main-file col-12' type="file" accept="image/gif, image/jpeg, image/png" name="fileToUploadMain" id="fileToUpload_edit1">
        </div>
        <div class='extra-images row'>
            <label class='col-12'>Dodatkowe zdjęcia</label>
            <img class='under_img col-6' id="under_img_edit2" src="../<?=$extra_img_path[0]?>" alt="" />
            <img class='under_img col-6' id="under_img_edit3"  src="../<?=$extra_img_path[1]?>" alt="" />
            <input style='display:none' class='under-file col-6' type="file" onchange="readURL2(this);" accept="image/gif, image/jpeg, image/png" name="fileToUpload2" id="fileToUpload_edit2">
            <input style='display:none' class='under-file col-6'type="file" onchange="readURL3(this);" accept="image/gif, image/jpeg, image/png" name="fileToUpload3" id="fileToUpload_edit3">
        </div>
    </div>



    <?php
    echo "<label>Nazwa produktu</label>";
    foreach($stmt as $row)
    {
        $product_name = $row['product_name'];
        $id_category=$row['id_category'];
        $price = $row['price'];
    }
    echo "<input type='hidden' name='product_id' value='$id'></input><br>";
    echo "<input name='product_name' value='$product_name'></input><br>";
    echo "<label>Kategoria</label><br>";
    ?>
    <select class='select-category' name='product_category'>
    <?php
    $get_categories = $pdo->query("SELECT * from categories");
    foreach($get_categories as $row_categories)
    {
        echo "<option value='".$row_categories['id_category']."'";
        if($id_category==$row_categories['id_category']) echo 'selected';
        echo ">".$row_categories['category_name']."</option>";
    }
    ?> 
    </select><br>
    <label>Cena</label>
    <input name='price' value=<?=$price?> ></input>
    <h3>ROZMIARY</h3>
    <div class='row'>
        <div>
            
        </div>
    <?php
        $stmt_get_sizes = $pdo->query("SELECT * from products where id_product=$id");
        foreach($stmt_get_sizes as $row_sizes)
        {
            echo "<div class='div-of-size col-12'>";
            echo "<input required class='input-size col-6' name='size[]' type='text' value='".$row_sizes['size']."'></input>";
            $size = $row_sizes['size'];
            echo "<input required class='input-size col-6' name='amount[]' type='number' value='".$row_sizes['amount']."'>";
            $stmt_id = $pdo->query("SELECT * from products where id_product=$id and size='$size'"); // ID OF ACTUALL PRODUCT IT WILL BE HELPFUL FOR DELETE OR IN EDITTING OF SIZE
            foreach($stmt_id as $row_id)
            {
                $primary_id = $row_id['id'];
            }
            ?> 
            <form method="POST" class='delete-size'onsubmit="return confirm('Czy na pewno chcesz usunąć ten rekord?');">
        <td><button type='submit' name='delete-size-send' class='delete_record col-5' value="<?=$primary_id?>">USUŃ</button></td>
        </form>      
            <?php
        }
        echo "</div>";
        echo "<div class='div-of-extra-size row'>";
        
        echo "</div>";
        echo "<button id='add_input'>Add</button>";
    ?>
    <?php
}
?>
 
