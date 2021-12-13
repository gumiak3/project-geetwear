<form method="">
    <ul class="menu_cale">
    <?php
        include('load_database.php');
        $stmt100 = $pdo->query('SELECT * FROM subpages WHERE status = 1');
        foreach($stmt100 as $row100){
            echo '<li class="kategoria"><a href="index2.php?idc='.$row100['additional_info'].'">'.$row100['subpage_name'].'</a></li>';
        }
    ?>
    </ul>   
</from>