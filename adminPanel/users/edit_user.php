<?php
    if(isset($_POST['id']))
    {
        $id = $_POST['id'];
        include("../../php/load_database.php");
        $get_user = $pdo->prepare("SELECT * from users where id_user=$id");
        $get_user->execute();
        $result = $get_user->fetch(PDO::FETCH_BOTH);
        echo json_encode($result);
    }
?>