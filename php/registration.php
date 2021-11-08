<?php
    if(isset($_POST['make_account'])){
        $check_emails = $pdo->query("SELECT email from users");
        $firstname = $_POST['firstname'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $emailError = false;
        foreach($check_emails as $row_checkEmails)
        {
            if($row_checkEmails['email']==$email){
                $emailError = true;
            }
        }
        $password = $_POST['password'];
        if( !preg_match( '/[^A-Za-z0-9]+/', $password) || strlen( $password) < 8)
        {
            echo "<div class='error-div'>Hasło musi mieć przynajmniej 8 liter i jeden znak specjaln</div>";
        }else{
            $password = password_hash($password,PASSWORD_DEFAULT);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            if(!$emailError)
            {
                $make_account = $pdo->exec("INSERT INTO users (firstname,surname,email,password,type) values ('$firstname','$surname','$email','$password','user')");
                header("location:logowanie.php");
            }else{
                echo '<div class="error-div">Email jest już w użyciu</div>';
            }
        }
        
    }
    
?>