<?php
if(isset($_SESSION['alert'])){
    if($_SESSION['alert'] == true){
        echo "<div class='alert alert-success' role='alert'>POMYŚLNIE ZAKTUALIZOWANO!</div>";
    }else{
        echo "<div class='alert alert-danger' role='alert'>BŁĄD PODCZAS AKTUALIZACJI!</div>";
    }
    
    unset($_SESSION['alert']);
}
?>