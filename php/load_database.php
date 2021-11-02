<?php
    $hostname = "localhost";
    $database = "shop";
    $password = "";
    $login = "root";
    try
    {
       $pdo = new PDO("mysql:host=$hostname;dbname=$database",$login, $password);
    }catch(PDOException $e)
    {
       echo 'Połączenie nie mogło zostać utworzone: ' . $e->getMessage();
    }  
?>