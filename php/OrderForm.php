<?php

if (isset($_SESSION['login'])) {
    include('load_database.php');
    
    $stmt30 = $pdo->prepare('SELECT * FROM users WHERE id_user = :id');
        $stmt30->bindValue(':id', $_SESSION['id_user'], PDO::PARAM_STR);
        $stmt30->execute();
    foreach($stmt30 as $row30)
    {
        $firstname = $row30['firstname'];
        $surname = $row30['surname'];
        $emaill = $row30['email'];
        $city = $row30['city'];
        $street = $row30['street'];
        $zip = $row30['ZIP'];
        $house_number = $row30['house_number'];
        $apartment_number = $row30['apartment_number'];
        $email = $row30['email'];
    }
    echo "Łączna cena produktów:".$_SESSION['price']+8.99;
?>
    <div class='contact-content-div row'>
    <div class='contact-label col-3'>
        <label>Imię</label>
    </div>
    <div class='contact-input col-9'>
        <input type='text' class='contact-in' name='firstname' value='<?=$firstname?>' readonly></input>
    </div>
</div>
<div class='contact-content-div row'>
    <div class='contact-label col-3'>
        <label>Nazwisko</label>
    </div>
    <div class='contact-input col-9'>
        <input type='text' name='surname' class='contact-in' value='<?=$surname?>' readonly></input>
    </div>
</div>
<div class='contact-content-div row'>
    <div class='contact-label col-3'>
        <label>Miasto</label>
    </div>
    <div class='contact-input col-9'>
        <input type='text' class='contact-in' name='city' value='<?php if($city)echo $city?>' readonly ></input>
    </div>
</div>
<div class='contact-content-div row'>
    <div class='contact-label col-3'>
        <label>Ulica</label>
    </div>
    <div class='contact-input col-9'>
        <input type='text' class='contact-in' name='street' value='<?php if($street)echo $street?>' readonly ></input>
    </div>
</div>
<div class='contact-content-div row'>
    <div class='contact-label col-3'>
        <label>Kod pocztowy</label>
    </div>
    <div class='contact-input col-9'>
        <input type='number' class='contact-in' name='zip' value='<?php if($zip)echo $zip?>' readonly></input>
    </div>
</div>
<div class='contact-content-div row'>
    <div class='contact-label col-3'>
        <label>Numer domu</label>
    </div>
    <div class='contact-input col-9'>
        <input type='number' class='contact-in' name='house_number' value='<?php if($house_number)echo $house_number?>' readonly></input>
    </div>
</div>
<div class='contact-content-div row'>
    <div class='contact-label col-3'>
        <label>Numer mieszkania</label>
    </div>
    <div class='contact-input col-9'>
        <input type='number' class='contact-in' name='apartment_number' value='<?php if($apartment_number)echo $apartment_number?>' readonly></input>
    </div>
</div>
<button name='add_order' id='save-btn'class='save-btn' type='submit'>Zamów</button>
<?php
} else {
    echo "Łączna cena produktów:".$_SESSION['price']+8.99;
    ?>
    <div class='contact-content-div row'>
    <div class='contact-label col-3'>
        <label>Imię</label>
    </div>
    <div class='contact-input col-9'>
        <input type='text' class='contact-in' name='firstname' readonly></input>
    </div>
</div>
<div class='contact-content-div row'>
    <div class='contact-label col-3'>
        <label>Nazwisko</label>
    </div>
    <div class='contact-input col-9'>
        <input type='text' name='surname' class='contact-in'  readonly></input>
    </div>
</div>
<div class='contact-content-div row'>
    <div class='contact-label col-3'>
        <label>Miasto</label>
    </div>
    <div class='contact-input col-9'>
        <input type='text' class='contact-in' name='city'  readonly ></input>
    </div>
</div>
<div class='contact-content-div row'>
    <div class='contact-label col-3'>
        <label>Ulica</label>
    </div>
    <div class='contact-input col-9'>
        <input type='text' class='contact-in' name='street'  readonly ></input>
    </div>
</div>
<div class='contact-content-div row'>
    <div class='contact-label col-3'>
        <label>Kod pocztowy</label>
    </div>
    <div class='contact-input col-9'>
        <input type='number' class='contact-in' name='zip'  readonly></input>
    </div>
</div>
<div class='contact-content-div row'>
    <div class='contact-label col-3'>
        <label>Numer domu</label>
    </div>
    <div class='contact-input col-9'>
        <input type='number' class='contact-in' name='house_number'  readonly></input>
    </div>
</div>
<div class='contact-content-div row'>
    <div class='contact-label col-3'>
        <label>Numer mieszkania</label>
    </div>
    <div class='contact-input col-9'>
        <input type='number' class='contact-in' name='apartment_number'  readonly></input>
    </div>
</div>
<button name='add_order' id='save-btn'class='save-btn' type='submit'>Zamów</button>
    <?php
}
?>
