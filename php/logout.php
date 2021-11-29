<?php
    session_start();
    if(isset($_POST['log_out'])){
        session_destroy();
        session_unset();
        header("location:../logowanie.php");
       
    }
?>