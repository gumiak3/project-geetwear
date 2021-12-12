<?php

function if_exists($variable,$variable_to_check){
    if($variable=='admin@gmail.com'){
        return true;
    }else{
        return false;
    }

}
if(isset($_POST['try-login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $error= true;
    $type;
    $validation="";
    $getrecords = $pdo->query("SELECT email from users where email='$email'");
    foreach($getrecords as $row_records){
        $validation= $row_records['email'];
    }
    if($validation!="")
    {
        $getpassword = $pdo->prepare("SELECT id_user,type, password from users where email=:email");
            $getpassword -> bindValue(':email',$email,PDO::PARAM_STR);
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
    
    if($error){
        echo "<div class=error-div>Błędne dane logowania</div>";
        $_SESSION['login'] = false;
        session_destroy();
    }else{
        $_SESSION['login'] = true;
        $_SESSION['user-type'] = $type;
        header("location:index.php");
    }
}
?>
