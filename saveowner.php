<?php
require_once('/home/p/p98554f1/p98554f1.beget.tech/public_html/MySQL.php');
session_start();

$db = new MySQL();
$db->Connect(
    'localhost',
    'p98554f1_conchal',
    'Kursach28!',
    'p98554f1_conchal'
);

$name = $_POST['name'];
$inn = $_POST['inn'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$bank = $_POST['bank'];
$address = $_POST['address'];

$sql = "INSERT INTO владелец (`Название владельца`, `ИНН/КПП`, `email`, `Номер телефона`, `Банковские реквизиты владельца`, `Адрес`) 
        VALUES ('$name', '$inn', '$email', '$phone', '$bank', '$address')";

$db->Execute($sql);

// Перенаправление на страницу со списком владельцев после добавления
header("Location: own.php");
exit();
?>