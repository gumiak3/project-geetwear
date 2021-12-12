<?php
session_start();
ob_start();

if(isset($_POST['usun'])){
    $product_position=$_POST['ProductPosition'];
    unset($_SESSION['basket'][$product_position]);
}
?>