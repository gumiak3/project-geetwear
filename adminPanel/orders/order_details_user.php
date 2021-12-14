<?php
if(isset($_POST['id']))
{
    $order_id = $_POST['id'];
    include("../../php/load_database.php");
    $stmt_get_id_user = $pdo->query("SELECT * FROM basket where id_order=$order_id");
    foreach($stmt_get_id_user as $row_user)
    {
        $user_id = $row_user['id_user'];
    }
    $stmt_get_user_info = $pdo->prepare("SELECT * FROM users where id_user=$user_id");
    $stmt_get_user_info->execute();
    $result = $stmt_get_user_info->fetchALL(PDO::FETCH_BOTH);
    echo json_encode($result);
}
?>