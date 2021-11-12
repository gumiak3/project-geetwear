<form method="get">
    <ul class="menu_cale">
    <?php
        include('load_database.php');

        

        $stmt100 = $pdo->query('SELECT * FROM categories');
        foreach($stmt100 as $row100){
            echo '<li class="kategoria"><a href="index2.php?idc='.$row100['id_category'].'">'.$row100['category_name'].'</a></li>';
        }
    ?>
    </ul>
</from>