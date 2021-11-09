<?php

function if_exists($variable,$variable_to_check,$what_check){
    if($what_check=='email'){
        if($variable===$variable_to_check){
            return true;
        }else{
            return false;
        }
    }else{
        if(password_verify($variable_to_check,$variable)){
            return true;
        }else{
            return false;
        }
    }
}
if(isset($_POST['try-login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $error;
    $getrecords = $pdo->query("SELECT email from users");
    foreach($getrecords as $row_records){
        if(if_exists($row_records['email'],$email,'email')){
            $getpassword = $pdo->query("SELECT id_user, password from users where email='$email'");
            foreach($getpassword as $passwordrow){
                $hashedpassword = $passwordrow['password'];
                if(password_verify($password,$hashedpassword)){
                    $error = false;
                    $_SESSION['id_user'] = $passwordrow['id_user'];
                }else{
                    $error = true;
                }
            }
        }
        else{
            $error = true;
        }
    }
    if($error){
        echo "<div class=error-div>Błędne dane logowania</div>";
    }else{
        $_SESSION['login'] = true;
        header("location:index.php");
    }
}
?>