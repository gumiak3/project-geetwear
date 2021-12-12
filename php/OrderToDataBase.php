<?php
session_start();
ob_start();
include('load_database');
class Product
{
    public $id;
    public $amount;
    public $price;
}
$basket = $_SESSION['basket'];
$fname= $_POST["firstname"];
$sname= $_POST["surname"];
$city= $_POST["city"];
$street= $_POST["street"];
$zip= $_POST["zip"];
$house_number= $_POST["house_number"];
$apartment_number= $_POST["apartment_number"];
if(isset($_SESSION['login'])){
    $stmt68 = $pdo->query('SELECT id_order FROM basket ORDER BY id_order DESC LIMIT 1');
    foreach($stmt68 as $row68){
        $last_order_id = $row68['id_order'];
    }
    $current_order=$last_order_id+1;
    $stmt69 = $pdo->exec('INSERT INTO basket (id_user, id, amount, id_order) VALUES ('.$_SESSION['id_user'].', )');

}
?>