<?php
session_start();
    if(isset($_POST['log_out'])){
        session_destroy();
        header("location:../logowanie.php");
    }
?>