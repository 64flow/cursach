<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-
scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="css/style.css">
</head>

<?php 
require_once('/home/p/p98554f1/p98554f1.beget.tech/public_html/MySQL.php');
session_start();
$idvlad=$_POST['idvlad'];
$adr=$_POST['adr'];
$vmest = $_POST['vmest'];
$vip = $_POST['vip'];
$cost = $_POST['cost'];

$db = new MySQL();

$db->Connect(
    'localhost',
    'p98554f1_conchal',
    'Kursach28!',
    'p98554f1_conchal'
);
$id = $_POST['hall_id'];
$db->Execute("UPDATE `залы` 
SET `ID_зала`= $id,
`ID_владельца`='$idvlad',
`Адрес`='$adr',
`Вместимость`='$vmest',
`Количество ВИП-мест`='$vip',
`Стоимость аренды`='$cost'
WHERE `ID_зала`='$id'");
echo json_encode($adr);
echo '<script type="text/javascript"> alert("Данные зала успешно обновлены");</script>';
echo '<script>window.location.href = "./adminmain.php";</script>';
?>