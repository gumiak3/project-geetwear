<?php
    if(isset($_POST['id']) && !empty($_POST['id'])) {
        $id = $_POST['id'];
        include("../php/load_database.php");
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
    }
?>