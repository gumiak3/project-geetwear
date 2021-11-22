<?php
session_start();
if($_SESSION['login'])
{
    $id = $_SESSION['id_user'];
}else{
    
}

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
<form method='POST'>
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
<button name='edit-submit' id='save-btn'class='save-btn' type='submit'>Zapisz</button>
</form>
    <button class='edit-btn' id='edit-btn'>Edytuj</button>
<script>
$(document).ready(function(){
    $('#edit-btn').click(function(){
        $(".contact-in").removeAttr("readonly");
        $(this).addClass("editting");
        $("#save-btn").addClass("editting");
        $(".contact-input input").addClass("editting");
    });
    $("#save-btn").click(function(){
        $(".contact-in").addAttr("readonly");
        $(this).removeClass("editting");
        $("#edit-btn").removeClass("editting");
        $(".contact-input input").removeClass("editting");
    });
})
    </script>



