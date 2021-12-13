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

$stmt67 = $pdo->query('SELECT id_order FROM orders ORDER BY id_order DESC LIMIT 1');
    foreach($stmt67 as $row67){
        $last_order_id = $row67['id_order'];
    }
if(empty($last_order_id)||$last_order_id==''){
    $last_order_id=0;
}

$stmt68 = $pdo->query('SELECT id FROM basket ORDER BY id DESC LIMIT 1');
    foreach($stmt68 as $row68){
        $last_basket_id = $row68['id_order'];
    }
if(empty($last_basket_id)||$last_basket_id==''){
    $last_basket_id=0;
}

$current_order=$last_order_id+1;
$current_basket=$last_basket_id+1;
$order_date=date("Y/m/d");
if(isset($_SESSION['login'])){
    
    foreach($basket as $product){
        $id=$product->id;
        $amount=$product->amount;
        $stmt69 = $pdo->exec('INSERT INTO basket (id_user, id, amount, id_order) VALUES ('.$_SESSION['id_user'].', '.$current_basket.', '.$amount.', '.$current_order.' )');
    }
    
    $stmt70 = $pdo->exec('INSERT INTO orders (id_order,	order_date,	status,	id_basket) VALUES ('.$current_order.', '.$order_date.', "cumming", '.$current_basket.')');
    

}else{
    $stmt71 = $pdo->exec('INSERT INTO orders (id_order,	order_date,	status,	id_basket) VALUES ('.$current_order.', '.$order_date.', "cumming", '.$current_basket.')');
    foreach($basket as $product){
        $id=$product->id;
        $amount=$product->amount;
        $stmt69 = $pdo->exec('INSERT INTO basket (id_user, id, amount, id_order) VALUES ('.$_SESSION['id_user'].', '.$current_basket.', '.$amount.', '.$current_order.' )');
    }
    
    $stmt70 = $pdo->exec('INSERT INTO orders (id_order,	order_date,	status,	id_basket) VALUES ('.$current_order.', '.$order_date.', "cumming", '.$current_basket.')');
    
}
?>