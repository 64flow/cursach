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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Получить данные из формы
    $iddog = $_POST['iddog'];
    $idhall = $_POST['idhall'];
    $idarend = $_POST['idarend'];
    $datedog = $_POST['datedog'];
    $datear = $_POST['datear'];
    $srok = $_POST['srok'];

    // Выполнить обновление данных в базе данных
    $sql = "UPDATE `arenddog` SET `idhall`='$idhall', `idarend`='$idarend', `datedog`='$datedog', `datear`='$datear', `srok`='$srok' WHERE `iddog`='$iddog'";
    $db->Execute($sql);

    // Перенаправить на страницу с обновленными данными или вывести сообщение об успешном обновлении
    header("Location: dog.php");
    exit();
}