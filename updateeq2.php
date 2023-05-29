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

$id = $_POST['id'];
$purpose = $_POST['purpose'];
$name = $_POST['name'];
$condition = $_POST['condition'];
$cost = $_POST['cost'];
$hallID = $_POST['hallID'];

$sqlUpdate = "UPDATE `оборудование` SET `Назначение`='$purpose',`Название`='$name',`Состояние`='$condition',`ID_зала`='$hallID ',`Стоимость`='$cost' WHERE`ID_оборудования`=$id";
$db->Execute($sqlUpdate);
//echo json_encode($cost);
echo '<script>window.location.href = "./equipment3.php";</script>'; // Перенаправление на страницу со списком оборудования после изменения
exit();
?>
