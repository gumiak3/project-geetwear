<?php

include('load_database.php');
session_start();
ob_start();

$dupson = $pdo->exec('INSERT INTO orders (id_order) VALUES (2 )');

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



$stmt675 = $pdo->query('SELECT id_order FROM orders');
foreach($stmt675 as $row675){}
if(isset($row675['id_order'])){
    $last_order_id=0;
}else{
    $stmt67 = $pdo->query('SELECT id_order FROM orders ORDER BY id_order DESC LIMIT 1');
    foreach($stmt67 as $row67){
        $last_order_id = $row67['id_order'];
    }
}


$stmt685 = $pdo->query('SELECT id FROM basket');
foreach($stmt685 as $row685){}
if(isset($row685['id'])){
    $last_basket_id=0;
}else{
    $stmt68 = $pdo->query('SELECT id FROM basket ORDER BY id DESC LIMIT 1');
    foreach($stmt68 as $row68){
        $last_basket_id = $row68['id_order'];
    }
}


$current_order=$last_order_id+1;
$current_basket=$last_basket_id+1;
$order_date='"'.date("Y/m/d").'"';
if(isset($_SESSION['login'])){
    

    $stmt70 = $pdo->exec('INSERT INTO orders (id_order,	order_date,	status,	id_basket) VALUES ('.$current_order.', '.$order_date.', "cumming", '.$current_basket.')');
    foreach($basket as $product){
        $id=$product->id;
        $amount=$product->amount;
        $stmt69 = $pdo->exec('INSERT INTO basket (id_user, id, amount, id_order) VALUES ('.$_SESSION['id_user'].', '.$current_basket.', '.$amount.', '.$current_order.' )');
    }
    
    
    

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
