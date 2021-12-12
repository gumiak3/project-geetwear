<?php

if ($_SESSION && isset($_SESSION['login'])) {
echo $_SESSION['id_user'];
?>
    
<?php
} else {
    echo '<a href="logowanie.php"><p class="loguj"> ZALOGUJ SIĘ </p></a>';
}
?>