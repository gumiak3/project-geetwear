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
    $type;
    $getrecords = $pdo->query("SELECT email from users");
    foreach($getrecords as $row_records){
        if(if_exists($row_records['email'],$email,'email')){
            $getpassword = $pdo->prepare("SELECT id_user,type, password from users where email=:email");
            $getpassword -> bindValue(':email',$_POST['email'],PDO::PARAM_STR);
            $getpassword -> execute();
            foreach($getpassword as $passwordrow){
                $hashedpassword = $passwordrow['password'];
                $type = $passwordrow['type'];
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
        $_SESSION['login'] = false;
    }else{
        $_SESSION['login'] = true;
        $_SESSION['user-type'] = $type;
        header("location:index.php");
    }
}
?>
