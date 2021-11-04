<?php
    if(isset($_POST['make_account'])){
        $check_emails = $pdo->query("SELECT email from users");
        $firstname = $_POST['firstname'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $emailError = false;
        foreach($check_emails as $row_checkEmails)
        {
            if($row_checkEmails==$email){
                $emailError = true;
            }
        }
        $password = $_POST['password'];
        $password = password_hash($password,PASSWORD_DEFAULT);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if($emailError)
        {
            $make_account = $pdo->exec("INSERT INTO users (firstname,surname,email,password,type) values ('$firstname','$surname','$email','$password','user')");
            header("location:logowanie.php");
        }else{
            // tutaj dałbym ten error ale nw jak to dokladnie. Jutro pomysle dzisiaj juz leb paruje pozdro
        }
    }
    
?>