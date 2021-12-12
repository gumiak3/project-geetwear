<?php
session_start();
ob_start();
$id = $_POST['id'];
$amount = $_POST['amount'];
$price = $_POST['price'];
class Product{
    public $id;
    public $amount;
    public $price;
}
$p = new Product();
$p->id=$id;
$p->amount=$amount;
$p->price=(float)$price;
$basket = array();

if(isset($_SESSION['basket'])){
    $basket = $_SESSION['basket'];
    $basket[] = $p;
    $_SESSION['basket'] = $basket;
}else{
    $basket[] = $p;
    $_SESSION['basket'] = $basket;
}

?>
