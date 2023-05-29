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


    $purpose = $_POST['purpose'];
    $name = $_POST['name'];
    $condition = $_POST['condition'];
    $cost = $_POST['cost'];
    $hallID = $_POST['hallID'];

    $sqlInsert = "INSERT INTO `оборудование` (`Назначение`, `Название`, `Состояние`, `Стоимость`, `ID_зала`)
                  VALUES ('$purpose', '$name', '$condition', '$cost', '$hallID')";
    $db->Execute($sqlInsert);

    header("Location: ./equipment3.php"); // Перенаправление на главную страницу после добавления оборудования
    exit();

?>
