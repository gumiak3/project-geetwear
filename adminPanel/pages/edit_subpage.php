<?php
    if(isset($_POST['id']))
    {
        include("../../php/load_database.php");
        $id = $_POST['id'];
        $get_subpages = $pdo->prepare("SELECT * FROM subpages where id_subpage=$id");
        $get_subpages->execute();
        $result = $get_subpages->fetchALL(PDO::FETCH_BOTH);
        echo json_encode($result);        
    }
?>