<?php
session_start();
ob_start();
$id = $_POST['id'];
$amount = $_POST['amount'];
class Product{
    public $id;
    public $amount;
}
$p = new Product();
$p->id=$id;
$p->amount=$amount;
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
