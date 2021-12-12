<?php
    if(isset($_POST['id']) && !empty($_POST['id'])) {
        $id = $_POST['id'];
        include("../../php/load_database.php");
        $stmt_get_sizes = $pdo->query("SELECT * from products where id_product=$id");
        foreach($stmt_get_sizes as $row_sizes)
        {
            $size = $row_sizes['size'];
            $stmt_id = $pdo->query("SELECT * from products where id_product=$id and size='$size'"); // ID OF ACTUALL PRODUCT IT WILL BE HELPFUL FOR DELETE OR IN EDITTING OF SIZE
            foreach($stmt_id as $row_id)
            {
                $primary_id = $row_id['id'];
            }
            echo "<div class='div-of-size col-12'>";
            echo "<input required class='input-size col-4' name='size[]' id=".$primary_id." type='text' value='".$row_sizes['size']."'></input>";
            
            echo "<input required class='input-size col-4' name='amount[]' id=".$primary_id." type='number' value='".$row_sizes['amount']."'>";
            
            ?> 
            
        <td><button type='button' name='delete-size-send' onclick="return confirm('Czy na pewno chcesz usunąć ten rekord??');" class='delete_record col-4' id="<?=$primary_id?>" value="<?=$primary_id?>">USUŃ</button></td>
 
        </div>    
            <?php
        }
    }
?>