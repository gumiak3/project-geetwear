<?php
include('load_database.php');
include('OrderToDataBase.php');
if (isset($_SESSION['login'])) {


    $stmt30 = $pdo->prepare('SELECT * FROM users WHERE id_user = :id');
    $stmt30->bindValue(':id', $_SESSION['id_user'], PDO::PARAM_STR);
    $stmt30->execute();
    foreach ($stmt30 as $row30) {

        $firstname = $row30['firstname'];
        $surname = $row30['surname'];
        $city = $row30['city'];
        $street = $row30['street'];
        $zip = $row30['ZIP'];
        $house_number = $row30['house_number'];
        $apartment_number = $row30['apartment_number'];
        $email = $row30['email'];
    }
    echo '<input type="hidden" name="ceena" value="' . $_SESSION['price'] . '">';
    if ($_SESSION['price'] == 0) {
        echo "Łączna cena produktów: 0 zł";
    } else {
        echo "Łączna cena produktów:" . $_SESSION['price'] + 8.99 . ' zł';
    }
?>
<form method="POST">
</form>
    <form method="POST">
        <div class='contact-content-div row'>
            <div class='contact-label col-3'>
                <label>Imię</label>
            </div>
            <div class='contact-input col-9'>
                <input type='text' class='contact-in' name='firstname' value='<?= $firstname ?>'></input>
            </div>
        </div>
        <div class='contact-content-div row'>
            <div class='contact-label col-3'>
                <label>Nazwisko</label>
            </div>
            <div class='contact-input col-9'>
                <input type='text' name='surname' class='contact-in' value='<?= $surname ?>'></input>
            </div>
        </div>
        <div class='contact-content-div row'>
            <div class='contact-label col-3'>
                <label>Email</label>
            </div>
            <div class='contact-input col-9'>
                <input type='text' class='contact-in' name='email' value='<?= $email ?>'></input>
            </div>
        </div>
        <div class='contact-content-div row'>
            <div class='contact-label col-3'>
                <label>Miasto</label>
            </div>
            <div class='contact-input col-9'>
                <input type='text' class='contact-in' name='city' value='<?php if ($city) echo $city ?>'></input>
            </div>
        </div>
        <div class='contact-content-div row'>
            <div class='contact-label col-3'>
                <label>Ulica</label>
            </div>
            <div class='contact-input col-9'>
                <input type='text' class='contact-in' name='street' value='<?php if ($street) echo $street ?>'></input>
            </div>
        </div>
        <div class='contact-content-div row'>
            <div class='contact-label col-3'>
                <label>Kod pocztowy</label>
            </div>
            <div class='contact-input col-9'>
                <input type='number' class='contact-in' name='zip' value='<?php if ($zip) echo $zip ?>'></input>
            </div>
        </div>
        <div class='contact-content-div row'>
            <div class='contact-label col-3'>
                <label>Numer domu</label>
            </div>
            <div class='contact-input col-9'>
                <input type='number' class='contact-in' name='house_number' value='<?php if ($house_number) echo $house_number ?>'></input>
            </div>
        </div>
        <div class='contact-content-div row'>
            <div class='contact-label col-3'>
                <label>Numer mieszkania</label>
            </div>
            <div class='contact-input col-9'>
                <input type='number' class='contact-in' name='apartment_number' value='<?php if ($apartment_number) echo $apartment_number ?>'></input>
            </div>
        </div>
        <br>
        <!-- payment type -->
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
            <label class="form-check-label" for="flexRadioDefault1">
                Płatość przy odbiorze
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
            <label class="form-check-label" for="flexRadioDefault2">
                Blik
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
            <label class="form-check-label" for="flexRadioDefault3">
                Przelew
            </label>
        </div>
        <br><br>
        <input name='add_order' id='save-btn' class='save-btn' type='submit' value="Zamów"></div>
    </form>
<?php
if(isset($_POST['add_order'])){
    echo 'eeeelo';
}
} else {
    echo '<input type="hidden" name="ceena" value="' . $_SESSION['price'] . '">';
    if ($_SESSION['price'] == 0) {
        echo "Łączna cena produktów: 0 zł";
    } else {
        echo "Łączna cena produktów:" . $_SESSION['price'] + 8.99 . ' zł';
    }

?>
<form method="POST">
</form>
    <form method="POST">
        <div class='contact-content-div row'>
            <div class='contact-label col-3'>
                <label>Imię</label>
            </div>
            <div class='contact-input col-9'>
                <input type='text' class='contact-in' name='firstname'></input>
            </div>
        </div>
        <div class='contact-content-div row'>
            <div class='contact-label col-3'>
                <label>Nazwisko</label>
            </div>
            <div class='contact-input col-9'>
                <input type='text' name='surname' class='contact-in'></input>
            </div>
        </div>
        <div class='contact-content-div row'>
            <div class='contact-label col-3'>
                <label>Email</label>
            </div>
            <div class='contact-input col-9'>
                <input type='text' class='contact-in' name='email'></input>
            </div>
        </div>
        <div class='contact-content-div row'>
            <div class='contact-label col-3'>
                <label>Miasto</label>
            </div>
            <div class='contact-input col-9'>
                <input type='text' class='contact-in' name='city'></input>
            </div>
        </div>
        <div class='contact-content-div row'>
            <div class='contact-label col-3'>
                <label>Ulica</label>
            </div>
            <div class='contact-input col-9'>
                <input type='text' class='contact-in' name='street'></input>
            </div>
        </div>
        <div class='contact-content-div row'>
            <div class='contact-label col-3'>
                <label>Kod pocztowy</label>
            </div>
            <div class='contact-input col-9'>
                <input type='number' class='contact-in' name='zip'></input>
            </div>
        </div>
        <div class='contact-content-div row'>
            <div class='contact-label col-3'>
                <label>Numer domu</label>
            </div>
            <div class='contact-input col-9'>
                <input type='number' class='contact-in' name='house_number'></input>
            </div>
        </div>
        <div class='contact-content-div row'>
            <div class='contact-label col-3'>
                <label>Numer mieszkania</label>
            </div>
            <div class='contact-input col-9'>
                <input type='number' class='contact-in' name='apartment_number'></input>
            </div>
        </div>
        <br>
        <!-- payment type -->
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
            <label class="form-check-label" for="flexRadioDefault1">
                Płatość przy odbiorze
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
            <label class="form-check-label" for="flexRadioDefault2">
                Blik
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
            <label class="form-check-label" for="flexRadioDefault3">
                Przelew
            </label>
        </div>
        <br><br>
        <input name='add_order' id='save-btn' class='save-btn' type='submit' value="Zamów"></div>
    </form>

<?php
}


?>