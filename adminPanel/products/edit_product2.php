<?php
    if(isset($_POST['id']) && !empty($_POST['id'])) {
        $id = $_POST['id'];
        include("../../php/load_database.php");
        $stmt = $pdo->prepare("SELECT * FROM products where id_product=$id");
        $stmt->execute();
        $result = $stmt->fetchALL(PDO::FETCH_BOTH);
        echo json_encode($result);
    }
?>