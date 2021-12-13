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
    if(in_array($p,$basket)){
        $position=array_search($p,$basket);
        $p2=$basket[$position];
        $amount2 = $p2->amount;
        $amount2+=1;
        $p2->amount=$amount2;
        $basket[$position]=$p2;
    }else{
        $basket[] = $p;
        $_SESSION['basket'] = $basket; 
    }
    
}else{
    $basket[] = $p;
    $_SESSION['basket'] = $basket;
}

?>