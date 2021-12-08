<?php
    if(isset($_POST['id']) && !empty($_POST['id'])){
        $id = $_POST['id'];
        include("../../php/load_database.php");
        $delete = $pdo->exec("DELETE FROM products where id=$id");
        
    }
?>