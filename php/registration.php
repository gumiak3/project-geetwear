<?php
    if(isset($_POST['make_account'])){
        $firstname = $_POST['firstname'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password = password_hash($password,PASSWORD_DEFAULT);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $make_account = $pdo->exec("INSERT INTO users (firstname,surname,email,password) values ('$firstname','$surname','$email','$password')");
        header("location:logowanie.php");
    }
?>