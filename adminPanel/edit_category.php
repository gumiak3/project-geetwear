<?php
    if(isset($_POST['id']) && !empty($_POST['id'])) {
        $id = $_POST['id'];
        include("../php/load_database.php");
        $stmt = $pdo->prepare("SELECT * FROM categories where id_category=$id");
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_BOTH);
        echo json_encode($result);
    }
?>