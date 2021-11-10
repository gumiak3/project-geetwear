<?php
session_start();
$id = $_SESSION['id_user'];

include("./load_database.php");
$getrecords = $pdo->query("SELECT * FROM users where id_user='$id'");
foreach($getrecords as $row_records)
{
    $firstname = $row_records['firstname'];
    $surname = $row_records['surname'];
    $emaill = $row_records['email'];
    $city = $row_records['city'];
    $street = $row_records['street'];
    $zip = $row_records['ZIP'];
    $house_number = $row_records['house_number'];
    $apartment_number = $row_records['apartment_number'];
    $email = $row_records['email'];
}
?>
<div class='contact-content-div'>
    <label>Imię</label>
    <input name='firstname' value='<?=$firstname?>'></input>
</div>
<div class='contact-content-div'>
    <label>Nazwisko</label>
    <input name='surname' value='<?=$surname?>'></input>
</div>
<div class='contact-content-div'>
    <label>Miasto</label>
    <input name='city' value='<?php if($city)echo $city?>'></input>
</div>
<div class='contact-content-div'>
    <label>Ulica</label>
    <input name='street' value='<?php if($street)echo $street?>'></input>
</div>
<div class='contact-content-div'>
    <label>Kod pocztowy</label>
    <input name='zip' value='<?php if($zip)echo $zip?>'></input>
</div>
<div class='contact-content-div'>
    <label>Numer domu</label>
    <input name='house_numbe,r' value='<?php if($house_number)echo $house_number?>'></input>
</div>
<div class='contact-content-div'>
    <label>Numer mieszkania</label>
    <input name='apartment_number' value='<?php if($apartment_number)echo $apartment_number?>'></input>
</div>


