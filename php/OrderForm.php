<?php

if ($_SESSION && isset($_SESSION['login'])) {
?>
    
<?php
} else {
    echo '<a href="logowanie.php"><p class="loguj"> ZALOGUJ SIĘ </p></a>';
}
?>